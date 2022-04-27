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
if(isset($_POST['from']) and isset($_POST['to']))
    $from = $_POST['from'];
    $to = $_POST['to'];
    $query = "SELECT id, surname FROM employees LIMIT $from, $to";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    for($data=[]; $row =  mysqli_fetch_assoc($result); $data[] = $row);
    exit(json_encode($data));
?>
