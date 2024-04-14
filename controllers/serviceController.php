<?php



namespace Controllers;

use connexion\Database;

class ServiceController extends Controller
{

    public function getShowText()
        {
            try 
            {
                $pdo = new Database();
                $pdo = $pdo->getConnection();
                
                if(!isset($pdo)){
                    echo "Not connected";   
                }
                
    
                $pagename = $_GET['id'];
                
                
                if(isset ($pagename)){
                    $stmt = $pdo->prepare("SELECT titre, text FROM garageparrot.page WHERE pagename = :pagename");
    
                $stmt->execute([':pagename' => $pagename]);
    
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
                require_once 'views/service.php';
                return $results;
                
                
                }
                else{
                    header ('HTTP/1.1 404 not found');
                }
                
            }
            // le \ avant PDO indique que PDO est dans l'espace de noms global de PHP
            catch(\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
};



    