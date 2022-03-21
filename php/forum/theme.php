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
	table td {
        border: 1px solid grey;
        padding: 5px 15px;
    }
    table {
        border-collapse: collapse;
    }
	.creater {
        display: flex;
        justify-content: space-between;
	}

</style>
</head>
<body>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM themes WHERE id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $theme = mysqli_fetch_assoc($result);
	echo "
		<h3>Название темы: $theme[name]</h3>
		<p class='creater'><span>Создатель: $theme[creater]</span><a href=\"main.php\">Посмотреть темы форума</a></p>
	";
    if ($_SESSION['login']) {
        echo "
		<form action='' method='post'>
			<textarea name='textarea' cols='30' rows='5' placeholder='Введите текст сообщения'></textarea>
			<input type='submit' value='Отправить' name='submit'>
		</form>";
    }

    if (!empty($_POST['textarea']) and !empty($_POST['submit'])) {
      	$theme_id = $id;
        $text = $_POST['textarea'];
        $login = $_SESSION['login'];
        $query = "INSERT INTO text SET text = '$text', author = '$login', theme_id='$theme_id'";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    $query = "SELECT * FROM text WHERE theme_id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data=[]; $row = mysqli_fetch_assoc($result); $data[]=$row);

    if(!empty($data)) {
        echo "<h3>Последние сообщения:</h3>";
        echo "<table><tr><th>Текст</th><th>Автор</th><th>Время</th></tr>";
        foreach ($data as $datum) {
            echo "<tr><td>$datum[text]</td><td>$datum[author]</td><td>$datum[date]</td></tr>";
        }
        echo "</table>";
	}


}

?>























</body>
</html>