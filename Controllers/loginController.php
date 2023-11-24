<?php
require_once "../Includes/connectDb.php";
$email = $password = $emailErrorText = $passwordErrorText = "";
$connect = connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $connect->query("SELECT * FROM utilisateur WHERE utilisateur.email = '$email'")->fetch();
        if($user)
        {
            if (!password_verify($password, $user["motDePasse"]))
            {
                $passwordErrorText = "Le mot de passe est incorrect.";
                echo json_encode(array("emailErrorText"=>$emailErrorText, "passwordErrorText" => $passwordErrorText));
            }
            else
            {
                setCookie("userId", $user["idUtilisateur"], time() + 3600 * 24);
                $connect->exec("UPDATE utilisateur SET derniereConnexion=NOW() where email='$email'");
                echo json_encode(array("canLogin"=>true));
            }
        }
        else
        {
            $emailErrorText = "L'adresse mail saisie est incorrecte.";
            echo json_encode(array("emailErrorText"=>$emailErrorText, "passwordErrorText" => $passwordErrorText));
        }
    }
}

?>