<?php

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use function Symfony\Component\String\s;


$url = 'https://zagony.ru/2023/03/27/kak-pravilno-ispolzovat-gladilnuyu-dosku.html';
$domain = 'https://zagony.ru';
$client = new Client();



try {
    $response = $client->request('get', $url)->getBody()->getContents();
    $document = new Document($url);
    $videos = $document->find('video source');

    echo $document->html();

    foreach ($videos as $video){
        $name = preg_match('#/(\w+\.\w+)$#', $video->src, $match);
        $href = normalize($domain, $url, $video->src);
        $data = file_get_contents($href);
        file_put_contents($match[1], $data);
    }

} catch(GuzzleHttp\Exception\ClientException $e){
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();}




function normalize($domain, $target, $path){

    if(str_starts_with($path, 'http')){
        return $path;
    } elseif (str_starts_with($path, '../')){
        preg_match_all('#\.\.\/#', $path, $match);
        $count = count($match[0]);
        for ($i = 0; $i < $count; $i++){
            $path = preg_replace('#^\.\.\/#', '', $path);
            $target = preg_replace('#[^\/]+\/$#', '', $target);
        }
        return $target . $path;
    } elseif ($path === '/'){
        return $domain . '/';
    } elseif (preg_match('#^/#', $path)){
        return $domain . $path;
    } elseif (preg_match('#^(\w+|\.\/{1})#', $path)){
        $path = preg_replace('#^\.\/#', '', $path);
        return $target . $path;
    }

}




























