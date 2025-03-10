<?php

/**
 * Specifiees the Controller responsible for each "method|route" 
 */

$routes = [
    'GET|/' => App\Controllers\HomeController::class,
    'GET|/signup' => App\Controllers\SignUpController::class,
    'POST|/signup' => App\Controllers\SignUpController::class,
    'POST|/login' => App\Controllers\LoginController::class,
    'GET|/login' => App\Controllers\LoginController::class,
];

return $routes;