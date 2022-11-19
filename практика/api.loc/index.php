<?php
require 'vendor/autoload.php';
require 'show.php';

use GuzzleHttp\Client;


$client = new Client();

$url = 'https://currate.ru/api/?get=rates&pairs=USDRUB,EURRUB&key=3fe06562466ce8edb89165187c8e2ac2';

$response = $client->request('get', $url)->getBody()->getContents();

show($response, 1);

