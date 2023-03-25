<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;

$url = 'http://targ.loc/';

$document = new Document($url, true);


foreach ($document->find('div') as $item) {
    echo $item->text() . "<br>";
}

