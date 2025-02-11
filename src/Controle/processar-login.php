<?php

use Src\Dominio\Repositorio\UsuarioRepositorio;
use function Src\Infraestrutura\criarConexaoBD;
use Src\Infraestrutura\Conexao;

require "../../src/vendor/autoload.php";
require "../Infraestrutura/conexao-bd.php";

if(!empty($_POST)) {
    if(isset($_POST['email-nomeusuario'], $_POST['senha'])) {
        $dados = [];
    }
}

