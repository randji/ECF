<?php
require_once "../dsn.php";

$pdo=connexionBdd($dsn, $username, $password);

$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];

$sql=  "SELECT * FROM garageparrot.cars WHERE price BETWEEN :minPrice AND :maxPrice";
$stmt = $pdo->prepare($sql);
$stmt->execute([':minPrice' => $minPrice, ':maxPrice' => $maxPrice]);
$voitures = $stmt->fetchall(PDO::FETCH_ASSOC);

echo json_encode($voitures);
?>
