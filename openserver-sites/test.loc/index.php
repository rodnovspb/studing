<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc/';

$document = new Document($url, true);



foreach ($document->find('main a') as $item){
    $arr[] = $item->href;
}


show($arr, 1);