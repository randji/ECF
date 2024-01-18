<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/loginStyle.css">
    <title>Connexion</title>
</head>

<body>

<header></header>

<main>
    <div class="register">
        <h1>CONNECTION</h1>
        <FORM ACTION="loginPost.php" method="post">

            <label for="email">Email</label><br>
            <input type="email" name="email"/><br><br>

            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" required/><br><br>

            <input type="submit" value="S'inscrire"/>
        </FORM>

        <img class="logo" src="../img/LOGO_Vparrot.png" alt="logo">

    </div>
</main>

<footer></footer>
</body>

</html>


<?php

