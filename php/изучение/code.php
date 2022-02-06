<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$query = "SELECT * FROM users";

$res = mysqli_query($link, $query) or die(mysqli_error($link));

$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;
$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;
$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;
$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;
$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;
$user = print_r(mysqli_fetch_assoc($res));
$arr[]= $user;


var_dump($arr);











?>