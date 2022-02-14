<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


//$query = "SELECT users.name as user_name FROM users LEFT JOIN cities ON users.id=city_id" ;
$query = "SELECT users.name as user_name, fathers.name as father_name, mothers.name as mother_name FROM users
LEFT JOIN users as fathers ON fathers.id=users.father LEFT JOIN users as mothers ON mothers.id=users.mother" ;



$res=mysqli_query($link, $query) or die(mysqli_error($link));
//$data = mysqli_fetch_assoc($res);
//
//
//echo $data['age'];


for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);

echo "<pre>";
print_r($arr);
echo "</pre>";
















?>