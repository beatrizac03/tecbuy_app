<?php

namespace Src\Infraestrutura;

use PDOException;
use PDO;

require_once __DIR__ . "/../vendor/autoload.php";

class Conexao
{
    private string $host;
    private string $username;
    private string $db;
    private string $senha;
    private string $sdb;
    private string $port;

    public function __construct(string $sdb, string $host, string $username, string $db, string $port, string $senha) {
        $this->sdb = $sdb;
        $this->host = $host;
        $this->username = $username;
        $this->db = $db;
        $this->port = $port;
        $this->senha = $senha;
    }

    public function criarConexao() {
        try {
            $dsn = "$this->sdb:host=$this->host;port=$this->port;dbname=$this->db";

            $pdo = new PDO($dsn, $this->username, $this->senha);

            echo "Conexão bem sucedida";
            return $pdo;
        } catch(PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }
}





