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
<ul>
<?php foreach ($arr as $elem): ?>
	<li><?= $elem['name'] ?></li>

<?php endforeach;?>
</ul>