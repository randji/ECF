<?php

$dsn = 'mysql:host=localhost;dbname=garageparrot';
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nameForm = $_POST['name'];
    $firstnameForm = $_POST['firstname'];
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];


    $hashedPassword = password_hash($passwordForm,PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO garageparrot.users (name, firstname, mail, password) values (:name, :firstname, :email, :password)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':name', $nameForm);
    $stmt->bindParam(':firstname', $firstnameForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':password', $hashedPassword );
    $stmt->execute();

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Inscription Réussie</title>";
    echo "<style>";
    echo "  .message-success {";
    echo "    color: green;";
    echo "    font-size: 24px;";
    echo "    text-align: center;";
    echo "    margin-top: 50px;";
    echo "  }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "  <div class='message-success'>Inscription réussie !</div>";
    echo "</body>";
    echo "</html>";
}

catch (PDOException $e){
    echo "Erreur lors de l'inscription: ".$e->getMessage();
}





