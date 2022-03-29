<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
session_start();
if (!empty($_GET['out'])) {
    if ($_GET['out'] == 1) {
        session_destroy();
        header('Location:/');
    };
}
$url = $_SERVER['REQUEST_URI'];
if(preg_match('/^\/$/', $url, $match) == 1){
    if(empty($_SESSION['auth'])){
        include 'main.php';
    } else {
        header("Location:id$_SESSION[id]");
        exit();
    }

}
elseif(preg_match('/\/id(\d+)$/', $url, $match) == 1){
    include 'id.php';
}
elseif (preg_match('/^\/messages$/', $url, $match) == 1){
    include 'messages.php';
}
elseif (preg_match('/^\/messages\?for=[0-9]+$/', $url, $match) == 1){
    include 'messages.php';
}
else {
    include '404.php';
}

?>



