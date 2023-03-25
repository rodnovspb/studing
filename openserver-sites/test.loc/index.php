<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;

$startMemory = memory_get_usage();

show(microtime(true), 1);

$url = 'https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%B3%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0';

$document = new Document($url, true);

$arr = [];
foreach ($document->find('a') as $item) {
    $arr[] =  $item->text();
}

$startMemory = memory_get_usage();

show($startMemory, 1);