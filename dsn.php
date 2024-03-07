<?php
$dsn = 'mysql:host=localhost;dbname=garageparrot';
$username = 'root';
$password =  '';

function connexionBdd($dsn, $username, $password)
{
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch (PDOException $e) {
        error_log("Erreur lors de la connexion à la base de données: " . $e->getMessage());
        exit('Une erreur s\'est produite lors de la connexion à la base de données. Veuillez réessayer plus tard.');
    }
}
