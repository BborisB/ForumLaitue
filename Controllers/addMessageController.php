<?php
require_once "../Includes/connectDb.php";
$connect = connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_COOKIE["userId"]))
    {
        $idUtilisateur = $_COOKIE["userId"];
        if(isset($_GET["idSujet"]))
        {
            $idSujet = $_GET["idSujet"];
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST["textMessage"]))
                {
                    $textMessage = $_POST["textMessage"];
                    $req = $connect->prepare("INSERT INTO message (textMessage, dateMessage, idUtilisateur, idSujet) VALUES(?,NOW(),?,?)");
                    $req->execute(array($textMessage, $idUtilisateur, $idSujet));
                    
                }
            }
            header("location: ../Views/message.php?idSujet=".$idSujet);
        }
        else
        {
            header("location: ../Views/categorie.php");
        }
    }
    else
    {
        header("location: ../index.php");
    }
}
?>