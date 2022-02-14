<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


//$query = "SELECT users.name as user_name FROM users LEFT JOIN cities ON users.id=city_id" ;
$query = "
SELECT cats.cat as cats_cat, parents.cat as parents_cat, parents_parents.cat as parents_parents_cat, parents_parents_parents.cat as parents_parents_parents_cat  
FROM cats LEFT JOIN cats as parents ON cats.parent_id=parents.id
LEFT JOIN cats as parents_parents ON cats.parent_parent_id=parents_parents.id
LEFT JOIN cats as parents_parents_parents ON cats.parent_parent_parent_id=parents_parents_parents.id" ;



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