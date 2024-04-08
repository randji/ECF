<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/service.css">
    <title>Mécanique de la voiture</title>
</head>
<body>

<?php require 'header.php'; ?>

    <main>
        <?php
        require 'PHP/loginServiceText.php';
        if (isset($results)) {
            foreach ($results as $result) {
                echo '<div class="title">' . $result['titre'] . '</div>';
                echo '<div class="text">' . $result['text'] . '</div>';
            }
        }
        ?>

        <button class="button"onclick="window.location.href = 'HTML/infoForm.html';">Prendre rendez-vous</button>

        <img class="fond" src="img/voitureFond.png" alt="voiture">
    </main>

<?php require 'footer.php'; ?>
    
