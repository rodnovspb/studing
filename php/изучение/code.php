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



?>

<?php  foreach ($arr as $elem):  ?>
	<div>
	  <h2><?= $elem['name'] ?></h2>
	  <p><?= $elem['age']?> years, <b><?= $elem['salary']?>$</b></p>
	</div>
<?php endforeach; ?>