<?php

namespace App\Controllers;

use UserRepository;

interface Controller
{
    public function processRequest();
    public function redirect();
}