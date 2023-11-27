<?php
require_once "../Includes/connectDb.php";
$connect = connect();
if(isset($_GET["idCat"]))
{
    $idCat = $_GET["idCat"];
    $sujets = $connect->query("SELECT sujet.idSujet, sujet.titreSujet, (SELECT MAX(message.dateMessage) FROM message WHERE message.idSujet = sujet.idSujet) as dernierMessage, 
    utilisateur.prenom, utilisateur.nom FROM sujet 
    JOIN utilisateur ON sujet.idUtilisateur = utilisateur.idUtilisateur WHERE sujet.idCategorie = '$idCat'")->fetchAll();
    $cat = $connect->query("SELECT * FROM categorie WHERE idCategorie = '$idCat'")->fetch();
    if($cat)
    {
        $catName = $cat["titreCategorie"];
    }
    else
    {
        header("location: ../Views/categorie.php");
    }
}
else
{
    header("location: ../Views/categorie.php");
}
?>