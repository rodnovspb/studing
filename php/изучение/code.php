<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$query = "SELECT * FROM users";



$res=mysqli_query($link, $query) or die(mysqli_error($link));

$result = '';

for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);

foreach ($arr as $elem){
  $result .= "<p>";
  $result.='<b>'.$elem['name'].'</b>';
  $result.='<b>'.$elem['age'].'</b>';
  $result.='<b>'.$elem['salary'].'</b>';
  $result .= "</p>";
}

echo $result;











//echo "<pre>";
//print_r($arr);
//echo "</pre>";
















?>