<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php"?>
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
        <table id="categorieTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sujet</th>
                    <th>Dernier commentaire</th>
                    <th>Auteur</th>
                </tr>
            </thead>
            <tbody><tr></tr></tbody>
        </table>
        <button id="addBtn">Ajouter un sujet</button>
    </div>
    <div class="addWindowBackground" id="addWindow">
        <div class="addWindow">
            <h1>Ajouter un sujet</h1>
            <div class="label-input">
                <label for="subjectName">Titre du sujet</label>
                <input type="text" id="subjectName">
                <span class="fieldError" id="subjectNameErrorText"></span>
            </div>
            <div class="multipleElement">
                <button id="addWindowCancel">Annuler</button>
                <button id="addWindowAdd">Ajouter</button>
            </div>
        </div>
    </div>
    <script src="../JavaScript/bandeau.js"></script>
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/category.js"></script>
</body>
</html>