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


$money = 1000;

$curl = curl_init('https://select.by/kurs/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);

$document = new Document($html);

$rows = $document->find('tr.tablesorter-hasChildRow');

foreach ($rows as $row) {
    $firstTd = $row->first('td');
    $num = $firstTd->nextSibling('td')->text();
    $num = str_replace(',', '.', $num);

    $roubles = round($money/(float)$num, 3);
    echo $firstTd->first('a')->text() . " " . $roubles . "<br>";

}



























































