<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Model\Repository\UserRepository;

class SignUpController implements Controller{

    private static UserRepository $userRepository;

    public function processRequest() {
        header('Location: /../views/register.php');
    }

    public function redirect() {

    }

    /**
     * @param array $data receives array with input data from register form, through verify-register.php
     * @return string 'available' if $data doesn't exist already in DB
     */
    public function checkRegisterAvailability(array $input_data){

        $username = $input_data['username'];
        $email = $input_data['email'];
        
        $response = $this->userRepository->isPostedDataAvailable($username, $email);

        /**
         * if $response is true, the register must be completed. Call the inside method to redirect, and return true so 'verify-register.php' can send it to front-end
         */
        if($response) {
            $this->redirect();

            return true;
        }

        return false;
    }   

}