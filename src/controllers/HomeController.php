<?php

namespace App\Controllers;
use UserRepository;

class HomeController
{

    public function processRequest(){

    }

    public function redirect() {

    }

    public function homePage() {
        require __DIR__ . '/../views/home.php';
    }
}