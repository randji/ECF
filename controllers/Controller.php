<?php

namespace Controllers;
class Controller
{
    public function route(): void
    {
        if ( isset($_GET ['controller']))
        {
                switch ($_GET ['controller']){
                    case 'serviceController':
                        //require_once 'views/Home.php';
                        $ServicePage = new RepairController();
                        $ServicePage->route();
                        break;
                    case 'connexionController':
                        echo 'on charge homeController';
                        var_dump('on charge homeController');
                        //charger controller home
                        break;
                    case 'usedCarController':
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
    // gérer et transferer les paramètres au views
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_.'/views/'.$path.'.php';

        try{
            if (!file_exists($filePath)){
                throw new \Exception("Fichier non trouvé : ". $filePath);
            } else {
                require_once $filePath;
            }
        } catch(\Exception $e){
            echo $e->getMessage();
        }
        

       
    }
}
