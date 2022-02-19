<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
$id = $_GET['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$salary = $_POST['salary'];

$query = "UPDATE users SET
name = '$name',
age= '$age',
salary = '$salary' WHERE id = '$id'";

mysqli_query($link, $query) or die(mysqli_error($link));
echo 'Юзер обновлен'

?>

<?php
session_start();

if(!empty($_SESSION['flash'])) {
    foreach ($_SESSION['flash'] as $elem) {
        echo $elem;
    }
    $_SESSION['flash']=[];

}


?>