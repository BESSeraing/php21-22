<?php
function getDB() {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_20_21;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

