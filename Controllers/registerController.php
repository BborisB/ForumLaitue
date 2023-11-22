<?php
require_once "../includes/connectDb.php";
$firstNameErrorText = $lastNameErrorText = $emailErrorText = $passwordErrorText = $confirmPasswordErrorText = $pfpErrorText = "";
$firstName = $lastName = $email = $password = $confirmPassword = "";
$passwordRe = "/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#+-^\[\]]).{8,}$/";
$emailRe = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
if(verif())
{
    $pfpErrorText = "";
    $pfpFile = "user.jpg";
    if(isset($_FILES["pfp"]))
    {
        $pfp = $_FILES["pfp"];
        if($pfp['name']!=="")
        {
            $pfpFile = uniqid(true) . $pfp['name'];
        }
        move_uploaded_file($pfp['tmp_name'], "../PFP/" . $pfpFile);
        $connect = connect();
        $req = $connect->prepare("INSERT INTO utilisateur (email, nom, prenom, motDePasse, photo, derniereConnection) VALUES(?,?,?,?,?,?)");
        $req->execute(array($email, $lastName, $firstName, password_hash($password, PASSWORD_BCRYPT), $pfpFile, null));
        header("location: ../Views/registerSuccess.php");
    }
    else
    {
        $pfpErrorText = "Une erreur est survenue avec l'image de profile.";
    }
}

/**
 * Vérifie les donées saisies et retourne le résultat de la vérification.
 *
 * @return boolean Vrai si les données sont correctes, faux sinon.
 */
function verif() : bool
{
    $connect = connect();
    global $firstName, $lastName, $email, $password, $confirmPassword,
    $firstNameErrorText, $lastNameErrorText, $emailErrorText, $passwordErrorText, $confirmPasswordErrorText,
    $emailRe, $passwordRe;
    $result = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]))
        {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            //firstName verification
            if($firstName == "")
            {
                $firstNameErrorText = "Ce champ est obligatoire.";
                $result = false;
            }
            else if(strlen($firstName) < 3)
            {
                $firstNameErrorText = "Le prénom doit avoir 3 caractères minimum.";
                $result = false;
            }
            else
            {
                $firstNameErrorText = "";
            }
            //lastName verification
            if($lastName == "")
            {
                $lastNameErrorText = "Ce champ est obligatoire.";
                $result = false;
            }
            else if (strlen($lastName) < 3)
            {
                $lastNameErrorText = "Le nom doit avoir 3 caractères minimum.";
                $result = false;
            }
            else
            {
                $lastNameErrorText = "";
            }
            //email verification
            if(preg_match($emailRe, $email))
            {
                if($connect->query("SELECT * FROM utilisateur WHERE email = '$email'")->fetch())
                {
                    $emailErrorText = "Cette adresse mail est déjà utilisée.";
                    $result = false;
                }
                else
                {
                    $emailErrorText = "";
                }
            }
            else
            {
                $emailErrorText = "Email invalide.";
                $result = false;
            }
            //password verification
            if(preg_match($passwordRe, $password))
            {
                $passwordErrorText = "";
            }
            else
            {
                $passwordErrorText = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
                $result = false;
            }
            //confirmPassword verification
            if($password === $confirmPassword)
            {
                $confirmPasswordErrorText = "";
            }
            else
            {
                $confirmPasswordErrorText = "Vous devez entrer le même mot de passe.";
                $result = false;
            }
        }
    }
    else
    {
        $result = false;
    }
    return $result;
}
?>