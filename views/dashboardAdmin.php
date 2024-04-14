
<?php
/*require_once "../PHP/session.php";
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}*/
//adminOnly();


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>
<body>

    <div class="back">


        <div class="title">
            <h1>tableau de bord<br>ADMINISTRATEUR</h1>
        </div>


        <div class="page">
            <h2>PAGE</h2>
            <form action="pagePost.php" method="POST">
            <select name="service" id="service" class="selectPage">
                <?php
                foreach ($results as $result) {
                    echo "<option value='".$result['id_pageName']."'>".$result['namePage']."</option>";
                }?>
            </select>
            <input type="submit" value="Sélectionner" class="inputPage"/>
            </form>
        </div>


        <a href="horairePost.php">
            <button type="button" class="horaire">HORAIRE</button>
        </a>

        <a href="register.php">
            <button type="button" class="compte">CREER COMPTE</button>
        </a>


        <a href="../PHP/logout.php">
            <button type="button" class="deconnexion">Déconnexion</button>
        </a>

    </div>
</body>
</html>


