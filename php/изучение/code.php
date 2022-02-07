<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$query = "SELECT * FROM users WHERE (salary <400 AND age >27) OR (salary > 300 AND age < 25)";

$res = mysqli_query($link, $query) or die(mysqli_error($link));



for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);

echo "<pre>";
print_r($arr);
echo "</pre>";
















?>