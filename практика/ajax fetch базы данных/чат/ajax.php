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

if(!empty($_POST['sender']) && !empty($_POST['text']) && !empty($_POST['time'])){
    $query = "INSERT INTO messenger SET sender = '$_POST[sender]', text = '$_POST[text]', time = '$_POST[time]'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
} elseif (isset($_GET['get'])){
    $query = "SELECT * FROM messenger ORDER BY time DESC LIMIT 5";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}




