<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private AuthService $authService;

    public function processRequest(){
        require __DIR__ . '/../views/home.php';
    }

    
    public function signUp() {

    }

    public function login() {

    }

    public function logout() {
        
    }

    public function signupPage() {
        require __DIR__ . '/../views/signup.php';
    }
  
}