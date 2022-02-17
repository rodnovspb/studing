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
 ?>

<ul>
    <?php foreach ($arr as $elem): ?>
	<li><?= $elem['name'] ?> <a href="edit.php?id=<?= $elem['id']?>">edit</a></li>
    <?php endforeach; ?>
</ul>
