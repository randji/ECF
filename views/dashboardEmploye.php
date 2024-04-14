
<?php

//employeOnly();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dashboardEmploye.css">
</head>
<body>


<div class="back">
    <div class="title">
        <h1>tableau de bord<br>Bonjour Mr <?php echo $_SESSION['user']['name'] ?></h1>
    </div>



    <a href="../CRUD/createUsedCard.php">
        <button type="button" class="vehicule">ajouter véhicule</button>
    </a>
    <a href="opinionVisitor.php">
        <button type="button" class="opinion">avis visiteur</button>
    </a>

        <a href="../PHP/logout.php">
            <button type="button" class="deconnexion">Déconnexion</button>
        </a>



</div>
</body>
</html>
