<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

use Src\Dominio\Repositorio\UsuarioRepositorio;

require "../../src/vendor/autoload.php";
require "../Infraestrutura/conexao-bd.php";

header("Content-Type: application/json");

$response = [
    "dadosCorrespondem" => "nao"
];

try {
    $dadosInputs = json_decode(file_get_contents('php://input'), true);

    $email_nomeusuario = $dadosInputs['email-nomeusuario'] ?? null;
    $senha = $dadosInputs['senha'] ?? null;
    
    $pdo = estabelecerConexaoBD();
    $usuariosRepositorio = new UsuarioRepositorio($pdo);
    
    /**
     * @annotation caso a superglobal não estiver vazia, checa se os dois inputs foram preenchidos, e chama 
     * 
     */
    
    if($email_nomeusuario && $senha) {
        $usuario = $usuariosRepositorio->verificarLogin($email_nomeusuario, $senha);
    
        if($usuario) {
            $response['dadosCorrespondem'] = "sim";
            
            session_start();
    
            $_SESSION['id_usuario'] = $usuario->getIdUsuario();
            $_SESSION['nome_usuario'] = $usuario->getNomeUsuario();
            $_SESSION['email'] = $usuario->getEmail();
        }
    }

} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(["error" => "Erro no servidor"]);
}

echo json_encode($response);
exit();
