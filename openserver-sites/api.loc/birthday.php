<?php


require 'show.php';
require 'db.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $query = "SELECT * FROM users WHERE token = $token";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($res);
    if(empty($user)){
        echo 'Такого пользователя нет';
        return;
    } else {
        $count = $user['count_day'];
        $id = $user['id'];
        $date = $user['date'];
        $now = date("Y-m-d");
        if($now !== $date){
            $query = "UPDATE users SET date = '$now', count_day = 9 WHERE id = $id";
        } elseif($count > 0) {
            $count = $count - 1;
            $query = "UPDATE users SET count_day = $count WHERE id = $id";
            echo "<div>Осталось $count запросов на сегодня</div>";
        } elseif($count == 0) {
            echo 'Осталось 0 запросов на сегодня';
            return;
        }
        mysqli_query($link, $query) or die(mysqli_error($link));
    }
    
    
    
    if(!empty($_GET['date']) && preg_match('#^\d{4}-\d{2}-\d{2}$#', $_GET['date'])){
        $arr = explode('-', $_GET['date']);
        $year = $arr[0];
        $month = $arr[1];
        $day = $arr[2];
        if(checkdate($month, $day, $year)){
            $nowYear = date('Y');
            $thisYearBirth = $nowYear . '-' . $month . '-' . $day;
            $nextYearBirth = $nowYear + 1 . '-' . $month . '-' . $day;
            $thisYearBirthTimestamp = strtotime($thisYearBirth);
            $nextYearBirthTimestamp = strtotime($nextYearBirth);
            
            $timestamp = time();
            if($thisYearBirthTimestamp > $timestamp){
                $days = ($thisYearBirthTimestamp - $timestamp)/60/60/24;
                echo "Осталось " . round($days) . " суток до $thisYearBirth";
            } else {
                $days = ($nextYearBirthTimestamp - $timestamp)/60/60/24;
                echo "Осталось " . round($days) . " суток до $nextYearBirth";
            }
        } else {
            echo 'такой даты не существует';
        }
    } else {
        echo 'ошибка';
    }
}