<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';

////////Процедурный стиль
//$link = mysqli_connect($host, $user, $pass, $name);
//mysqli_query($link, "SET NAMES 'utf8'");
//
//$query = "INSERT INTO persons (first_name, last_name, email) VALUES (?,?,?)";
//if($stmt = mysqli_prepare($link, $query)){
//    mysqli_stmt_bind_param($stmt, 'sss', $first_name, $last_name, $email);
//
//    $first_name = $_REQUEST['first_name'];
//    $last_name = $_REQUEST['last_name'];
//    $email = $_REQUEST['email'];
//
//    if(mysqli_stmt_execute($stmt)){
//        echo "Записи успешно вставлены.";
//    } else {
//        echo "ОШИБКА: не удалось подготовить запрос: $query. " . mysqli_error($link);
//    }
//}
//
//mysqli_stmt_close($stmt);
//mysqli_close($link);

////// PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Ошибка " . $e->getMessage();
}

try {
    $query = "INSERT INTO persons2 (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':first_name', $_REQUEST['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $_REQUEST['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_REQUEST['email'], PDO::PARAM_STR);

    $stmt->execute();

} catch (Exception $e){
    echo $e->getMessage();
}

unset($stmt);
unset($pdo);