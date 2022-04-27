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

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $query = "DELETE FROM employees WHERE id=$id";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $isDel = mysqli_affected_rows($link) === 1;
        exit(json_encode($isDel));
    } else {
        $query = "SELECT id, surname FROM employees";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data=[]; $row = mysqli_fetch_assoc($res); $data[] = $row);
        exit(json_encode($data));
    }


?>
