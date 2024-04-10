<?php

namespace Controllers;

class RepairController extends Controller
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
};

