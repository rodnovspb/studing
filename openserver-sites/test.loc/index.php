<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc';


$document = new Document($url, true);

$url = 'http://targ.loc/cat/sat/';

foreach ($document->find('a') as $item){
    echo $url . $item->href . "<br>";
}









