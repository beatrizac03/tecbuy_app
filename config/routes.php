<?php

/**
 * Specifiees the Controller responsible for each "method|route" 
 */

$routes = [
    'GET|/' => [App\Controllers\HomeController::class, 'homePage'],
    'GET|/registrar-usuario' => [App\Controllers\AuthController::class, 'signupPage'],
    'GET|/logout' => [App\Controllers\AuthController::class, 'logoutPage']
];

return $routes;