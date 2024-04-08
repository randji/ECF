<?php


class serviceController
{

    public function getShowText()
    {

        try {
            $pdo = new Database();
            $pdo = $pdo->getConnection();
            if(isset($pdo)){
                echo "Connected successfully";
            }
            else{
                echo "Not connected";
            }
            $currentPage = basename($_SERVER['PHP_SELF']);
            
            switch ($currentPage) {
                case 'Maintenance.php':
                    $pagename = 2;
                    break;
                case 'mechanicalCar.php':
                    $pagename = 3;
                    break;
                case 'usedCarSale.php':
                    $pagename = 4;
                    break;
                case 'repairBodywork.php':
                    $pagename = 1;
                    break;
                default:
                    $pagename = 1;
                var_dump($pagename);
            } 
            if(isset ($pagename)){
                $stmt = $pdo->prepare("SELECT titre, text FROM garageparrot.page WHERE pagename = :pagename");

            $stmt->execute([':pagename' => $pagename]);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($results);
            return $results;
            
            }
            else{
                header ('HTTP/1.1 404 not found');
            }
            
        }
        
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function render($view, $data = []) {
        extract($data);
        require_once "views/$view.php";
    }

    public function repairBodywork(){
        $results = $this->getShowText();
        $this->render('repairBodywork', compact('results'));
        
    }

}