<?php

error_reporting(E_ALL); // Exibe todos os erros e avisos
ini_set('display_errors', 1); // Garante que os erros sejam mostrados na tela

require "../Infraestrutura/conexao-bd.php";
require "../../src/vendor/autoload.php";

use Src\Dominio\Repositorio\UsuarioRepositorio;

header("Content-Type: application/json");

$response = [
    "statusEmail" => "disponivel", 
    "statusNomeUsuario" => "disponivel"
];

/**
 * @var mixed decodifica o json recebido do registro.js em um array associativo, corresponde aos dados preenchidos no input, que devem ser únicos no BD, portanto, é preciso
 * checar a disponibilidade
 */
$dadosInputs = json_decode(file_get_contents('php://input'), true);

$nome_usuario = $dadosInputs['nome_usuario'] ?? null;
$email = $dadosInputs['email'] ?? null;

$pdo = estabelecerConexaoBD();
$usuariosRepositorio = new UsuarioRepositorio($pdo);

if($email) {
    if(!$usuariosRepositorio->verificarDisponibilidadeEmail($email)) {
        $response["statusEmail"] = "indisponivel";
    }
}

if($nome_usuario) {
    if(!$usuariosRepositorio->verificarDisponibilidadeNomeUsuario($nome_usuario)) {
        $response["statusNomeUsuario"] = "indisponivel";
    }
}

try {
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    echo $e->getTrace() . $e->getMessage();
}


