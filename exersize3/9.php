<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';

require_once 'show.php';


//Процедурный Mysqli
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "CREATE table persons(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) UNIQUE   
)";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
show($res);



////PDO
//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e){
//    echo "Ошибка " . $e->getMessage();
//}
//
//try{
//    $query = "CREATE DATABASE demo1";
//    $pdo->exec($query);
//    echo 'успешно';
//} catch (PDOException $e){
//    die("Ошибка: " . $e->getMessage());
//}




