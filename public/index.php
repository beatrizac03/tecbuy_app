<?php

require_once __DIR__ . '/../src/controllers/Router.php';
require '../config/routes.php';

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