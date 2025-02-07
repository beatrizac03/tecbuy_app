<?php

// postgresql://postgres:[YOUR-PASSWORD]@[HOST]:[PORT]/postgres
// "pgsql:host=$host;port=$port;dbname=$db;"

use Src\Infraestrutura\Conexao;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../config.env');

function estabelecerConexaoBD(): ?PDO {

    $sdb = $_ENV['DB_SDB'];
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $port = $_ENV['DB_PORT'];
    
    try {
        $conn = new Conexao($sdb, $host, $username, $dbname, $port, $password);
        $pdo = $conn->criarConexao();

        if (!$pdo) {
            throw new Exception("Falha ao conectar ao banco de dados.");
        }

        return $pdo;
    } catch(Exception $e) {
        die("Erro ao estabelecer conexão: " . $e->getMessage());
    }
}




