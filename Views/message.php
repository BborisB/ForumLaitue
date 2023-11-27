<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../Includes/head.php";
    require_once "../Controllers/messageController.php";
    require_once "../Controllers/addMessageController.php";?>
    <title>Sujet</title>
    <link rel="stylesheet" href="../CSS/message.css">
</head>
<body>
    <div class="newBody">
        <?php require_once "../Includes/bandeauUser.php"?>
        <div class="page">
            <div class="chat-enterMessage">
                <div class="chat" id="chat">
                    <h1 id="title"><?php echo $sujet["titreSujet"]?></h1>
                    <hr>
                    <div class="message">
                        <div class="auteur-message">
                            <span class="auteur">auteur</span>
                            <span class="date">XX/XX/XXXX XX:XX</span>
                        </div>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt inventore aperiam repudiandae soluta ipsum, at iure ipsa eos sapiente repellat suscipit quam cum ad magnam provident quae accusantium est maiores!</span>
                    </div>
                    <hr>
                    <?php foreach($messages as $message)
                    {
                        echo
                        '<div class="message">
                        <div class="auteur-message">
                        <span class="auteur">'.$message["prenom"].' '.$message["nom"].'</span>
                        <span class="date">'.$message["dateMessage"].'</span>
                        </div>
                        <span>'.$message["textMessage"].'</span>
                        </div>
                        <hr>
                        ';
                    }
                    ?>
                </div>
                <form id="#test" class="enterMessage" action="message.php?idSujet=<?php echo $idSujet?>" method="post">
                    <div class="myTextAreaDiv">
                        <textarea name="textMessage" spellcheck="false" class="myTextArea" placeholder="Entrez un message." rows="1"></textarea>
                    </div>
                    <input class="button" type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
    <!-- <script src="../JavaScript/bandeau.js"></script> -->
    <script src="../JavaScript/button.js"></script>
    <script src="../JavaScript/textArea.js"></script>
    <script src="../JavaScript/message.js"></script>
</body>
</html>