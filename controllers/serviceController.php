<?php

namespace Controllers;

class ServiceController extends Controller
{
    public function route(): void
    {
        if ( isset($_GET ['action']))
        {
                switch ($_GET ['action']){
                    case 'home':
                        //appeler la methode repair
                        var_dump('on appelle repair');
                        break;
                    case 'homeController':
                        echo 'on charge homeController';
                        var_dump('on charge homeController');
                        //charger controller home
                        break;
                    case 'serviceController':
                        //charger controller service
                        break;
                    case 'connexionController':
                        //charger controller connexion
                        break;
                    case 'formContactController':
                        //charger controller formContact
                        break;
                        break;
                    default :
                        //erreur
                        break;
                }
            }else{
                //charger page acceuil
            }
    }



    protected function repair()
        {
            $params = ['test'=> 'abc'];
            $this ->render('page/about',$params);
        }


    public function getShowText()
        {
            try 
            {
                $pdo = new Database();
                $pdo = $pdo->getConnection();
                if(isset($pdo)){
                    echo "Connected successfully";
                }
                else{
                    echo "Not connected";
                }
                
                $pagename = $_GET['id'];
                
                
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
    
        public function repairBodywork(){
            $results = $this->getShowText();
            $this->render('repairBodywork', compact('results'));
            
        }
};



    