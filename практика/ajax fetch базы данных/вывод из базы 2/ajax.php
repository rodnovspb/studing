<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");

?>

<?php if(isset($_POST['key'])){
  	$key = (int)($_POST['key']);
    $query = "SELECT * FROM employees WHERE id= $key";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = mysqli_fetch_assoc($result);
    exit(json_encode($data));
} ?>
