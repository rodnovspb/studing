<?php

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use function Symfony\Component\String\s;

$jar = new \GuzzleHttp\Cookie\CookieJar;

$url = 'http://pechati.loc/ooo';

$client = new Client();

$data = ['field1'=>'value1', 'field2'=>'value2'];
var_dump(http_build_query($data, '', '&'));
show(http_build_query($data), 1);


$get = ['name'  => 'Alex', 'email' => 'mail@example.com'];
show(http_build_query($get), 1);
$curl = curl_init('https://www.youtube.com/?' . http_build_query($get));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);

echo $html;















































