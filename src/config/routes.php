<?php

/**
 * Specifiees the Controller responsible for each "method|route" 
 */

$routes = [
    'GET|/' => [App\Controllers\HomeController::class, 'homePage'],
    'GET|/signup' => [App\Controllers\AuthController::class, 'signupPage'],
    'GET|/api/auth/sign-up' => [App\Controllers\AuthController::class, 'signUp'],
    'GET|/logout' => [App\Controllers\AuthController::class, 'logoutPage'],
    'GET|/login' => [App\Controllers\AuthController::class, 'loginPage'],
];

return $routes;