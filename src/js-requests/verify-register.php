<?php

use App\Controllers\SignUpController;

$feedback = [
    "is_data_available" => "false"
];


if(isset($_POST)) {
    $input_data = json_decode(file_get_contents('php://input'), true);

    $signup_controller = new SignUpController();
    $response = $signup_controller->checkRegisterAvailability($input_data);

    if($response) {
        $feedback['is_data_available'] = "true";
    }

}

echo json_encode($feedback);