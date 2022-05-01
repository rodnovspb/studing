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

if(isset($_GET['row'])){
    $row = (int)($_GET['row']);
    $query = "SELECT * FROM employees WHERE id > 0 LIMIT $row,3";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row);
    exit(json_encode($data));
} else {
    exit(json_encode('ошибка'));
}