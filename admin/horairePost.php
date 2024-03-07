<?php
//require_once "session.php";
require "../dsn.php";
$pdo=connexionBdd($dsn, $username, $password);

if($_POST){
    $week = $_POST['week'];
    $sunday = $_POST['sunday'];

    $sql = "UPDATE garageparrot.schedule SET week=:semaine, sunday=:dimanche where id_schedule=1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':semaine', $week);
    $stmt->bindParam(':dimanche', $sunday);
    $stmt->execute();

    $_SESSION['message'] = "Horaire ajouté avec succès";
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
    <title>Horaire</title>
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>
<body>
<section class="back">
    <h1>HORAIRE</h1>
    <form method="POST">
        <label for="week">SEMAINE</label><br><br>
        <input type="text" name="week" id="week" placeholder="Semaine : jour et horaire d'ouverture"/><br><br>
        <label for="sunday">DIMANCHE</label><br><br>
        <input type="text" name="sunday" id="sunday" placeholder="Dimanche : jour et horaire d'ouverture"/><br><br>
        <input type="submit" value="Ajouter" class="inputPage"/>
    </form>

</section>

</body>
