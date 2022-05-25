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
    $date = $_POST['date'];
    $text = $_POST['text'];
    $timestamp = $_POST['timestamp'];
    $query = "INSERT INTO plans SET date = '$date', text = '$text', timestamp = '$timestamp'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
} elseif (isset($_GET['date'])){
    $date = $_GET['date'];
    $query = "SELECT * FROM plans WHERE date = '$date' order by timestamp";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    if(count($data)>0) exit(json_encode($data));
    else exit(json_encode(false));
} elseif (isset($_GET['delete'])){
    $timestamp = $_GET['delete'];
    $query = "DELETE from plans WHERE timestamp = '$timestamp'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
} elseif (isset($_GET['checked'])){
    $timestamp = $_GET['timestamp'];
    $checked = $_GET['checked'];
    $query = "UPDATE plans SET done = $checked WHERE timestamp = '$timestamp'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
}
