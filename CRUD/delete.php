
<?php
require "../PHP/session.php";
require "../dsn.php";

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$pdo=connexionBdd($dsn, $username, $password);

if(isset($_GET['id'])){
    $id=  strip_tags ( $_GET['id']);
    $query = "DELETE FROM page WHERE id_page = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $_SESSION['message'] = "Page effacée avec succès";
    header('Location: ../admin/dashboardAdmin.php');

}