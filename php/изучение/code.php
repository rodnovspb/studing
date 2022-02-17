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
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
		<th>delete</th>
	</tr>
<?php foreach ($arr as $elem): ?>
  <tr>
	<td><?= $elem['id']?></td>
	<td><?= $elem['name']?></td>
	<td><?= $elem['age']?></td>
	<td><?= $elem['salary']?></td>
	<td><a href="?del=<?= $elem['id']?>">удалить</a></td>
  </tr>

<?php endforeach; ?>
</table>

<?php
if(isset($_GET['del'])){
  $del = $_GET['del'];
  $query = "DELETE FROM users WHERE id=$del";
  mysqli_query($link, $query) or die(mysqli_error($link));
}

?>










