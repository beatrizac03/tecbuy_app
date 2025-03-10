<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Model\Repository\UserRepository;

class AuthController implements Controller
{

    public function processRequest(){
        require __DIR__ . '/../views/home.php';
    }

    public function redirect() {
    }

    public function signUp() {

    }

    public function login() {

    }

    public function logout() {
        
    }
}