<?php
namespace Access;
use connexion\Database;
use Controllers\admin;
use Controllers\session;
use Controllers\employe;


class Login
{
    public function viewLogin(){
        
        require_once "views/loginViews.php";
    }


    public function login(){
        
        $paramSession = new admin();
        $paramSession->paramSession();

        $session = new admin();
        $session->sessionStart();


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
                

                if ($stmt->rowCount() == 1){
                    $monUser = $stmt->fetch(\PDO::FETCH_ASSOC);
                    
                    

                    if (password_verify($passwordForm, $monUser['password'])){
                        session_regenerate_id(true);
                        $_SESSION['user'] = $monUser;
                        
                        if ($monUser['role'] == 'admin') {
                            $admin = new admin();
                            $admin->adminAction();
                            exit();
                            
                            
                        }
                        elseif ($monUser['role'] == 'employe'){
                            $employe = new employe();
                            $employe->employeAction();
                            exit();
                        }
                        else{
                            echo "accés refusée";
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