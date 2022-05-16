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

if(isset($_POST['text'])){
    $query = "INSERT INTO notepad SET 
    text = '$_POST[text]',
    datetime = '$_POST[dateTime]',
    timestamp = '$_POST[timestamp]'";
    mysqli_query($link, $query) or die(mysqli_error($link));
} elseif (isset($_GET['timestamp'])){
    $query = "SELECT * FROM notepad WHERE `timestamp` = '$_GET[timestamp]'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $result = mysqli_fetch_assoc($res);
    exit(json_encode($result));
} elseif (isset($_POST['timestamp'])){
    $query = "UPDATE notepad SET text = '$_POST[changeText]' WHERE timestamp = '$_POST[timestamp]'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
}
