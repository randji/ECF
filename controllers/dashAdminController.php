<?php
namespace Dashboard;
use connexion\Database;

class ManageAdmin
{
    public function selectService (){

        try{
            $pdo = new Database();
            $pdo = $pdo->getConnection();
            
            if(!isset($pdo)){
                echo "Not connected";   
            } 
            
            $sql = "SELECT * FROM pagename";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }
        catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    
};