<?php
require_once "../Includes/connectDb.php";
if(isset($_GET["idSujet"]))
{
    $idSujet = $_GET["idSujet"];
    $connect = connect();
    $sujet = $connect->query("SELECT * FROM sujet WHERE sujet.idSujet = '$idSujet'")->fetch();
    if($sujet)
    {
        $messages = $connect->query("SELECT * FROM message WHERE message.idSujet = " . $idSujet);
    }
}
else
{
    header("location: ../Views/categorie.php");
}
?>