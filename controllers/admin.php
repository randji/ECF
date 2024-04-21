<?php
namespace Controllers;
use connexion\Database;



// -------------------------session--------------------------------

class session{

    public function paramSession (): void
    {
        session_set_cookie_params([
            'lifetime' => 60*60*3, // 3 heures
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => false, // attention en prod mettre à true
            'httponly' => true,
            'samesite' => 'strict'
        ]);
    }

    public function sessionStart (): void
    {
        session_start();
    }
    
}

// -------------------------admin--------------------------------

// ne pas oublier de proteger les pages admin et employe
class admin extends session
        {
            public function adminAction()
            {
                //$this->sessionStart();

                if ($_SESSION['user']['role'] != 'admin') {
                    require_once 'index.php';
                }

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
                    require_once 'views\dashboardAdmin.php';
                    return $results;
                }
                catch(\PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }   
            }

            public function page()
                {
                    /*if(session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                    }*/

                    /*$this->sessionStart();
                    var_dump($_SESSION['user']['role']);

                    if ($_SESSION['user']['role'] != 'admin') {
                        require_once 'index.php';
                    }*/
                    
                    try{
                        //recuperer l'id de la page selectionnée
                        if (isset($_POST['service'])){
                        $idServiceForm = $_POST['service'];

                        $pdo = new Database();
                        $pdo = $pdo->getConnection();
                        
                        if(!isset($pdo)){
                            echo "Not connected";   
                        } 
                        //recuperer le titre correspondant à l'id selectionné (clé étrangère de la table page)
                        $sql = "SELECT * FROM page INNER JOIN pagename ON page.pagename = pagename.id_pageName WHERE pagename.id_pageName = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':id', $idServiceForm);
                        $stmt->execute();

                        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        
                        require_once 'views/createPage.php';
                        return $results;
                        }
                        else{
                            echo "erreur";
                        }
                    }
                    catch(\PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }   


                }
                public function changePage(){
                    
                        /*if(session_status() !== PHP_SESSION_ACTIVE) {
                            session_start();
                        }*/

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
                            require_once 'views\createPage.php';
                            return $results;
                            

                            if($_POST){
                                $titre = $_POST['titre'];
                                $texte = $_POST['texte'];
                                $service = $_POST['service'];
                            
                                $sql = "INSERT INTO page (titre, text, pagename) VALUES (:titre, :texte, :service)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->bindParam(':titre', $titre);
                                $stmt->bindParam(':texte', $texte);
                                $stmt->bindParam(':service', $service);
                                $stmt->execute();
                                
                            }
                        }
                        catch(\PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        } 


                }
        }

        
//-------------------------employe--------------------------------


class employe extends session 
        {

            public function employeAction (){

                if(session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                    
                }
                if ($_SESSION['user']['role'] != 'employe') {
                    
                    require_once 'index.php';
                }
 
                require_once 'views\dashboardEmploye.php';
            }
        }