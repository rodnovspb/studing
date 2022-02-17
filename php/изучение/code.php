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

<table>
	<tr>
	  <th>id</th>
	  <th>name</th>
	  <th>age</th>
	  <th>salary</th>
	</tr>
  	<?php foreach ($arr as $elem): ?>
  		 <tr>
		   <td><?= $elem['id'] ?></td>
		   <td><?= $elem['name'] ?></td>
		   <td><?= $elem['age'] ?></td>
		   <td><?= $elem['salary'] ?></td>
		 </tr>
  	<?php endforeach; ?>


</table>