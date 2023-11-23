<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/addSujetController.php";
    require_once "../Controllers/sujetController.php";?>
    <title>Categories</title>
    <link rel="stylesheet" href="../CSS/categorie.css">
</head>
<body>
    <div class="userWelcome">
        <span id="bandeauUser"></span>
        <span id="bandeauDate"></span>
        <span id="bandeauConnection"></span>
    </div>
    <div class="page">
        <h1 id="pageTitle"></h1>
        <table class="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sujet</th>
                    <th>Dernier commentaire</th>
                    <th>Auteur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=0;$i<count($sujets);$i++)
                {
                    $sujet = $sujets[$i];
                    echo
                    '<tr>
                    <td>'.($i+1).'</td>
                    <td><a href="message.php?idSujet='.$sujet["idSujet"].'">'.$sujet["titreSujet"].'</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <button class="button" id="addBtn">Ajouter un sujet</button>
    </div>
    <dialog id="addSujetDialog">
        <form class="addWindow" action="<?php echo "sujet.php?idCat=".$_GET["idCat"]?>" method="post">
            <h1>Ajouter un sujet</h1>
            <div class="label-input">
                <label for="titreSujet">Titre du sujet</label>
                <input name="titreSujet" type="text" id="titreSujet">
                <span class="fieldError" id="titreSujetTextError"></span>
            </div>
            <div class="multipleElement">
                <input class="button" type="submit" value="Ajouter">
                <button type="button" id="cancelBtn" class="button">Annuler</button>
            </div>
        </form>
    </dialog>
    <!-- <script src="../JavaScript/bandeau.js"></script> -->
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/categorie.js"></script>
</body>
</html>