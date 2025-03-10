<?php

namespace App\Database;

require __DIR__ . '/../../vendor/autoload.php'; 

$dsn = 'mysql:host=localhost;dbname=mvc_app';
$username = 'root';
$password = 'Mysql_app03';

$conn = new Connection($dsn, $username, $password);

$pdo = $conn->getConnection();

// used to fetch data from DB as objects, instead of associative array
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

return $pdo;

