<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;



$document = new Document('http://targ.loc', true);



echo getCharset($document);





function getCharset($document){
    $charset = $document->first('meta')->charset ?? $document->first('meta')->content;
    if($charset = $document->first('meta')->charset){
        return $charset;
    } elseif ($charset = $document->first('meta')->content){
        preg_match('#charset\s*=\s*([\w-]+)\s*#', $charset, $match);
        return $match[1];
    }
}















