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
if(isset($_POST['name']) and isset($_POST['textarea'])){
    $query = "INSERT INTO book SET author = '$_POST[name]', text = '$_POST[textarea]', date = '$_POST[time]'";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $res = mysqli_affected_rows($link);
    exit(json_encode($res));
} else {
    $query = "SELECT * FROM book";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}
