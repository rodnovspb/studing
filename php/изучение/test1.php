





<?php





session_start();

if(!isset($_SESSION['time'])){
    $timestamp = time();
    $time = date("H:i:s", $timestamp);
    $_SESSION['time'] = $timestamp;
    echo "Ваш первый заход в $time";
}

else {
    $time = date("H:i:s", $_SESSION['time']);
    echo date("H:i:s")."<br>";
    echo "Вы заходили последний раз $time";
    $_SESSION['time'] = time();
}
















?>
