<?php
namespace Controllers;

use connexion\Database;

class Crud
{
    public function create(){
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
            
                $_session['message'] = "Page ajoutée avec succès";
                header('Location: ../admin/dashboardAdmin.php');
                }
        
        }catch(\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }
};

class update{

    public function updatePage(){

        $pdo = new Database();
        $pdo = $pdo->getConnection();

        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if ($_POST)
            if(isset($_POST['titre']) && isset($_POST['texte'])){
                $titre = strip_tags($_POST['titre']);
                $texte = strip_tags($_POST['texte']);
                $id = strip_tags($_GET['id']);
        
                $query="UPDATE page SET titre=:titre, text=:texte WHERE id_page=:id";
                $stmt =  $pdo->prepare($query);
                $stmt->bindParam(':titre', $titre);
                $stmt->bindParam(':texte', $texte);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                header('Location: views/dashboardAdmin.php');
            }else{
                $_SESSION['erreur'] = "Le formulaire est incomplet";
            }
        // vérification ID dans l'URL
        if (!empty($_GET['id'])){
        
            //nettoyer l'id
            $id= strip_tags($_GET['id']);
        
            $query = "SELECT * FROM page WHERE id_page = :id";
            $stmt =  $pdo->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
        
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
            //si la page n'existe pas
            if (!$result){
                $_SESSION['erreur'] = "Cet ID n'existe pas";
                header('Location: views/dashboardAdmin.php');
            }
        }
        else{
            $_SESSION['erreur'] = "ID non valide";
            header('location: views/dashboardAdmin.php');
        }
    }
}