<?php
require_once "../Includes/connectDb.php";
$connect = connect();
if(isset($_GET["idCat"]))
{
    $idCat = $_GET["idCat"];
    $sujets = $connect->query("SELECT * FROM sujet WHERE sujet.idCategorie = '$idCat'")->fetchAll();
}
else
{
    header("location: ../Views/categorie.php");
}
?>