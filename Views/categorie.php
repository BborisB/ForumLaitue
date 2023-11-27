<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/categorieController.php"?>
    <title>Forum</title>
    <link rel="stylesheet" href="../CSS/forum.css">
</head>

<body>
    <?php require_once "../Includes/bandeauUser.php"?>
    <div class="page">
        <h1>Forum</h1>
        <div class="multipleElement">
            <?php foreach($categories as $categorie)
            {
                echo
                '<a class="masterCard" href="sujet.php?idCat='.$categorie["idCategorie"].'">
                <h1>'.$categorie["titreCategorie"].'</h1>
                <span>'.$categorie["descCategorie"]. '</span>
                <h2>Cliquez pour découvir.</h2>
                </a>';
            }
            ?>
        </div>
    </div>
</body>

</html>