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

$query = "SELECT * FROM persons";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
if(mysqli_num_rows($res)>0){
    echo "<table>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>first_name</th>";
    echo "<th>last_name</th>";
    echo "<th>email</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>$row[id]</td>";
        echo "<td>$row[first_name]</td>";
        echo "<td>$row[last_name]</td>";
        echo "<td>$row[email]</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($res);
} else {
    echo "Записей, соответствующих вашему запросу, не найдено.";
}



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




