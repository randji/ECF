<?php

class Router {
    private $routes = [];

    public function addRoute($method, $uri, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function getHandler($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['uri'] == $uri) {
                return $route;
            }
        }
        return null;
    }
}