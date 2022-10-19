<?php
$dns = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dns, $user, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
    $pdo->exec("SET CHARACTER SET utf8");
}
catch (PDOException $e) {
    print_r($e);
}