<?= 'Все запросы перенаправлены на главную в .htaccess'; ?>

<?php
require 'show.php';

$url = $_SERVER['REQUEST_URI'];

preg_match('#^/(\d+)/(\d+)/?$#', $url, $match);

if(isset($match[1]) && isset($match[2])){
    echo rand($match[1], $match[2]);
} else {
    echo 'ошибка';
}




?>

