<?php
require 'vendor/autoload.php';

class Router
{
    private array $routes = [] ;

    public function addRoute($method, $uri, $controller, $action): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function getHandler($method, $uri)
    {   
        $uri = parse_url($uri, PHP_URL_PATH);
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['uri'] == $uri) {
                return $route;
            }
        }

        return null;
    }

    public function route()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $handler = $this->getHandler($method, $uri);

        if ($handler == null) {
            header('HTTP/1.1 404 Not Found');
            exit();
        }

        $controller = new $handler['controller']();
        $action = $handler['action'];
        $controller->$action();
    }
}

$router = new Router();
$router->addRoute('GET', '/service', 'Controllers\ServiceController', 'getShowText');
$router->addRoute('GET', '/index.php', 'Controllers\homeController', 'home');
$router->addRoute('GET', '/logout', 'connexion\logout', 'logout');
$router->addRoute('GET', '/loginViews', 'Access\Login', 'viewLogin');
$router->addRoute('POST', '/login', 'Access\Login', 'login');
$router->addRoute('POST', '/admin', 'Dashboard\admin', 'adminAction');
$router->addRoute('POST', '/employe', 'Dashboard\employe', 'employeAction');
$router->addRoute('POST', '/page', 'Dashboard\admin', 'page');
$router->addRoute('POST', '/update', 'crud\update', 'updatePage');
$router->addRoute('GET', '/usedCar', 'Controllers\gallery', 'ShowCar');
//$router->addRoute('POST', '/create', 'Crud\CreatePage', 'create');
$router->route();
