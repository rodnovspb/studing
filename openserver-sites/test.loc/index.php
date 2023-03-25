<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc/';

$document = new Document($url, true);



foreach ($document->find('main img') as $item){
    $arr[] = ['src' => $item->src, 'alt' => $item->alt];
}


show($arr, 1);