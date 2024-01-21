<?php

require "../PHP/dsn.php";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['email']) && isset($_POST['password'])){
        $emailForm = $_POST['email'];
        $passwordForm = $_POST['password'];
    }


    $query="SELECT * FROM garageparrot.users where mail = :email";
    $stmt =  $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if ($stmt->rowCount() == 1){
        $monUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($passwordForm, $monUser['password'])){
            if ($monUser['role'] == 'admin') {
                require "../HTML/dashboardAdmin.html";
            }
            else{
                require "../HTML/dashboardEmploye.html";
            }
        }
    }
        else{
            require_once "../HTML/deniedConnect.html";
        }
}
catch (PDOException $e){
    echo "Erreur lors de l'inscription: ".$e->getMessage();
}


