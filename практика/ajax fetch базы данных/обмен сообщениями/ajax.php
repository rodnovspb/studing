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

if(isset($_GET['lastmessages']) and $_GET['lastmessages'] == true){
    $query  = "SELECT * from chat ORDER BY id DESC LIMIT 10";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data=[]; $row = mysqli_fetch_assoc($res); $data[]=$row);
    exit(json_encode($data));
}

if(isset($_GET['chat']) and isset($_GET['time'])){
    $time = $_GET['time'];
    if($_GET['chat'] == 1){
        $query = "SELECT * FROM chat WHERE sender = 2 and timestamp > '$time' LIMIT 5";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
        exit(json_encode($data));
    } elseif ($_GET['chat'] == 2){
        $query = "SELECT * FROM chat WHERE sender = 1 and timestamp > '$time'";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
        exit(json_encode($data));
    }
}



