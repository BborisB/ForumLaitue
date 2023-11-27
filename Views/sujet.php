<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/sujetController.php";?>
    <title>Categories</title>
    <link rel="stylesheet" href="../CSS/categorie.css">
</head>

<body>
    <?php require_once "../Includes/bandeauUser.php"?>
    <div class="page">
        <h1 id="pageTitle"><?php echo $catName?></h1>
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
                for ($i = 0; $i < count($sujets); $i++)
                {
                    $sujet = $sujets[$i];
                    echo
                    '<tr>
                    <td>' . ($i + 1) . '</td>
                    <td><a href="message.php?idSujet=' . $sujet["idSujet"] . '">' . $sujet["titreSujet"] . '</a></td>
                    <td>'.$sujet["dernierMessage"].'</td>
                    <td>'.$sujet["prenom"].' '.$sujet["nom"].'</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <button class="button" id="addBtn">Ajouter un sujet</button>
    </div>
    <dialog id="addSujetDialog">
        <form id="addSujetForm" class="addWindow" action="<?php echo "../Controllers/addSujetController.php?idCat=" . $_GET["idCat"] ?>" method="post">
            <h1>Ajouter un sujet</h1>
            <div class="label-input">
                <label for="titreSujet">Titre du sujet</label>
                <input name="titreSujet" type="text" id="titreSujet">
                <span class="fieldError" id="titreSujetErrorText"></span>
            </div>
            <div class="label-input">
                <label for="message">Message</label>
                <div id="messageDiv" class="myTextAreaDiv">
                    <textarea class="myTextArea" id="message" name="message" rows="1" spellcheck="false"></textarea>
                </div>
                <span class="fieldError" id="messageErrorText"></span>
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
    <script src="../JavaScript/textArea.js"></script>
    <script src="../JavaScript/sujet.js"></script>
</body>

</html>