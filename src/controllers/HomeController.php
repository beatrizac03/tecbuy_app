<?php

namespace App\Controllers;
use App\Controllers\Controller;
use UserRepository;

class HomeController implements Controller
{

    public function processRequest(){
        require __DIR__ . '/../views/home.php';
    }

    public function redirect() {

    }
}