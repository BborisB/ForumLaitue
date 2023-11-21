<?php
$firstNameErrorText = $lastNameErrorText = $emailErrorText = $passwordErrorText = $confirmPasswordErrorText = "";
$firstName = $lastName = $email = $password = $confirmPassword = "";
$passwordRe = "/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#+-^\[\]]).{8,}$/";
$emailRe = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
// $passwordRe = "/Hello/";
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
        }
        else if(strlen($firstName) < 3)
        {
            $firstNameErrorText = "Le prénom doit avoir 3 caractères minimum.";
        }
        else
        {
            $firstNameErrorText = "";
        }
        //lastName verification
        if($lastName == "")
        {
            $lastNameErrorText = "Ce champ est obligatoire.";
        }
        else if (strlen($lastName) < 3)
        {
            $lastNameErrorText = "Le nom doit avoir 3 caractères minimum.";
        }
        else
        {
            $lastNameErrorText = "";
        }
        //email verification
        if(preg_match($emailRe, $email))
        {
            $emailErrorText = "";
        }
        else
        {
            $emailErrorText = "Email invalide.";
        }
        //password verification
        if(preg_match($passwordRe, $password))
        {
            $passwordErrorText = "";
        }
        else
        {
            $passwordErrorText = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        }
        //confirmPassword verification
        if($password === $confirmPassword)
        {
            $confirmPasswordErrorText = "";
        }
        else
        {
            $confirmPasswordErrorText = "Vous devez entrer le même mot de passe.";
        }
    }
}
?>