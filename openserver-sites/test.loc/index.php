<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;



$domain = 'http://targ.loc/cat/';
$domainS = 'https://targ.loc';

$document = new Document('http://targ.loc', true);

$links = $document->find('a');

$arr = [];

foreach ($links as $link){
    if(str_starts_with($link->href, 'http://targ.loc') || str_starts_with($link->href, $domainS) || !preg_match('#^http#', $link->href)){
        $arr[] = normalize($domain, $link->href);
    }
}

show($arr, 1);

function normalize($target, $path){
    preg_match('#(http://[^/]+)/?#', $target, $match);
    $domain = $match[1];

    if(str_starts_with($path, 'http')){
        return $path;
    } elseif (str_starts_with($path, '../')){
        preg_match_all('#\.\.\/#', $path, $match);
        $count = count($match[0]);
        for ($i = 0; $i < $count; $i++){
            $path = preg_replace('#^\.\.\/#', '', $path);
            $target = preg_replace('#[^\/]+\/$#', '', $target);
        }
        $res = $target . $path;
        return $res;
    } elseif ($path === '/'){
        return $domain . '/';
    } elseif (preg_match('#^/#', $path)){
        $res = $domain . $path;
        return $res;
    } elseif (preg_match('#^(\w+|\.\/{1})#', $path)){
        $path = preg_replace('#^\.\/#', '',$path);
        $res = $target . $path;
        return $res;
    }

}







