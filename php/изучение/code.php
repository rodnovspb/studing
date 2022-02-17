<meta charset="utf-8">

<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>


<?php
$query = "SELECT * FROM users";
$res=mysqli_query($link, $query) or die(mysqli_error($link));
for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
?>
<a href="?id=1">1</a>
<a href="?id=2">2</a>
<a href="?id=3">3</a>

<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $res=mysqli_query($link, $query) or die(mysqli_error($link));
  $user = mysqli_fetch_assoc($res);
}

?>



<div>
	<p>
		имя: <span class="name"><?php if(isset($user['name'])) echo $user['name'] ?></span>
	</p>
	<p>
		возраст: <span class="age"><?php if(isset($user['age'])) echo $user['age'] ?></span>,
		зарплата: <span class="salary"><?php if(isset($user['salary'])) echo $user['salary'] ?>$</span>,
	</p>
</div>












