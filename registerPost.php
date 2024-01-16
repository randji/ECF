<?php

$dsn = 'mysql:host=localhost;dbname=garageparrot';
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    $hashedPassword = password_hash($passwordForm,PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO garageparrot.admin (mail, password) values (:email, :password)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':password', $passwordForm);
    $stmt->execute();

    echo "Inscription réussie";
}

catch (PDOException $e){
    echo "Erreur lors de l'inscription: ".$e->getMessage();
}





