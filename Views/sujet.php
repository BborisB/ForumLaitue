<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php"?>
    <title>Sujet</title>
    <link rel="stylesheet" href="../CSS/subject.css">
</head>
<body>
    <div class="newBody">
        <div class="userWelcome">
            <span id="bandeauUser"></span>
            <span id="bandeauDate"></span>
            <span id="bandeauConnection"></span>
        </div>
        <div class="page">
            <div class="chat-enterMessage">
                <div id="chat">
                    <h1 id="title"></h1>
                    <hr/>
                </div>
                <div class="enterMessage">
                    <div id="textAreaDiv">
                        <textarea spellcheck="false" id="textAreaMessage" placeholder="Entrez un message." rows="1"></textarea>
                    </div>
                    <button id="sendBtn">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../JavaScript/bandeau.js"></script>
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/sujet.js"></script>
</body>
</html>