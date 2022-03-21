<?php session_start();
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
.user {
    font-size: 24px;
    text-align: center;
}
.admin {
    text-align: right;
    font-size: 15px;
}
.create {
    margin-top: 10px;
}
table td {
    border: 1px solid blue;
    padding: 5px 15px;
}
table {
	border-collapse: collapse;
}
h4 {
    margin-bottom: 5px;
}


</style>
</head>
<body>


<?php
if(empty($_SESSION['login'])) echo "<div class='user'>Вы не авторизованы</div>";
else {
  $status = $_SESSION['status'];
  switch ($status) {
      case '0': $position = 'забанен';
      break;
	  case '1': $position = 'пользователь';
	  break;
      case '2': $position = 'модератор';
      break;
      case '3': $position = 'админ';
      break;
	  default: $position = 'не определен';
	  break;
  }
  echo "<div class='user'>$_SESSION[login], добро пожаловать! Ваш статус: $position</div>";
  if($_SESSION['login'] and ($_SESSION['status'] == 2 or $_SESSION['status'] == 3)){
    echo "<div class='admin'><a href='admin.php'>Админ-панель</a></div>";
  }

};
?>

<?php
	$query = "SELECT * FROM themes ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for($arr = []; $row = mysqli_fetch_assoc($result); $arr[]= $row);
	echo "<table><tr><th>Номер</th><th>Название темы</th><th>Создатель</th></tr>";
	foreach ($arr as $item) {
		echo "<tr>";
		echo "<td>$item[id]</td>";
		echo "<td>";
		echo "<a href='theme.php?id=$item[id]'>$item[name]</a>";
		echo "</td><td>$item[creater]</td>";
        if($_SESSION['status'] == 2 or $_SESSION['status'] == 3) {
        echo "<td><a href='?del=$item[id]'>удалить тему</a></td>";
		}
        echo "</tr>";
	}
	echo "</table>";
?>

<?php
if(!empty($_GET['del']) and ($_SESSION['status'] == 2 or $_SESSION['status'] == 3)) {
  $num = $_GET['del'];
  $query = "DELETE FROM themes WHERE id='$num'";
  mysqli_query($link, $query) or die(mysqli_error($link));
//  header('Location: main.php');
}

?>

<?php  if($_SESSION['login'] and $_SESSION['status'] != 0) { ?>

	<div class="create">
		<h4>Создать тему</h4>
	  <form action="" method="post">
	  <input type="text" name="name" placeholder="Введите название темы">
	  <input type="submit" value="Создать" name="submit">
	  </form>
	</div>
<?php }
if(!empty($_POST['name']) and !empty($_POST['submit'])) {
    $name = $_POST['name'];
    $login = $_SESSION['login'];
    $query = "INSERT INTO themes SET name = '$name', creater = '$login'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $last_id = mysqli_insert_id($link);

    header("Location: theme.php?id=$last_id");
}

?>















</body>
</html>