<?php
require_once "../Includes/connectDb.php";
if(isset($_COOKIE["userId"]))
{
    $connect = connect();
    $userId = $_COOKIE["userId"];
    $user = $connect->query("SELECT * FROM utilisateur WHERE idUtilisateur = '$userId'")->fetch();
    if($user)
    {
        $nom = $user["nom"];
        $prenom = $user["prenom"];
        $derniereConnexion = new DateTime($user["derniereConnexion"]);
        $derniereConnexion = $derniereConnexion->format("H:i:s");
        $currentDate = date_create()->format("d/m/y");
    }
}
else
{
    header("location: ../index.php");
}
?>