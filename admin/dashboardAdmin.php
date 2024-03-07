
<?php
require "../dsn.php";
require_once "../PHP/session.php";
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
//adminOnly();

$pdo=connexionBdd($dsn, $username, $password);

$sql = "SELECT * FROM pagename";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <!-- Affichage erreur si produit non trouvé -->
        <?php
        if (!empty($_SESSION['erreur'])){ ?>
            <div class="erreur">
                <?= $_SESSION['erreur'] ?>
            </div>
        <?php
        unset($_SESSION['message']);
        } ?>
           <!-- Affichage message si SUCCES-->
        <?php
        if (!empty($_SESSION['message'])){ ?>
            <div class="message">
                <?= $_SESSION['message'] ?>
            </div>
            <?php
            unset($_SESSION['message']);
        } ?>
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
                }
                ?>
            </select>
            <input type="submit" value="Sélectionner" class="inputPage"/>
            </form>
        </div>

    </div>


            <a href="horairePost.php">
                <button type="button" class="horaire">HORAIRE</button>
            </a>

    <a href="creercomptePost.php">
        <button type="button" class="compte">CREER COMPTE</button>
    </a>


            <a href="../PHP/logout.php">
                <button type="button" class="deconnexion">Déconnexion</button>
            </a>
        

</body>
</html>


