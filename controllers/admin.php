<?php
namespace Dashboard;
use connexion\Database;


class session{

    public function paramSession (){
        session_set_cookie_params([
            'lifetime' => 60*60*3, // 3 heures
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => false, // attention en prod mettre à true
            'httponly' => true,
            'samesite' => 'strict'
        ]);
    }

    public function sessionStart (){
        

        session_start();
        var_dump($_SESSION);
        echo "session start";
        
        
    }
    
}
// ne pas oublier de proteger les pages admin et employe
class admin extends session
{
    public function adminAction()
    {
        $this->sessionStart();

        if ($_SESSION['user']['role'] != 'admin') {
            header('Location: index.php');
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
}

class employe extends session 
{

    public function employeAction (){

        $this->sessionStart();
        if ($_SESSION['user']['role'] != 'employe') {
            header('Location: index.php');
        }
        require_once 'views\dashboardEmploye.php';
    }
}