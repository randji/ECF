<?php
namespace Access;
use connexion\Database;
use Dashboard\admin;
use Dashboard\session;
use Dashboard\employe;


class Login
{
    public function login(){
        
        $paramSession = new admin();
        $paramSession->paramSession();

        $session = new admin();
        $session->sessionStart();
        

        require_once "views/loginViews.php";

        try{
            $pdo = new Database();
                $pdo = $pdo->getConnection();
                
                if(!isset($pdo)){
                    echo "Not connected";   
                }
                

                if (isset($_POST['email']) && isset($_POST['password'])){
                    $emailForm = $_POST['email'];
                    $passwordForm = $_POST['password'];
                }

                $query="SELECT * FROM garageparrot.users where mail = :email";
                $stmt =  $pdo->prepare($query);
                $stmt->bindParam(':email', $emailForm);
                $stmt->execute();
                var_dump($stmt->rowCount());

                if ($stmt->rowCount() == 1){
                    $monUser = $stmt->fetch(\PDO::FETCH_ASSOC);
                    var_dump($monUser);
                    

                    if (password_verify($passwordForm, $monUser['password'])){
                        session_regenerate_id(true);
                        $_SESSION['user'] = $monUser;
                        var_dump($_SESSION['user']);
                        if ($monUser['role'] == 'admin') {
                            $admin = new admin();
                            $admin->adminAction();
                            
                            
                        }
                        if ($monUser['role'] == 'employe'){
                            $employe = new employe();
                            $employe->employeAction();
                        }
                    }
                }

                else{
                    echo "connexion refusée";
                }

        }
        catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}