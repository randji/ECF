<?php
namespace Controllers;
use connexion\Database;

class gallery{
    public function showCar()
    {   require 'views/gallery.php';
        $pdo = new Database();
        $pdo = $pdo->getConnection();
        var_dump($pdo);
        
        $sql=  "SELECT * FROM garageparrot.cars";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $voitures = $stmt->fetchall(\PDO::FETCH_ASSOC);
        var_dump($voitures);

        if (isset($_POST['getAllCars']) && $_POST['getAllCars'] === 'true') {
            echo json_encode($voitures);
            require_once 'views/gallery.php';
            exit;
            
        } 
        
        else if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
            $column = 'price';
            $min= $_POST['minPrice'];
            $max= $_POST['maxPrice'];
            $voitures=filter($column, $min, $max, $pdo);
            
            return $voitures;
            exit;
        }
        
        else if (isset($_POST['minkm']) && isset($_POST['maxkm'])) {
            $column = 'numberKm';
            $min= $_POST['minkm'];
            $max= $_POST['maxkm'];
            $voitures=filter($column, $min, $max, $pdo);
            return $voitures;
            exit;
        }
        
        else if (isset($_POST['minYear']) && isset($_POST['maxYear'])) {
            $column = 'yearsService';
            $min= $_POST['minYear'];
            $max= $_POST['maxYear'];
            $voitures=filter($column, $min, $max, $pdo);
            return $voitures;
            exit;
        }
    return $voitures;
    }
}