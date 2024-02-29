<?php
session_set_cookie_params([
    'lifetime' => 60*60*3, // 3 heures
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => false, // attention en prod mettre à true
    'httponly' => true,
    'samesite' => 'strict'
]);

session_start();

function adminOnly()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
        header('Location: ../index.php');
    }
}
    function employeOnly()
    {
        if (!isset($_SESSION['user']) ||  $_SESSION['user']['role'] != 'employe'){
            header('Location: ../index.php');
        }
    }