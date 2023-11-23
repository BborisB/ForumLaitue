<?php
require_once "../Includes/connectDb.php";
$connect = connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["titreSujet"]) && isset($_COOKIE["userId"]) && isset($_GET["idCat"]))
    {
        $titreSujet = $_POST["titreSujet"];
        $idUtilisateur = $_COOKIE["userId"];
        $idCat = $_GET["idCat"];
        $req = $connect->prepare("INSERT INTO sujet (titreSujet, idUtilisateur, idCategorie) VALUES(?,?,?)");
        $req->execute(array($titreSujet, $idUtilisateur, $idCat));
        header("location: ../Views/sujet.php?idCat=".$idCat);
    }
}
?>