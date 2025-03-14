<?php

namespace App\Services;
use App\Repository\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    /**
     * @param array $data receives array with input data from register form, through verify-register.php
     * @return string 'available' if $data doesn't exist already in DB
     */
    private function checkRegisterAvailability(array $input_data)
    {

        $username = $input_data['username'];
        $email = $input_data['email'];

        $response = $this->userRepository->isPostedDataAvailable($username, $email);

        /**
         * if $response is true, the register must be completed. Call the inside method to redirect, and return true so 'verify-register.php' can send it to front-end
         */
        if ($response) {
            return true;
        }

        return false;
    }

    public function signUp(array $input_data)
    {
        $response = ["action" => "signup", "status" => "falha", "message" => "Os dados informados já estão em uso"];

        $is_available = $this->checkRegisterAvailability($input_data);

        if ($is_available) {
            // Call signup method from Repository, including data in DB
            $this->userRepository->createUser($input_data);

            $response['message'] = "Usuário criado com sucesso";
            $response['status'] = "sucesso";
        }

        return $response;
    }

    public function login(array $input_data) {
        $response = ["action" => "login", "status" => "falha", "message" => "Não foi possível logar."];

        $logged_in = $this->userRepository->validateLogin($input_data);

        if($logged_in) {
            $this->userRepository->validateLogin($input_data);

            $response['message'] = "Usuário logado";
            $response['status'] = "sucesso";
        }

        return $response;
    }

    public function logout() {
        
    }

}