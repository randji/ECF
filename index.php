<?php

define('_ROOTPATH_', __DIR__);

require 'vendor/autoload.php';
require_once 'views/Home.php';

// use namespace/class
use Controllers\Controller;

$controller = new Controller() ;
$controller->route();




/*const BASE_URL = '/ecf';
require_once  'views/Home.php';
require_once 'models/Router.php';
require_once 'controllers/homeController.php';
require_once 'controllers/serviceController.php';


$router = new Router();

$router->addRoute('GET', BASE_URL.'/admin', 'controllers/HomeController', 'home');
$router->addRoute('GET', BASE_URL.'/repairBodywork', 'controllers/serviceController', 'repairBodywork');

$method = $_SERVER['REQUEST_METHOD'];
//echo $method;
$uri = $_SERVER['REQUEST_URI'];
//echo $uri;
$handler = $router->gethandler($method, $uri);

if ($handler == null ) {

    header ('HTTP/1.1 404 not found');
    exit();
}


$controller = new $handler['controller']();
$action = $handler['action'];
$controller->$action();*/