<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);



$curl = curl_init('https://www.cy-pr.com');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($curl);

$document = new Document($html);
$scripts = $document->find('script');

foreach ($scripts as $script){
    $script->remove();
}

echo $document->html();
