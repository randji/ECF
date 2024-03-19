<?php
require_once "../dsn.php";
$id = $_GET['id'];


$pdo=connexionBdd($dsn, $username, $password);

$sql ="SELECT* FROM garageparrot.cars where id_car = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$voiture = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/galleryStyle.css">
    <title>Detail voiture</title>
</head>

<body>

    <?php require '../header.php'; ?>

    <div class="card">
        <img class="imgCar" src="<?= $voiture['photo']?>" alt="image voiture">
        <img class="imgCar" src="<?= $voiture['photo2']?>" alt="image voiture">
        <img class="imgCar" src="<?= $voiture['photo3']?>" alt="image voiture">
        <p>Modèle : <?=$voiture['model']?> </p>
        <p>Prix :<?=$voiture['price']?> </p>
        <p>Année : <?=$voiture['yearsService']?></p>
        <p>Kilométrage : <?=$voiture['numberKm']?></p>
        <p>Boite de vitesse : <?=$voiture['gearbox']?></p>
        <p>Carburant : <?=$voiture['carburant']?></p>
        <p>Equipement : <?=$voiture['equipement']?></p>
        <a href="detailCar.php?id=<?=$voiture['id_car'] ?>">
            <button type="button" class="detail">details</button>
        </a>
    </div>

                <?php require '../footer.php'; ?>
</body>
</html>
