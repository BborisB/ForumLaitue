<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/addCategorieController.php"; ?>
    <title>Ajouter une catégorie</title>
</head>

<body>
    <div class="page">
        <h1>Ajouter une catégorie</h1>
        <form class="myForm" action="addCategorie.php" method="post">
            <div class="label-input">
                <label for="catTitle">Titre catégorie (*)</label>
                <input type="text" maxlength="50" name="catTitle" id="catTitle" value="<?php echo $catTitle ?>">
                <span class="fieldError" id="catTitleErrorText"><?php echo $catTitleErrorText ?></span>
            </div>
            <div class="label-input">
                <label for="catDesc">Description (*)</label>
                <div class="myTextAreaDiv">
                    <textarea maxlength="255" class="myTextArea" name="catDesc" placeholder="Saisissez la description ..." id="catDesc"><?php echo $catDesc ?></textarea>
                </div>
                <span class="fieldError" id="catDescTextError"><?php echo $catDescTextError ?></span>
            </div>
            <div class="multipleElement">
                <input class="button" type="submit" value="Ajouter" id="submitBtn">
                <input class="button" type="reset" value="Reinitialiser" id="resetBtn">
                <span class="formSpanNote">(*) Ces champs sont obligatoires.</span>
            </div>
        </form>
    </div>
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/textArea.js"></script>
</body>

</html>