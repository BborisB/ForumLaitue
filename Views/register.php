<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/registerController.php" ?>
    <title>S'enregistrer</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>

<body>
    <div class="page">
        <h1>S'enregistrer</h1>
        <form class="myForm myFormColumn" id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="pfpDiv">
                <div class="label-input">
                    <label for="pfp">Photo de profil</label>
                    <div class="pfpDiv2">
                        <div id="pfpContainer" class="rect-img-container">
                            <img id="pfpPreview" class="rect-img" src="../PFP/user.jpg" alt="pfp preview">
                        </div>
                        <button type="button" id="pfpBtn" class="button">Modifier</button>
                    </div>
                    <span class="fieldError" id="pfpErrorText"><?php echo $pfpErrorText ?></span>
                    <input type="file" name="pfp" id="pfp" accept="image/*">
                </div>
                <div class="myFormColumn">
                    <div class="label-input">
                        <label for="firstName">Prénom (*)</label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $firstName ?>">
                        <span class="fieldError" id="firstNameErrorText"><?php echo $firstNameErrorText ?></span>
                    </div>
                    <div class="label-input">
                        <label for="lastName">Nom (*)</label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $lastName ?>">
                        <span class="fieldError" id="lastNameErrorText"><?php echo $lastNameErrorText ?></span>
                    </div>
                </div>
            </div>
            <div class="label-input">
                <label for="email">Email (*)</label>
                <input type="text" name="email" id="email" value="<?php echo $email ?>">
                <span class="fieldError" id="emailErrorText"><?php echo $emailErrorText ?></span>
            </div>
            <div class="label-input">
                <label for="password">Mot de passe (*)</label>
                <input type="password" name="password" id="password" value="<?php echo $password ?>">
                <span class="fieldError" id="passwordErrorText"><?php echo $passwordErrorText ?></span>
            </div>
            <div class="label-input">
                <label for="confirmPassword">Confirmer mot de passe (*)</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span class="fieldError" id="confirmPasswordErrorText"><?php echo $confirmPasswordErrorText ?></span>
            </div>
            <div class="multipleElement">
                <input class="button" type="submit" value="S'enregistrer" id="submitBtn">
                <input class="button" type="reset" value="Reinitialiser" id="resetBtn">
                <span class="formSpanNote">(*) Ces champs sont obligatoires.</span>
            </div>
        </form>
    </div>
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/register.js"></script>
</body>

</html>