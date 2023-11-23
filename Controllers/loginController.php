<?php
require_once "../Includes/connectDb.php";
$email = $password = $emailErrorText = $passwordErrorText = "";
$connect = connect();
if (isset($_POST["email"]) && isset($_POST["password"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $connect->query("SELECT * FROM utilisateur WHERE utilisateur.email = '$email'")->fetch();
    if($user)
    {
        if (!password_verify($password, $user["motDePasse"]))
        {
            $passwordErrorText = "Le mot de passe incorrect.";
        }
        else
        {
            setCookie("userId", $user["idUtilisateur"], time() + 3600 * 24);
            header("location: ../Views/categorie.php");
        }
    }
    else
    {
        $emailErrorText = "L'adresse mail saisie est incorrecte.";
    }
}
?>