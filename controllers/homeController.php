
<?php

class HomeController
{
    public function home(){
        
        require_once "admin/dashboardAdmin.php";
    }

    // public function getShowText()
    // {

    //     try {
    //         $pdo = new Database();
    //         $pdo = $pdo->getConnection();
    //         if(isset($pdo)){
    //             echo "Connected successfully";
    //         }
    //         else{
    //             echo "Not connected";
    //         }
    //         $currentPage = basename($_SERVER['PHP_SELF']);
            
    //         switch ($currentPage) {
    //             case 'Maintenance.php':
    //                 $pagename = 2;
    //                 break;
    //             case 'mechanicalCar.php':
    //                 $pagename = 3;
    //                 break;
    //             case 'usedCarSale.php':
    //                 $pagename = 4;
    //                 break;
    //             case 'repairBodywork.php':
    //                 $pagename = 1;
    //                 break;
    //             default:
    //                 $pagename = 1;
    //             var_dump($pagename);
    //         } 
    //         if(isset ($pagename)){
    //             $stmt = $pdo->prepare("SELECT titre, text FROM garageparrot.page WHERE pagename = :pagename");

    //         $stmt->execute([':pagename' => $pagename]);

    //         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

    //         return $results;

    //         require_once "views/repairBodywork.php";

    //         }
    //         else{
    //             header ('HTTP/1.1 404 not found');
    //         }
            
    //     }
        
    //     catch(PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function repairBodywork(){
    //     $results = $this->getShowText();
    //     require_once "views/repairBodywork.php";
    // }

    // public function repairBodywork(){
    //     // Ici, vous pouvez ajouter du code pour préparer tout ce qui est nécessaire pour la page repairBodywork
    //     $results = $this->getshowtext();
    //     require_once "views/repairBodywork.php";
    // }

    // public function mechanicalCar(){
    //     // Ici, vous pouvez ajouter du code pour préparer tout ce qui est nécessaire pour la page mechanicalCar
    //     require_once "views/mechanicalCar.php";
    // }

    // public function maintenance(){
    //     // Ici, vous pouvez ajouter du code pour préparer tout ce qui est nécessaire pour la page Maintenance
    //     require_once "views/Maintenance.php";
    // }

    // public function usedCarSale(){
    //     // Ici, vous pouvez ajouter du code pour préparer tout ce qui est nécessaire pour la page usedCarSale
    //     require_once "views/usedCarSale.php";
    // }
}

