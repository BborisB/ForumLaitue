<?php
function connect()
{
    $serveur = "localhost";
    $user = "root";
    $passwd = "";
    $bdd = "forum";
    try 
    {
        $cnx = new PDO('mysql:host=' . $serveur . ';dbname=' . $bdd, $user, $passwd);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Vous êtes connectés à : " . $bdd;
        return $cnx;
    } 
    catch (PDOException $error)
    {
        echo 'N° : ' . $error->getCode() . '<br />';
        die('Erreur : ' . $error->getMessage() . '<br />');
    }
}
?>