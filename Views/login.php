<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/loginController.php";?>
    <title>Se connecter</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="page">
        <h1>Se connecter</h1>
        <form class="myForm myFormColumn" id="loginForm" action="login.php" method="post">
            <span class="fieldError" id="loginErrorText"></span>
            <div class="label-input">
                <label for="email">Email (*)</label>
                <input type="text" name="email" id="email" value="<?php echo $email?>">
                <span class="fieldError" id="emailErrorText"><?php echo $emailErrorText?></span>
            </div>
            <div class="label-input">
                <label for="password">Mot de passe (*)</label>
                <input type="password" name="password" id="password" value="<?php echo $password?>">
                <span class="fieldError" id="passwordErrorText"><?php echo $passwordErrorText?></span>
            </div>
            <div class="multipleElement">
                <input class="button" type="submit" value="Se connecter" id="submitBtn">
                <input class="button" type="reset" value="Reinitialiser" id="resetBtn">
                <span class="formSpanNote">(*) Ces champs sont obligatoires.</span>
            </div>
        </form>
    </div>
    <script src="../JavaScript/button.js"></script>
    <!-- <script src="../JavaScript/login.js"></script> -->
</body>
</html>