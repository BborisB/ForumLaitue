<?php
require_once "../Includes/connectDb.php";
$connect = connect();
$catTitle = $catTitleErrorText = $catDesc = $catDescTextError = "";
if (isset($_POST["catTitle"]) && isset($_POST["catDesc"]))
{
    $catTitle = $_POST["catTitle"];
    $catDesc = $_POST["catDesc"];
    if($catTitle==="")
    {
        $catTitleErrorText = "Ce champ est requis.";
    }
    if($catDesc==="")
    {
        $catDescTextError = "Ce champ est requis.";
    }
    $req = $connect->prepare("INSERT INTO utilisateur (email, nom, prenom, motDePasse, photo, derniereConnection) VALUES(?,?,?,?,?,?)");
    $req->execute(array($email, $lastName, $firstName, password_hash($password, PASSWORD_BCRYPT), $pfpFile, null));
    header("location: ../Views/registerSuccess.php");
}
else
{
    return false;
}
?>