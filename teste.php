<?php

use Src\Dominio\Modelo\Usuario;

require "./src/Dominio/Modelo/Usuario.php";

$dados = [
    'id_usuario' => null,
    'nome_usuario' => 'bia',
    'email' => 'bia@gmail.com',
    'senha' => 'senha123'
];

$user = new Usuario(
    $dados['id_usuario'],
    $dados['nome_usuario'],
    $dados['email'],
    $dados['senha']
);

var_dump($user);

