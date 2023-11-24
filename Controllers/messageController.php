<?php
require_once "../Includes/connectDb.php";
if(isset($_GET["idSujet"]))
{
    $idSujet = $_GET["idSujet"];
    $connect = connect();
    $sujet = $connect->query("SELECT * FROM sujet WHERE sujet.idSujet = '$idSujet'")->fetch();
    if($sujet)
    {
        $messages = $connect->query("SELECT message.textMessage, utilisateur.prenom, utilisateur.nom, message.dateMessage FROM message 
        JOIN utilisateur ON message.idUtilisateur = utilisateur.idUtilisateur WHERE message.idSujet = " . $idSujet);
    }
}
else
{
    header("location: ../Views/categorie.php");
}
?>