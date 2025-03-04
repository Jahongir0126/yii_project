<?php

use core\Application;
use controllers\SiteController;
use controllers\AuthController;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(  __DIR__ );
$dotenv->load();


$config = [
    'userClass' => \models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],  
    ]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();
