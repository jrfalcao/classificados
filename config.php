<?php

session_start();
global $pdo;
$dsn = "mysql:dbname=classificados;host=localhost";
$username = 'root';
try {
    $pdo = new PDO($dsn, $username);
} catch (PDOException $exc) {
    echo "Erro ao conectar: ".$exc->getTraceAsString();
}

