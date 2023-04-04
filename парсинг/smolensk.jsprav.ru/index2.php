<?php
require_once '../show.php';
require 'bootstrap.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$url1 = 'https://smolensk.jsprav.ru/avtoservisyi-avtotehtsentryi/';
$url2 = 'https://smolensk.jsprav.ru/avtoservisyi-avtotehtsentryi/page-2/';

$html = getPage($url1);

$html2 = getPage($url2);

echo $html2;








function getPage($path) {
    $headers = [
        "accept" => "*/*",
        "accept-language"=> "ru,en;q=0.9,ru-RU;q=0.8,en-US;q=0.7,la;q=0.6",
        "cache-control"=> "no-cache",
        "pragma"=> "no-cache",
        "sec-ch-ua"=> "\"Google Chrome\";v=\"111\", \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"111\"",
        "sec-ch-ua-mobile"=> "?0",
        "sec-ch-ua-platform"=> "\"Windows\"",
        "sec-fetch-dest"=> "empty",
        "sec-fetch-mode"=> "cors",
        "sec-fetch-site"=> "same-origin",
        "sec-gpc"=> "1",
        "x-csrftoken"=> "Ttxyn0gXpD3SEmQ8QuRETH54TqUdm9tX",
        "x-requested-with"=> "XMLHttpRequest"
    ];
    
    
    $curl = curl_init($path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
}
