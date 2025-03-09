<?php

/**
 * o GET é pra carregar a página em si, já o POST é se estiver enviando algo pro servidor (form, info)
 */

$routes = [
    'GET|/' => App\Controllers\HomeController::class,
    'GET|/signup' => App\Controllers\SignUpController::class,
    'POST|/signup' => App\Controllers\SignUpController::class,
    'POST|/login' => App\Controllers\LoginController::class,
    'GET|/login' => App\Controllers\LoginController::class,
];

return $routes;