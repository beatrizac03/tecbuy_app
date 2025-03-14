<?php

use App\Controllers\AuthController;

/**
 * Summary of Router
 * This class will intercept front-end (JS) requests, calling the respective Controllers
 */

 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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

            [$controllerClass, $controllerMethod] = $routes[$requestedRoute];
            
            $controller = new $controllerClass();
            $controller->$controllerMethod();
        }
    }
}