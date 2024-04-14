<?php

namespace Controllers;

use Controllers\ServiceController;
class Controller
{
    public function route(): void
    {
        
        if ( isset($_GET ['controller']))
        {
                switch ($_GET ['controller']){
                    case 'serviceController':
                        $serviceController = new ServiceController();
                        $serviceController->route();
                        

                        break;
                    case 'connexionController':
                        echo 'on charge homeController';
                        
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

}
