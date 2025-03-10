<?php

namespace App\Controllers;

interface Controller
{
    public function processRequest();
    public function redirect();
}