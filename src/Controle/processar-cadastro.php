<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

use Src\Dominio\Repositorio\UsuarioRepositorio;

require "../../src/vendor/autoload.php";
require "../Infraestrutura/conexao-bd.php";

/**
 *  @annotation Valida os dados recebidos através da página 'registro.php', do formulário 'cadastro-usuario'
 *  @annotation Instancia o repositorio de usuários, utilizando a var $conn localizada em conexao-bd.php
 *  @annotation Forma um array associativo com os dados recebidos do formulário, e passa esses dados na chamada da função de inserirUsuario()
 */

if (!empty($_POST)) {
   if (isset($_POST['nome_usuario'], $_POST['email'], $_POST['senha'])) {
       $id_usuario = null;

       $dados = [
           'id_usuario' => $id_usuario,
           'nome_usuario' => $_POST['nome_usuario'],
           'email' => $_POST['email'],
           'senha' => $_POST['senha']
       ];

       $pdo = estabelecerConexaoBD();

       try {
           $usuariosRepositorio = new UsuarioRepositorio($pdo);
           $usuariosRepositorio->inserirUsuario($dados);
           exit();
       } catch (Exception $e) {
           echo "Erro ao processar o cadastro: " . $e->getMessage();
       }
   } else {
       echo "Dados do formulário incompletos.";
   }
} else {
   echo "Método de requisição inválido.";
}


