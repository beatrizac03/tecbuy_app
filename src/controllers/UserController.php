<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Model\Repository\UserRepository;

class UserController implements Controller{

    private static UserRepository $userRepository;

    public function processRequest() {
        header('Location: /../views/register.php');
    }

    public function redirect() {

    }

    public function editProfile() {
        
    }

    public function deleteAccount() {

    }

}