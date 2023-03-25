<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc/';

$document = new Document($url, true);

foreach ($document->find('nav a') as $item){
    echo $item->href . '<br>';
}


