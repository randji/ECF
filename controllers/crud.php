<?php
namespace Crud;

use connexion\Database;

class CreatePage
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
    