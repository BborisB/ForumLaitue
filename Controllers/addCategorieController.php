<?php
require_once "../Includes/connectDb.php";
$connect = connect();
$catTitle = $catTitleErrorText = $catDesc = $catDescTextError = "";
if (isset($_POST["catTitle"]) && isset($_POST["catDesc"]))
{
    $canAdd = true;
    $catTitle = $_POST["catTitle"];
    $catDesc = $_POST["catDesc"];
    if($catTitle==="")
    {
        $catTitleErrorText = "Ce champ est requis.";
        $canAdd = false;
    }
    else
    {
        $catTitleErrorText = "";
    }
    if($catDesc==="")
    {
        $catDescTextError = "Ce champ est requis.";
        $canAdd = false;
    }
    else
    {
        $catDescTextError = "";
    }
    if($canAdd)
    {
        $req = $connect->prepare("INSERT INTO categorie (titre, description) VALUES(?,?)");
        $req->execute(array($catTitle, $catDesc));
        // header("location: ../Views/forum.php");
    }
}
else
{
    var_dump($_POST);
}
?>