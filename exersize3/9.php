<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';

require_once 'show.php';


///////Процедурный Mysqli
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?, ?)";
if($stmt = mysqli_prepare($link, $query)){
    mysqli_stmt_bind_param($stmt, 'sss', $first_name, $last_name, $email);
    $first_name = "Ron1";
    $last_name = "Weasley1";
    $email = "ronweasley@mail.2c1om";
    $res = mysqli_stmt_execute($stmt);
    echo "Записи успешно вставлены.";
} else {
    echo 'Ошибка: ' . mysqli_error($link);
}
    mysqli_stmt_close($stmt);



//////////PDO
//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e){
//    echo "Ошибка " . $e->getMessage();
//}
//
//try{
//    $query = "INSERT INTO persons2 (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
//    $stmt = $pdo->prepare($query);
//    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
//    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
//    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//
//    $first_name = "Hermione1";
//    $last_name = "Grange2r";
//    $email = "hermieonegranger@mail.com";
//
//    $stmt->execute();
//
//    $first_name = "Hermion2e1";
//    $last_name = "Grangee2r";
//    $email = "hermieonegrranger@mail.com";
//
//    $stmt->execute();
//
//    echo "Записи успешно вставлены.";
//
//} catch (PDOException $e){
//    die("Ошибка: " . $e->getMessage());
//}




