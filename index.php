<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "Includes/head.php"?>
    <title>Bienvenue</title>
    <link rel="stylesheet" href="CSS/acceuil.css">
</head>
<body>
    <div class="userWelcome">
        <span id="bandeauUser"></span>
        <span id="bandeauDate">Bienvenue. Enregistrez vous, ou connectez vous.</span>
        <span id="bandeauConnection"></span>
    </div>
    <div class="page">
        <h1>Bienvenue !</h1>
        <div class="imgAcceuilDiv">
            <img class="imgAcceuil" src="Images/Laitue1.jpg" alt="Une laitue sur une table.">
            <div class="catchphrase">
                <span>La laitue comme vous ne l'avez jamais vue.</span>
            </div>
        </div>
        <div class="multipleElement">
            <a class="button" href="Views/register.php">S'enregistrer</a>
            <a class="button" href="Views/login.php">Se connecter</a>
        </div>
    </div>
    <script src="JavaScript/button.js"></script>
</body>
</html>