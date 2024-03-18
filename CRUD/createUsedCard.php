<?php
require "../dsn.php";
require "../PHP/session.php";

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$pdo=connexionBdd($dsn, $username, $password);

if($_POST){

    if(isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($file_parts));

        $extensions = array("jpeg", "jpg", "png");

        if(empty($errors)==true){
            $upload_dir = "../img/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
            $image = $upload_dir . $file_name;
        }else{
            print_r($errors);
        }
    }
    $model = $_POST['model'];
    $price = $_POST['price'];
    $years = $_POST['years'];
    $km = $_POST['km'];
    $gears = $_POST['gears'];
    $carburant = $_POST['carburant'];
    $equipement = $_POST['equipement'];


    $sql = "INSERT INTO garageparrot.cars (model, price, photo,yearsService,numberKm,gearbox,carburant,equipement) VALUES (:model, :price, :image, :years, :km, :gears, :carburant, :equipement)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':years', $years);
    $stmt->bindParam(':km', $km);
    $stmt->bindParam(':gears', $gears);
    $stmt->bindParam(':carburant', $carburant);
    $stmt->bindParam(':equipement', $equipement);
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
                <label for="image">IMAGE</label>
                <input type="file" name="image" required/><br><br>
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
