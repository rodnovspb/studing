<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$url = 'http://xn----7sbencqdqgwn7af2ee4k.xn--p1ai/pechati-shtampy-zakaz/order-success.html';

$data = ['names[0]' => 'Целевые посетители для вашего сайта. Гибкие настройки. Быстрый результат! · Оплата за результат. Целевая аудитория. Стратегии. Привлечение клиентов', 'names[4]' => 89126535453, 'category_id' => 132, 'Event' => 'Order'];

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

curl_exec($curl);