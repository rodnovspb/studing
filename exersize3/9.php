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
//$query = "SELECT * FROM persons WHERE last_name='Роднов'";
//$res = mysqli_query($link, $query) or die(mysqli_error($link));
//if(mysqli_num_rows($res)>0){
//    echo "<table>";
//    echo "<tr>";
//    echo "<th>id</th>";
//    echo "<th>first_name</th>";
//    echo "<th>last_name</th>";
//    echo "<th>email</th>";
//    echo "</tr>";
//    while ($row = mysqli_fetch_assoc($res)){
//        echo "<tr>";
//        echo "<td>$row[id]</td>";
//        echo "<td>$row[first_name]</td>";
//        echo "<td>$row[last_name]</td>";
//        echo "<td>$row[email]</td>";
//        echo "</tr>";
//    }
//    echo "</table>";
//    mysqli_free_result($res);
//} else {
//    echo "Записей, соответствующих вашему запросу, не найдено.";
//}



//////////PDO
//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$name",$user,$pass);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e){
//    echo "Ошибка " . $e->getMessage();
//}
//
//try{
//    $query = "SELECT * FROM persons2";
//    $result = $pdo->query($query);
//    if($result->rowCount()>0){
//            echo "<table>";
//    echo "<tr>";
//    echo "<th>id</th>";
//    echo "<th>first_name</th>";
//    echo "<th>last_name</th>";
//    echo "<th>email</th>";
//    echo "</tr>";
//    while ($row = $result->fetch()){
//        echo "<tr>";
//        echo "<td>$row[id]</td>";
//        echo "<td>$row[first_name]</td>";
//        echo "<td>$row[last_name]</td>";
//        echo "<td>$row[email]</td>";
//        echo "</tr>";
//    }
//    echo "</table>";
//    unset($result);
//    }
//
//} catch (PDOException $e){
//    die("Ошибка: " . $e->getMessage());
//}


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