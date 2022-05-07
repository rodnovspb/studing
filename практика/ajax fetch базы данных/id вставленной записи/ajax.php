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


<?php
$query = "INSERT INTO news SET new='wqeqwe'";
mysqli_query($link, $query) or die(mysqli_error($link));
exit(json_encode((mysqli_insert_id($link))));