<?php

if(isset($_REQUEST['num'])){
    $num = (int)$_REQUEST['num'];

//    первый способ с записью в файл
//    $filename = 'results.txt';
//    $content = file($filename);
//    $arr = explode('||', $content[0]);
//    $yes = (int)$arr[0];
//    $no = (int)$arr[1];
//
//    if($num === 0){
//        $no = $no + 1;
//    } elseif ($num === 1){
//        $yes = $yes + 1;
//    }
//
//    $str = $yes . "||" . $no;
//    file_put_contents($filename, $str);
//
//    $result = ['all'=>($yes + $no), 'yes' => $yes, 'no' => $no];
//    exit(json_encode($result));

    //    второй способ с записью в БД

    mb_internal_encoding('UTF-8');
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    $host = "localhost";
    $user = 'root';
    $pass = '';
    $name = 'mydb';
    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    if($num === 1 ){
        $query = "UPDATE votes SET yes = yes + 1 WHERE id = 1";
        mysqli_query($link, $query) or die(mysqli_error($link));
    } elseif ($num === 0){
        $query = "UPDATE votes SET no = no + 1  WHERE id = 1";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    $query = "SELECT * FROM votes";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $data = mysqli_fetch_assoc($res);
    exit(json_encode($data));
}









