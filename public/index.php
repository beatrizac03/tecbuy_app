<?php

/**
 * "Main" page, it will receive the request data, instance a Router transfering the data to handleRequest method, Router() will call the responsible Controllers
 */

require '../config/routes.php';
require_once __DIR__ . '/../src/controllers/Router.php';

$requestData = [];

if(isset($_SERVER['REQUEST_URI'])) {
    $pathInfo = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $requestData = [
        "path" => $pathInfo,
        "method" => $requestMethod
    ];
} 

$router = new Router();
$router->handleRequest($requestData);