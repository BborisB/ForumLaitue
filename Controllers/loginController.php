<?php
require_once "../Includes/connectDb.php";
$email = $password = $emailErrorText = $passwordErrorText = "";
if(verif())
{
    $user = $connect->query("SELECT * FROM utilisateur WHERE utilisateur.email = '$email'")->fetch();
    if($user)
    {
        setcookie("userId", $user["id"], time()+3600*24);
        header("location: ../Views/forum.php");
    }
}
function verif() : bool
{
    $result = true;
    $connect = connect();
    global $email, $password, $emailErrorText, $passwordErrorText;
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $connect->query("SELECT * FROM utilisateur WHERE utilisateur.email = '$email'")->fetch();
        if($user)
        {
            if(!password_verify($password, $user["motDePasse"]))
            {
                $passwordErrorText = "Le mot de passe incorrect.";
                $result = false;
            }
        }
        else
        {
            $emailErrorText = "L'adresse mail saisie est incorrecte.";
            $result = false;
        }
    }
    else
    {
        $result = false;
    }
    return $result;
}
?>