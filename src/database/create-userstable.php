<?php

namespace App\Database;

require __DIR__ . '/../../vendor/autoload.php';
require './conn-db.php';

$create = 'CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                username varchar(50) unique not null,
                email varchar(100) not null unique,
                senha text not null
);';

$pdo->exec($create);