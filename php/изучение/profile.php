<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<form action="" method="get">
    <input name="id">
    <input type="submit">
</form>

<?php  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = '$id'";
	$res = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($res);
	echo "<p>Логин: $user[login]</p>";
	echo "<p>Имя: $user[name]</p>";
	echo "<p>Фамилия: $user[surname]</p>";
    echo "<p>Отчество: $user[patronymic]</p>";

    if(isset($user['date'])) {
    $date = explode('-', $user['date']);
    $day = $date[3];
    $month = $date[1];
    $year = $date[0];
    $timestamp = mktime(0,0,0, $month, $day, $year);
    $age = floor((time() - $timestamp)/60/60/24/360);
	echo "<p>Дата рождения: $age лет</p>";
    }

} ?>