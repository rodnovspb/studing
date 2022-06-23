<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';

require_once 'show.php';

/////////Процедурный Mysqli
//$link = mysqli_connect($host, $user, $pass, $name);
//mysqli_query($link, "SET NAMES 'utf8'");
//
//$query = "SELECT * FROM persons ORDER BY first_name";
//$res = mysqli_query($link, $query) or die(mysqli_error($link));
//
//if(mysqli_num_rows($res) > 0){
//    echo "<table>";
//    echo "<tr>";
//    echo "<th>id</th>";
//    echo "<th>first_name</th>";
//    echo "<th>last_name</th>";
//    echo "<th>email</th>";
//    echo "</tr>";
//    while($row = mysqli_fetch_assoc($res)){
//        echo "<tr>";
//        echo "<td>" . $row['id'] . "</td>";
//        echo "<td>" . $row['first_name'] . "</td>";
//        echo "<td>" . $row['last_name'] . "</td>";
//        echo "<td>" . $row['email'] . "</td>";
//        echo "</tr>";
//    }
//    echo "</table>";
//} else {
//    echo 'не найдено записей';
//}

////////PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Ошибка " . $e->getMessage();
}

try {
    $query = "SELECT * FROM persons ORDER BY email";
    $res = $pdo->query($query);

    if($res->rowCount()>0){
            echo "<table>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>first_name</th>";
    echo "<th>last_name</th>";
    echo "<th>email</th>";
    echo "</tr>";
    while($row = $res->fetch()){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    } else {
            echo 'не найдено записей';
    }

} catch (PDOException $e){
    die('Ошибка ' . $e->getMessage());
}