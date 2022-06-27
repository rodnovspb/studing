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
//$link = mysqli_connect($host, $user, $pass, $name);
//mysqli_query($link, "SET NAMES 'utf8'");
//
//$query = "SELECT * FROM persons LIMIT 5 OFFSET 1";
//$res = mysqli_query($link, $query) or die(mysqli_error($link));
//
//for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
//
//show($data);



////////PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Ошибка " . $e->getMessage();
}

try {
    $query = "SELECT * FROM persons LIMIT 5 OFFSET 1";
    $res = $pdo->query($query);

    show($res->fetch());

} catch (PDOException $e){
    die("Ошибка: " . $e->getMessage());
}














////////Выборка данных в стиле PDO (+ подготовленные операторы)
//    echo "<table style='border: solid 1px black;'>";
//    echo "<tr><th>Id</th><th>Имя</th><th>Фамилия</th><th>E-mail</th></tr>";
//
//    class Tablerows extends RecursiveIteratorIterator {
//        function __construct($it)
//        {
//            parent::__construct($it, self::LEAVES_ONLY);
//        }
//
//
//    function current(){
//        return "<td style='width: 150px; border: 1px solid black;'>" .
//            parent::current(). "</td>";
//    }
//
//        function beginChildren() {
//            echo "<tr>";
//        }
//
//        function endChildren() {
//            echo "</tr>" . "\n";
//        }
//    }
//
//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $pdo->prepare('SELECT * FROM persons WHERE id=10');
//    $stmt->execute();
//
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//
//    foreach (new Tablerows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
//        echo $v;
//    }
//
//
//} catch (PDOException $e){
//    echo "Ошибка " . $e->getMessage();
//}
//
//$conn = null;
//echo "</table>";