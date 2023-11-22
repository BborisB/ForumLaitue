<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/addCategorieController.php"; ?>
    <title>Ajouter une catégorie</title>
</head>

<body>
    <form class="myForm" action="forum.php" method="post">
        <div class="label-input">
            <label for="catTitle">Titre catégorie (*)</label>
            <input type="text" name="catTitle" id="catTitle" value="<?php echo $catTitle ?>">
            <span class="fieldError" id="catTitleErrorText"><?php echo $catTitleErrorText ?></span>
        </div>
        <div class="label-input">
            <label for="catDesc">Description (*)</label>
            <div class="myTextAreaDiv">
                <textarea class="myTextArea" name="catDesc" id="catDesc"></textarea>
            </div>
            <span class="fieldError" id="catDescTextError"><?php echo $catDescTextError ?></span>
        </div>
    </form>
    <script src="../JavaScript/textArea.js"></script>
</body>

</html>