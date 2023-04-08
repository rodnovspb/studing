<?php

require_once '../show.php';
require_once 'bootstrap.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$url = 'https://www.kufar.by/l?';

$headers = [
    'Accept : text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Referer: https://www.kufar.by',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
    'Cookie: lang=ru; kufar_cart_id=27e70e23-28b2-43fd-a2c7-00894b084826; kuf_agr={"advertisements":true,"statistic":true,"mindbox":true}; fullscreen_cookie=1; web_push_banner_listings=3; kuf_SA_brand-promo-popup=1; kuf_SA_subscribe_user_attention=1; KUF_SUGGESTER_SHOW_2_ITERATION=1; md=li; kuf_VCH_promo_vas=2'];

//должен отправить:
//предыдущая
//следующая
//конечная
//то есть ссылки с цифрами

$data = json_encode([
    "cursor=eyJ0IjoiYWJzIiwiZiI6dHJ1ZSwicCI6MX0%3D&pathname=listings",
    "cursor=eyJ0IjoiYWJzIiwiZiI6dHJ1ZSwicCI6NX0%3D&pathname=listings",
    "cursor=eyJ0IjoicmVsIiwiYyI6W3sibiI6Imxpc3RfdGltZSIsInYiOjE2ODA5MTY4NzIwMDB9LHsibiI6ImFkX2lkIiwidiI6MTkxMDQ5MTA0fV0sImYiOnRydWV9&pathname=listings",
    "cursor=eyJ0IjoiYWJzIiwiZiI6ZmFsc2UsInAiOjF9&pathname=listings"
]);



$curl = curl_init('https://api.kufar.by/seotools/v1/to-friendly');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$html =  curl_exec($curl);



show(json_decode($html, true), 1);

//$document = new Document($html);
//
//$sections = $document->find('section');
//
//foreach ($sections as $section){
//    if(!$section->has('object')){
//
//    }
//}
//
//$links = $document->find('a[href^=/l?cursor=]');
//
function getContent($url, $headers = []){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    return curl_exec($curl);
}


?>








