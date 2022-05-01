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



if(isset($_GET['data'])){
    $data = json_decode($_GET['data']);
    $id = (int)($data[0]);
    $tdName = $data[1];
    $tdText = $data[2];
    $query = "UPDATE employees SET {$tdName} = '$tdText' WHERE id = $id";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
} else {
    $query = "SELECT * FROM employees";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}



