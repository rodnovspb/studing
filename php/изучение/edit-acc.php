<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
session_start();

if($_SESSION['auth']) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id = '$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
}
?>

<form action="" method="post">
    <input name="name" placeholder="Имя" value="<?= $user['name'] ?>">
    <input name="surname" placeholder="Фамилия" value="<?= $user['surname'] ?>">
    <input name="patronymic" placeholder="Отчество" value="<?= $user['patronymic'] ?>">
    <input name="date" type="date" value="<?= $user['date'] ?>">
  	<input type="submit" name="submit">
</form>

<?php

if(!empty($_POST['submit'])){
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $patronymic = $_POST['patronymic'];
  $date = $_POST['date'];
  $query = "UPDATE user SET
                name='$name',
                surname='$surname',
                patronymic='$patronymic',
                date='$date' WHERE id='$id'";
    mysqli_query($link, $query);
    echo 'Обновлен';
}
?>

