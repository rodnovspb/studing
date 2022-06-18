<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';

require_once 'show.php';


////Процедурный Mysqli
//$link = mysqli_connect($host, $user, $pass, $name);
//mysqli_query($link, "SET NAMES 'utf8'");
//
//$query = "INSERT INTO persons (first_name, last_name, email) VALUES
//('Денис1', 'Роднов1', 'asd@ads1d.ds'),
//('Денис', 'Роднов', 'asd@adsd.ds')";
//$res = mysqli_query($link, $query) or die(mysqli_error($link));
//show($res);



//PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Ошибка " . $e->getMessage();
}

try{
    $query = "INSERT INTO persons2 (first_name, last_name, email)
        VALUES ('James Bond', 'sdf', 'bond@mail.com');";
    $query .= "INSERT INTO persons2 (first_name, last_name, email)
        VALUES ('John Wick', 'sdf', 'wick@mail.com');";
    $query .= "INSERT INTO persons2 (first_name, last_name, email)
        VALUES ('Ethan Hunt','sdfsdf', 'hunt@mail.com')";
    $pdo->exec($query);
    echo 'успешно';
} catch (PDOException $e){
    die("Ошибка: " . $e->getMessage());
}




