<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
$query = "SELECT * FROM user";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row);
?>
<?php foreach ($data as $elem): ?>
<a href="profile.php?id=<?= $elem['id'] ?>"><?= $elem['login'] ?></a></br>
<?php endforeach; ?>
