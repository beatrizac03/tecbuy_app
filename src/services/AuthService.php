<?php

namespace App\Services;
use App\Repository\UserRepository;
use App\Model\User;
use Exception;

class AuthService
{
    private UserRepository $userRepository;

    private function instanceUserObject(array $data)
    {
        return new User(
            null,
            $data['username'],
            $data['username'],
            $data['password'],
            ""
        );
    }

    /**
     * @param array $input_data receives array with input data from signUp (received from AuthController->signUp())
     * @return string 'available' if $data doesn't exist already in DB
     *         
     * if $response is true, the register must be completed. Call the inside method to redirect, and return true so 'verify-register.php' can send it to front-end
     */

    public function signUp(array $input_data)
    {
        $response = [
            "action" => "signup",
            "status" => "falha",
            "message" => "Os dados informados já estão em uso"
        ];

        $user = $this->instanceUserObject($input_data);

        try {
            // Call signup method from Repository, including data in DB
            $created_in_db = $this->userRepository->createUser($user);

            if ($created_in_db) {
                $response['message'] = "Usuário criado com sucesso";
                $response['status'] = "sucesso";
            }
        } catch (Exception $e) {
            error_log(message: "Error to retrieve response from Repo method: " . $e->getMessage());
        }

        return $response;
    }

    public function login(array $input_data)
    {
        $response = ["action" => "login", "status" => "falha", "message" => "Não foi possível logar."];

        $logged_in = $this->userRepository->validateLogin($input_data);

        if ($logged_in) {
            $this->userRepository->validateLogin($input_data);

            $response['message'] = "Usuário logado";
            $response['status'] = "sucesso";
        }

        return $response;
    }

    public function logout()
    {

    }

}