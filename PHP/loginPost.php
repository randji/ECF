<?php

require_once dirname(__DIR__) . '/dsn.php';
require "session.php";
var_dump($_POST);

$pdo=connexionBdd($dsn, $username, $password);


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
            session_regenerate_id(true);
            $_SESSION['user'] = $monUser;
            if ($monUser['role'] == 'admin') {
                header('Location: ../admin/dashboardAdmin.php');
                
            }
            if ($monUser['role'] == 'employe'){
                header('Location: ../employe/dashboardEmploye.php');
            }
        }
    }
        else{
            require_once "../HTML/deniedConnect.html";
        }




