<?php

/**
 * Summary of Router
 * This class will intercept front-end (JS) requests, calling the respective Controllers
 */

 require __DIR__ . '/../../vendor/autoload.php';

$routes = require __DIR__ . '/../../config/routes.php';

class Router
{
    public function handleRequest(array $requestData) {

        global $routes;

        $path = $requestData['path'];
        $method = $requestData['method'];

        $requestedRoute = "$method|$path";
        
        /**
         * Verifies if the request route exists in the global variable $routes (defined in 'routes.php')
         */
        if(isset($routes[$requestedRoute])) {

            $controllerClass = $routes[$requestedRoute];
            
            $controller = new $controllerClass();
            $controller->processRequest();
        }
    }
}