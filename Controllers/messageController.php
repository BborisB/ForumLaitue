<?php
require_once "../Includes/connectDb.php";
if(isset($_GET["idSujet"]))
{
    $idSujet = $_GET["idSujet"];
    $connect = connect();
    $sujet = $connect->query("SELECT * FROM sujet WHERE sujet.idSujet = '$idSujet'")->fetch();
    if($sujet)
    {
        $messages = $connect->query("SELECT message.textMessage, utilisateur.prenom, utilisateur.nom, DATE_FORMAT(message.dateMessage, '%e/%c/%Y %H:%i:%S') as dateMessage FROM message 
        JOIN utilisateur ON message.idUtilisateur = utilisateur.idUtilisateur WHERE message.idSujet = " . $idSujet)->fetchAll();
    }
}
else
{
    header("location: ../Views/categorie.php");
}
?>