<?php

namespace Src\Dominio\Repositorio;
use PDO;
use Exception;
use Src\Dominio\Modelo\Usuario;

require_once __DIR__ . "/../../vendor/autoload.php";

class UsuarioRepositorio {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados): Usuario {
        return new Usuario(
            $dados['id_usuario'],
            $dados['nome_usuario'],
            $dados['email'],
            $dados['senha']
        );
    }

    public function todosOsUsuarios(): array {
        $select = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($select);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function inserirUsuario($dadosArray) {
        $usuario = $this->formarObjeto($dadosArray);

        $insert = "INSERT INTO usuarios (nome_usuario, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmail());

        $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $stmt->bindValue(3, $senhaHash);

        try {
            $stmt->execute();
        } catch(Exception $e) {
            echo "Erro ao inserir usuário no banco de dados: " . $e->getMessage() . $e->getTrace();
        }

    }

    public function buscarUsuario(int $id_usuario) {
        $select = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($select);
        $stmt->bindValue(1, $id_usuario);

        try {
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->execute();

            $usuario = $this->formarObjeto($dados);
            echo "Usuário encontrado no banco de dados";

            return $usuario;
        } catch(Exception $e) {
            echo "Erro ao buscar usuário $id_usuario: " . $e->getMessage();
        }

    }

    /**
     * @annotation método para verificar se existe algum usuário com determinado email e/ou username, retorna a contagem de individuos com os dados passados
     */

    public function verificarDisponibilidadeEmail(string $email) {
        $select = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($select);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            $result = $stmt->fetchColumn();
            
            if($result > 0) {
                return false;
            } else {
                return true;
            }
 
        } catch(Exception $e) {
            echo "Erro ao verificar usuário: " . $e->getTrace() . $e->getMessage();
        }

    }

    public function verificarDisponibilidadeNomeUsuario(string $nome_usuario) {
        $select = "SELECT COUNT(*) FROM usuarios WHERE nome_usuario = :nome_usuario";
        $stmt = $this->pdo->prepare($select);
        $stmt->bindParam(':nome_usuario', $nome_usuario);

        try {
            $stmt->execute();
            $result = $stmt->fetchColumn();
            
            /* Caso ache usuário com o nome de usuário, retorna falso */
            if($result > 0) {
                return false;
            } else {
                return true;
            }
 
        } catch(Exception $e) {
            echo "Erro ao verificar usuário: " . $e->getTrace() . $e->getMessage();
        }
    }

    public function deletarUsuario(int $id_usuario) {
        $delete = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($delete);
        $stmt->bindValue(1, $id_usuario);

        try {
            $stmt->execute();
            echo "Usuário deletado.";
        } catch(Exception $e) {
            echo "Erro ao deletar usuário de ID $id_usuario: " . $e->getMessage();
        }
    }
}