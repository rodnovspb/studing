<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;

$url = 'http://targ.loc/';

$document = new Document($url, true);

$arr = [];
foreach ($document->find('a') as $item) {
    $arr[] = ['href' => $item->href, 'text' => $item->text()];
}

show($arr, 1);