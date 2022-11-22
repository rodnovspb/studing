<?= 'Все запросы перенаправлены на главную в .htaccess'; ?>

<?php
require 'show.php';

$url = $_SERVER['REQUEST_URI'];


// случайное число
//preg_match('#^/(\d+)/(\d+)/?$#', $url, $match);
//
//if(isset($match[1]) && isset($match[2])){
//    echo rand($match[1], $match[2]);
//} else {
//    echo 'ошибка';
//}



//проверка на високосность
if(preg_match('#^/leap/([0-9]{1,4})/?$#', $url, $match)){
    $year =  $match[1];
    if(date('L', strtotime("$year-10-10"))){
        echo '<div>Високосный год</div>';
    } else {
        echo '<div>Невисокосный год</div>';
    }
} elseif (preg_match('#^/diff/(\d{4})/(\d{4})/?$#', $url, $match)){
    $year1 =  $match[1];
    $year2 =  $match[2];
    $diff = abs($match[2] - $match[1]);
    echo "<div>Разница между годами $diff лет</div>";
} else {
    echo '<div>Ошибка</div>';
}














