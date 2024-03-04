<?php
require "../PHP/dsn.php";
require "../PHP/session.php";
//adminOnly()
$pdo=connexionBdd($dsn, $username, $password);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur : page</title>
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>
<body>


<div class="back">
    <div class="title">
        <h1>PAGE</h1>
    </div>
    <form action="../PHP/registerPost.php" method="post">
        <label for="service">SERVICE</label><br>
        <input type="text" name="service"/><br><br>

        <label for="firstname">Prénom</label>
        <input type="firstname" name="firstname"/><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email"/><br><br>

        <label for="password">Mot de passe</label><br>
        <input type="password" name="password" required/><br><br>

        <input type="submit" value="S'inscrire"/>
    </form>
    <a href="../PHP/logout.php">
        <button type="button" class="deconnexion">Déconnexion</button>
    </a>


</body>
</html>

