<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php"?>
    <title>S'enregistrer</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    <div class="page">
        <h1>S'enregistrer</h1>
        <form class="myForm" id="registerForm" method="post">
            <div class="multipleElement">
                <div class="label-input">
                    <label for="firstName">Prénom (*)</label>
                    <input type="text" name="firstName" id="firstName">
                    <span class="fieldError" id="firstNameErrorText"></span>
                </div>
                <div class="label-input">
                    <label for="lastName">Nom (*)</label>
                    <input type="text" name="lastName" id="lastName">
                    <span class="fieldError" id="lastNameErrorText"></span>
                </div>
            </div>
            <div class="label-input">
                <label for="email">Email (*)</label>
                <input type="text" name="email" id="email">
                <span class="fieldError" id="emailErrorText"></span>
            </div>
            <div class="label-input">
                <label for="password">Mot de passe (*)</label>
                <input type="password" name="password" id="password">
                <span class="fieldError" id="passwordErrorText"></span>
            </div>
            <div class="label-input">
                <label for="confirmPassword">Confirmer mot de passe (*)</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span class="fieldError" id="confirmPasswordErrorText"></span>
            </div>
            <div class="label-input">
                <label for="pfp">Photo de profil (*)</label>
                <img id="pfpPreview" src="../Images/user.jpg" alt="pfp preview">
                <input type="file" name="pfp" id="pfp" accept="image/*">
                <span class="fieldError" id="pfpErrorText"></span>
            </div>
            <div class="multipleElement">
                <input class="button" type="submit" value="S'enregistrer" id="submitBtn">
                <input class="button" type="reset" value="Reinitialiser" id="resetBtn">
                <span class="formSpanNote">(*) Ces champs sont obligatoires.</span>
            </div>
        </form>
        <form class="myForm" id="registerSuccessful">
            <span>Vous êtes maintenant enregistrés. <a href="login.php">Connectez vous ici.</a></span>
        </form>
    </div>
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/register.js"></script>
</body>
</html>