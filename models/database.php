<?php
namespace connexion;
use Controllers\session;
class Database {
    private $host = "localhost";
    private $db_name = "garageparrot";
    private $username = "root";
    private $password = "";
    public $dsn = 'mysql:host=localhost;dbname=garageparrot';

    public function getConnection(){
        try {
            $pdo = new \PDO($this->dsn, $this->username, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
    
        } catch (\PDOException $e) {
            error_log("Erreur lors de la connexion à la base de données: " . $e->getMessage());
            exit('Une erreur s\'est produite lors de la connexion à la base de données. Veuillez réessayer plus tard.');
        }
    }
}

class logout{
    public function logout(){
        $session= new session();
        $session->sessionStart();
        session_destroy();
        unset($_SESSION);
        header('Location: ../index.php');
    }
}