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



$url = 'http://targ.loc/form.php';

$client = new Client();

try {
    $response = $client->request('POST', $url, [
        'form_params' => [
            'num1' => 22,
            'num2' => 33,
            'xxx' => '+++',
        ]
    ])->getBody()->getContents();

    $document = new Document($response);
    echo $document->first('#res')->text();


} catch(GuzzleHttp\Exception\ClientException $e){
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();}








































