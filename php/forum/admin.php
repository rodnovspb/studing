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
 .center {
     text-align: center;
 }
 table td {
     border: 1px solid blue;
     padding: 5px 15px;
 }
 table {
     border-collapse: collapse;
     display: inline-block;
 }

</style>
</head>
<body>

<?php
$query = "SELECT * FROM forum";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
?>

<?php if($_SESSION['status'] == 2 or $_SESSION['status'] == 3) { ?>

    <?php

    if(!empty($_POST['del']) and isset($_POST['submit']))	{

        $id = $_POST['hidden'];
        switch ($_POST['del']) {
            case '1':
                $query = "UPDATE forum SET status = 0 WHERE id='$id'";
                break;
            case '2':
                $query = "DELETE FROM forum WHERE id='$id'";
                break;
            case '3':
                $query = "UPDATE forum SET status = 2 WHERE id='$id'";
                break;
            case '4':
                $query = "UPDATE forum SET status = 3 WHERE id='$id'";
                break;
            case '5':
                $query = "UPDATE forum SET status = 1 WHERE id='$id'";
                break;
        }
        mysqli_query($link, $query) or die(mysqli_error($link));
        header("Location: admin.php");

    }

    ?>

  <div class="center">Добро, пожаловать, <?php echo $_SESSION['login']?></div>
  <h1 class="center">Админ панель</h1>

  <div class="center">
  <table>
	  <caption>Пользователи</caption>
	  <tr>
		<th>id</th>
		<th>Логин</th>
		<th>Статус</th>
		<th>Изменить статус</th>
	  </tr>
	<?php
	foreach ($data as $datum) {
	  echo "<tr>";
	  echo "<td>$datum[id]</td><td>$datum[login]</td>";
        switch ($datum['status']) {
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
        echo "<td>$position</td>";
        if($_SESSION['status'] == 2 and ($datum['status'] == 0  or $datum['status'] == 1)) {
         echo "<td>
         	<form action='' method='post'>
         		<select name='del'>
         		<option value='1'>Забанить</option>
         		<option value='2'>Удалить</option>
         		<option value='5'>Пользователь</option>
				</select>
				<input type='submit' value='ок' name='submit'>
				<input type='hidden' name='hidden' value='$datum[id]'>
			</form>        
         </td>";
		}
        elseif ($_SESSION['status'] == 3 and $datum['status'] != 3) {
            echo "<td>
         	<form action='' method='post'>
         		<select name='del'>
         		<option value='1'>Забанить</option>
         		<option value='2'>Удалить</option>
         		<option value='3'>Сделать модератором</option>
         		<option value='4'>Сделать админом</option>
         		<option value='5'>Сделать пользователем</option>
				</select>
				<input type='submit' value='ок' name='submit'>
				<input type='hidden' name='hidden' value='$datum[id]'>
			</form>        
         </td>";
        }

        echo "</tr>";
    }

	?>

	</table>
	</div>




<?php
	echo "<div class='center'><form action='' method='post'><input name='out' type='submit' value='выйти'></form></div>";
	if(!empty($_POST['out'])) {
	  session_destroy();
        header("Location: /");
        exit();
    }
	?>

<?php } else echo "<h1 class='center'>Вы не модератор и не админ</h1>"?>




























</body>
</html>
