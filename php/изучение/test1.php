


<?php


if(!isset($_COOKIE['timer'])) {
    setcookie('timer', time());
    echo 'Добро пожаловать!';
}
else {
    $nowtime = time();
    $lasttime = $_COOKIE['timer'];
    $differ = $nowtime - $lasttime;
    echo "Вы заходили $differ секунд назад";
    setcookie('timer', $nowtime);
}














?>