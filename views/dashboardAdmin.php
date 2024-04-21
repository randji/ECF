


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
            <p>tableau de bord</p>
            <p>ADMINISTRATEUR</p>
        </div>


        <div class="page">
            <h2>PAGE</h2>
            <form class="pageInput" method="POST" action="/page">
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


        <a href="/logout">
            <button type="button" class="deconnexion">Déconnexion</button>
        </a>

    </div>
</body>
</html>


