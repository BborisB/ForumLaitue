<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/categorieController.php"?>
    <title>Forum</title>
    <link rel="stylesheet" href="../CSS/forum.css">
</head>

<body>
    <div class="userWelcome">
        <span id="bandeauUser"></span>
        <span id="bandeauDate"></span>
        <span id="bandeauConnection"></span>
    </div>
    <div class="page">
        <h1>Forum</h1>
        <div class="multipleElement">
            <?php foreach($categories as $categorie)
            {
                echo
                '<a class="masterCard" href="categorie.php?id='.$categorie["id"].'">
                <h1>'.$categorie["titre"].'</h1>
                <span>'.$categorie["description"]. '</span>
                <h2>Cliquez pour découvir.</h2>
                </a>';
            }
            ?>
        </div>
    </div>
    <script src="../JavaScript/bandeau.js"></script>
    <script src="../JavaScript/forum.js"></script>
</body>

</html>