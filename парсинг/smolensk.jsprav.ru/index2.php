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
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Referer: https://smolensk.jsprav.ru/avtoservisyi-avtotehtsentryi/',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
        'X-Requested-With: XMLHttpRequest'
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
