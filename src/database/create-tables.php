<?php

namespace App\Database;

require __DIR__ . '/../../vendor/autoload.php';
require './conn-db.php';

$sql1 = 'CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                username varchar(50) unique not null,
                email varchar(100) not null unique,
                `password` text not null,
                profile_picture text not null
);';

// $pdo is a global variable, comes from './conn-db.php'

$pdo->exec($sql1);