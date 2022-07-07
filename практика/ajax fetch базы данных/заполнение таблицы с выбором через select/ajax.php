<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>


<?php

$num = (int)$_REQUEST['num'];
$query = "SELECT * FROM list WHERE id = $num ";
$res = mysqli_query($link, $query) or die(mysqli_error($link));

if(mysqli_affected_rows($link) === 1) {
    $table = "<table><tr><th>id</th><th>Имя</th><th>Фамилия</th><th>Возраст</th><th>Город</th><th>Работа</th></tr><tr>";
//  $row - это одна строка из базы, поэтому перебирать ответ не нужно
    $row = mysqli_fetch_array($res);
//  mysqli_fetch_array дает ассоциативный массив
// с ключами попарно: номер в массиве, текстовый ключ,
// поэтому делим count на 2
    for($i=0; $i < count($row)/2; $i++){
        $table .= "<td>$row[$i]</td>";
    }
    $table .= "</tr>";
    exit(json_encode($table));
} else {
    exit(json_encode('данных не найдено'));
}







?>