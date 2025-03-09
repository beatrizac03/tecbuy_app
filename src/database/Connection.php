<?php

namespace App\Database;
use PDO;

class Connection
{
    private PDO $pdo;
    private string $dsn;
    private string $username;
    private string $password;

    public function __construct($dsn, $username, $password) {
        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function getConnection() {
        return $this->pdo;
    }

}