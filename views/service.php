<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/service.css">
    <title>Réparation carrosserie</title>
</head>
<body>

<?php 
    require 'header.php';
    require '../models/database.php';
    require '../controllers/serviceController.php';
    $pdo= new Database();
    $pdo = $pdo->getConnection();
    $serviceController = new serviceController();
    $results = $serviceController->getShowText();

?>

    <main>
        

        <?php
        
        var_dump($results);
        if (isset($results)) {
            foreach ($results as $result) {
                echo '<div class="title">' . $result['titre'] . '</div>';
                echo '<div class="text">' . $result['text'] . '</div>';
            }
        }
        ?>

        <img class="fond" src="../img/voitureFond.png" alt="voiture">

        <button class="button"onclick="window.location.href = '../HTML/infoForm.html';">Prendre rendez-vous</button>
    </main>
        
<?php require 'footer.php'; ?>

</body>
</html>