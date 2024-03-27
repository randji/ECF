<?php

function filter($column, $min, $max, $pdo){
    // $minPrice = $_POST['minPrice'];
    // $maxPrice = $_POST['maxPrice'];
        
                try {
                    $sql=  "SELECT * FROM garageparrot.cars WHERE $column BETWEEN :min AND :max";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':min' => $min, ':max' => $max]);
                    $cars = $stmt->fetchall(PDO::FETCH_ASSOC);
                    echo json_encode($cars);
                    
                } catch (PDOException $e) {
                    // Envoie l'erreur au client
                    echo json_encode(['error' => 'Une erreur est survenue lors de la récupération des voitures : ' . $e->getMessage()]);
                }
                
                exit;
}