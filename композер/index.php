<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'http://google.com');

echo $response->getBody(); // 200