<?php

$config = parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_RAW);

if ($config === false) {
    throw new RuntimeException('No se pudo leer el archivo .env.');
}

$dsn = "pgsql:host={$config['DB_HOST']};port={$config['DB_PORT']};"
     . "dbname={$config['DB_NAME']};sslmode=require";

$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);