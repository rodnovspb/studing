<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;




$client = new Client();
$url = 'https://ya.ru';
$response = $client->request('get', $url)->getBody()->getContents();



getPage($url);


function getPage($url) {
    $document = new Document($url, true);

    $links = $document->find('link');

    $scripts = $document->find('script');

    foreach ($links as $link){
        if(str_starts_with($link->href, $url) || !preg_match('#^http#', $link->href)){
            $link->setAttribute('href', normalize($url, $link->href));
        }
    }

    foreach ($scripts as $script){
//        if(str_starts_with($script->src, $url) || !preg_match('#^http#', $script->src)){
//            $script->setAttribute('src', normalize($url, $script->src));
//        }
        echo $script->src;
    }

    echo $document->html();
}











function normalize($target, $path){
    preg_match('#(https://[^/]+)/?#', $target, $match);
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












