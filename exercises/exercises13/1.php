<?php

$host = 'localhost'; // имя хоста
$name = 'mailing'; // имя базы данных
$user = 'root'; // имя пользователя
$pass = ''; // пароль
$charset = 'utf8';

$dsn = "mysql:host=$host; dbname=$name; charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];


echo $_SERVER['DOCUMENT_ROOT'];

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
    var_dump($pdo);
    echo 'DB is connected';
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>