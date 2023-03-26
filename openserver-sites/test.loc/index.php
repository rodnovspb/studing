<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;

$domain = 'http://targ.loc';

$url = 'http://targ.loc/';


$document = new Document($url, true);


$items = $document->find('a');

foreach ($items as $item){
    if(str_starts_with($item->href, 'http')){
        echo $item->href . "<br>";
    } else {
        echo $domain . $item->href . "<br>";
    }
}



