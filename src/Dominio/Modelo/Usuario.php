<?php

namespace Src\Dominio\Modelo;

require_once __DIR__ . "/../../vendor/autoload.php";

class Usuario
{
    private ?int $id_usuario;
    private string $nome_usuario;
    private string $email;
    private string $senha;

    public function __construct(?int $id_usuario, string $nome_usuario, $email, $senha) {
        $this->id_usuario = $id_usuario;
        $this->nome_usuario = $nome_usuario;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getIdUsuario(): ?int {
        return $this->id_usuario;
    }

    public function getNomeUsuario(): string {
        return $this->nome_usuario;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getSenha(): string {
        return $this->senha;
    }
}