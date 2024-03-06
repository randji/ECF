<?php
require "../PHP/dsn.php";
require "../PHP/session.php";

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$pdo=connexionBdd($dsn, $username, $password);

//menu déroulant
$sql = "SELECT * FROM pagename";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $service = $_POST['service'];

    $sql = "INSERT INTO page (titre, text, pagename) VALUES (:titre, :texte, :service)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':service', $service);
    $stmt->execute();

    $_session['message'] = "Page ajoutée avec succès";
    header('Location: ../admin/dashboardAdmin.php');
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
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>
<body>
<section>
    <?php
    if (!empty($_SESSION['erreur'])){ ?>
        <div class="erreur">
            <?= $_SESSION['erreur'] ?>
        </div>
    <?php }?>

    <h1>Créer une page</h1>
    <form method="POST">
        <select name="service" id="service" class="selectPage">
            <?php
            foreach ($results as $result) {
                echo "<option value='".$result['id_pageName']."'>".$result['namePage']."</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="titre"> TITRE</label>
        <input type="text" name="titre" required/><br><br>
        <label for="texte">TEXTE</label>
        <textarea name="texte" rows="10" cols="50" required></textarea><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</section>

</body>
