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

if (isset($_GET['all']) && $_GET['all'] === 'on') {
    $query = "SELECT * FROM employees";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}

if (isset($_GET['num'])) {
    $num = (int)($_GET['num']);
    $query = "SELECT * FROM employees WHERE id='$num'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = mysqli_fetch_assoc($res);
    exit(json_encode($data));
}
