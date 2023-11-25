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
        $errors = array();
        if($titreSujet!=="")
        {
            $testSujet = $connect->query("SELECT * FROM sujet WHERE titreSujet = '$titreSujet'")->fetch();
            if($testSujet)
            {
                $errors["titreSujetErrorText"] = "Un sujet avec le même titre existe déjà dans la catégorie ."; //afficher le nom de la catégorie en question
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
        }
        $errors["canSubmit"] = $canSubmit;
        // header("location: ../Views/sujet.php?idCat=".$idCat);
        echo json_encode($errors);
    }
}
?>