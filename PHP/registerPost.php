<?php
require "../PHP/dsn.php";
$pdo=connexionBdd($dsn, $username, $password);

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
    require "../HTML/sucessRegistre.html";








