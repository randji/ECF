<?php
require "../dsn.php";
require "../PHP/session.php";
require "../function/usedCarRegistrer.php";

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$pdo=connexionBdd($dsn, $username, $password);

if($_POST){

    $image1 = uploadImage('image1');
    $image2 = uploadImage('image2');
    $image3 = uploadImage('image3');
    $model = $_POST['model'];
    $price = $_POST['price'];
    $years = $_POST['years'];
    $km = $_POST['km'];
    $gears = $_POST['gears'];
    $carburant = $_POST['carburant'];
    $equipement = $_POST['equipement'];


    $sql = "INSERT INTO garageparrot.cars (model, price, photo,yearsService,numberKm,gearbox,carburant,equipement,photo2,photo3) VALUES (:model, :price, :image1, :years, :km, :gears, :carburant, :equipement, :image2, :image3)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':image1', $image1);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':years', $years);
    $stmt->bindParam(':km', $km);
    $stmt->bindParam(':gears', $gears);
    $stmt->bindParam(':carburant', $carburant);
    $stmt->bindParam(':equipement', $equipement);
    $stmt->bindParam(':image2', $image2);
    $stmt->bindParam(':image3', $image3);
    $stmt->execute();

   /* $_session['message'] = "Page ajoutée avec succès";
    header('Location: ../admin/dashboardAdmin.php');*/
}/*else{
    $_SESSION['erreur'] = "Le formulaire est incomplet";
}*/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREER UNE PAGE</title>
    <link rel="stylesheet" href="../CSS/crud.css">
</head>
<body>
<section>
    <?php
    if (!empty($_SESSION['erreur'])){ ?>
        <div class="erreur">
            <?= $_SESSION['erreur'] ?>
        </div>
    <?php }?>


<main class="back">
    <h1 class="title">Ajouter véhicule</h1>
            <form method="POST" enctype="multipart/form-data">
                <label for="image1">IMAGE 1</label>
                <input type="file" name="image1" required/><br><br>
                <label for="image2">IMAGE 2</label>
                <input type="file" name="image2" required/><br><br>
                <label for="image3">IMAGE 3</label>
                <input type="file" name="image3" required/><br><br>
                <label for="model">Modèle</label>
                <input type="text" name="model" required/><br><br>
                <label for="price">Prix</label>
                <input type="number" name="price" required/><br><br>
                <label for="years">Année</label>
                <input type="number" name="years" required/><br><br>
                <label for="km">Kilométrage</label>
                <input type="number" name="km" required/><br><br>
                <label for="gears">Type de boite de vitesse</label>
                <input type="texte" name="gears" required/><br><br>
                <label for="carburant">Carburant</label>
                <input type="text" name="carburant" required/><br><br>
                <label for="equipement">Equipement</label>
                <textarea name="equipement" rows="5" cols="50" ></textarea><br><br>
                <button class="button" type="submit">Enregistrer</button>
    </form>
</main>

</section>

</body>
