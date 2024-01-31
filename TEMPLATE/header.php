<?php
require '../PHP/dsn.php';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_url = $_SERVER['REQUEST_URI'];
switch ($current_url) {
    case '../index.php':
        $pageactive = 0;
        break;
    case 'Maintenance.php':
        $pageactive = 2;
        break;
    case 'mechanicalCar.php':
        $pageactive = 3;
        break;
    case 'usedCarSale.php':
        $pageactive = 4;
        break;
    case 'repairBodywork.php':
        $pageactive = 1;
        break;
    default:
        $pageactive = 1;
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<header class="background">
    <a href="../index.php" style="color: white;
    font-family: 'Ramaraja', serif;
    font-size: 40px;
    display: flex;
    align-items: center;
    justify-items: center;
    text-decoration:none">
        V. PARROT
    </a>
    <?php
    // Récupérer l'URL actuelle et la diviser en segments
    $url = $_SERVER['REQUEST_URI'];
    $segments = explode('/', $url);

    // Définir l'URL de base pour les liens du fil d'ariane
    $base_url = '../';

    echo '<nav aria-label="breadcrumb">';
    echo '<ul class="breadcrumb">';

    // Parcourir chaque segment et créer un lien pour chaque
    foreach ($segments as $segment) {
        if (!empty($segment)) {
            $base_url .= $segment . '/';
            $segment = ucfirst($segment); // Mettre la première lettre en majuscule
            echo '<li><a href="' . $base_url . '">' . $segment . '</a></li>';
        }
    }

    echo '</ul>';
    echo '</nav>';
    ?>


    <!--segmenter l'url en tableau-->
    <?php
    // Récupérer l'URL actuelle et la diviser en segments
    $url = $_SERVER['REQUEST_URI'];
    $segments = explode('/', $url);

    // Définir l'URL de base pour les liens du fil d'ariane
    $base_url = '../';

    echo '<nav aria-label="breadcrumb">';
    echo '<ul class="breadcrumb">';

    // Parcourir chaque segment et créer un lien pour chaque
    foreach ($segments as $segment) {
        if (!empty($segment)) {
            $base_url .= $segment . '/';
            $segment = ucfirst($segment); // Mettre la première lettre en majuscule
            echo '<li><a href="' . $base_url . '">' . $segment . '</a></li>';
        }
    }

    echo '</ul>';
    echo '</nav>';
    ?>
<!-- Breadcrumb -->
<!--<nav aria-label="breadcrumb">
  <ul class="breadcrumb">
    <li><a href="../index.php">Accueil</a></li>
    <li><a href="#" class="active">Page actuelle</a></li>
  </ul>
</nav>
</nav>-->
