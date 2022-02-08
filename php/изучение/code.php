<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$query = "SELECT *, CONCAT_WS('---', age, salary) as new FROM users";

$res = mysqli_query($link, $query) or die(mysqli_error($link));
//$data = mysqli_fetch_assoc($res);
//
//
//echo $data['age'];


for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);

echo "<pre>";
print_r($arr);
echo "</pre>";
















?>