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

for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

echo "<pre>";
    print_r($data);
echo "</pre>";











?>