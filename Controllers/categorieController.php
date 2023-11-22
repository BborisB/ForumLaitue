<?php
require_once "../Includes/connectDb.php";
$connect = connect();
$categories = $connect->query("SELECT * FROM categorie")->fetchAll();
?>