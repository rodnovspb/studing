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




if(isset($_POST['text']) and isset($_POST['sender']) and isset($_POST['timestamp'])){
    $text = $_POST['text'];
    $sender = (int)$_POST['sender'];
    $timestamp = $_POST['timestamp'];
    $query = "INSERT INTO chat SET text = '$text', sender = $sender, timestamp = '$timestamp'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    exit(json_encode(mysqli_affected_rows($link)));
}

if(isset($_GET['sender1']) and isset($_GET['timestamp1'])){
    $sender = (int)$_GET['sender1'];
    $timestamp = $_GET['timestamp1'];
    $query = "SELECT * FROM chat WHERE sender = $sender and timestamp > '$timestamp'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}

if(isset($_GET['sender2']) and isset($_GET['timestamp2'])){
    $sender = (int)$_GET['sender2'];
    $timestamp = $_GET['timestamp2'];
    $query = "SELECT * FROM chat WHERE sender = $sender and timestamp > '$timestamp'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}





