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
        $input_data = json_decode(file_get_contents('php://input'), true);

        $response[] = $this->authService->signUp($input_data);

        if($response["status"] == "sucesso") {
            session_start();

            $_SESSION["username"] = $input_data["username"];
            
            header('Location: /../views/home.php');
        }
        
        return json_encode($response);
    }

    public function login() {

    }

    public function logout() {
        
    }
  
}