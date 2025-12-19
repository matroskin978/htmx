<?php

$db_config = [
    'host' => 'MariaDB-11.7',
    'dbname' => 'test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];

$dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
$db = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
