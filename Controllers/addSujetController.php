<?php
require_once "../Includes/connectDb.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["titreSujet"]) && isset($_POST["message"]) && isset($_COOKIE["userId"]) && isset($_GET["idCat"]))
    {
        //verifier si la catégorie avec l'idCat existe

        $connect = connect();
        $titreSujet = $_POST["titreSujet"];
        $message = $_POST["message"];
        $idUtilisateur = $_COOKIE["userId"];
        $idCat = $_GET["idCat"];
        $canSubmit = true;
        $errors = array("titreSujetErrorText"=>"", "messageErrorText"=>"");
        if($titreSujet!=="")
        {
            $testSujet = $connect->query("SELECT categorie.titreCategorie FROM sujet JOIN categorie ON sujet.idCategorie = categorie.idCategorie WHERE sujet.titreSujet = '$titreSujet'")->fetch();
            if($testSujet)
            {
                $errors["titreSujetErrorText"] = "Un sujet avec le même titre existe déjà dans la catégorie ".$testSujet["titreCategorie"]."."; //afficher le nom de la catégorie en question
                $canSubmit = false;
            }
        }
        else
        {
            $errors["titreSujetErrorText"] = "Entrez un titre.";
            $canSubmit = false;
        }
        if($message==="")
        {
            $errors["messageErrorText"] = "Entrez un premier message.";
            $canSubmit = false;
        }
        else
        {
            $errors["messageErrorText"] = "";
        }
        if($canSubmit)
        {
            $req = $connect->prepare("INSERT INTO sujet (titreSujet, idUtilisateur, idCategorie) VALUES(?,?,?)");
            $req->execute(array($titreSujet, $idUtilisateur, $idCat));
            $idSujet = $connect->lastInsertId();
            $req = $connect->prepare("INSERT INTO message (textMessage, dateMessage, idUtilisateur, idSujet) VALUES(?,NOW(),?,?)");
            $req->execute(array($message, $idUtilisateur, $idSujet));

        }
        $errors["canSubmit"] = $canSubmit;
        // header("location: ../Views/sujet.php?idCat=".$idCat);
        echo json_encode($errors);
    }
}
?>