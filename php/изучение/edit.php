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
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($arr=[]; $row = mysqli_fetch_assoc($res); $arr[]=$row);
?>

<?php foreach ($arr as $elem): ?>
<li><?php echo $elem['name']?> <a href="?id=<?=$elem['id'] ?>">Редактировать</a></li>

<?php endforeach; ?>

<?php


if(isset($_GET['id'])):
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($res)
	?>
  <form action="?id=<?=$user['id']?>" method="POST">
  <input name="name" value="<?=$user['name']?>" placeholder="Имя">
  <input name="age" value="<?=$user['age']?>" placeholder="Возраст">
  <input name="salary" value="<?=$user['salary']?>" placeholder="ЗП">
	<button type="submit">Редактировать</button>
  </form>

<?php endif; ?>

<?php if(!empty($_POST)) {
  $id = (int)($_GET['id']);
  $name = $_POST['name'];
  $age = (int)($_POST['age']);
  $salary = (int)($_POST['salary']);
  $query = "UPDATE users SET name='$name', age = '$age', salary = '$salary' WHERE id = '$id'";
  mysqli_query($link, $query) or die(mysqli_error($link));
  header('Location: edit.php');
} ?>




