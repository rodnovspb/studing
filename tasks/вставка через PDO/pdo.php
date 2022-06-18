<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';



try {
    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Ошибка " . $e->getMessage();
}

try{
    $query = "INSERT INTO persons2 (first_name, last_name, email)
VALUES (:first_name, :last_name, :email)";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':email', $_POST['email']);

    $stmt->execute();
    echo "Записи успешно вставлены.";


} catch (PDOException $e){
    die($e->getMessage());
}


