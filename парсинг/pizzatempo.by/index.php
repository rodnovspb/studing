<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'pizza';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

require_once '../show.php';

require_once '../vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

$domain = 'https://www.pizzatempo.by';


$paths = [
    'https://www.pizzatempo.by/menu/goryachee.html',
];


$i = 0;
while ($i < count($paths)){
    $path = $paths[$i];
    $text  = getPage($path);
    
    $document = new Document($text);
    $hrefs = $document->find('a');
    foreach ($hrefs as $href){
        $url = $href->href;
        $normUrl = normalize($domain, $path, $url);
        $normUrl = preg_replace('#(/\?|/\#).*$#', '', $normUrl);
        if (!in_array($normUrl, $paths) && str_starts_with($normUrl, $domain) && str_ends_with($normUrl, '.html')) {
            $paths[] = $normUrl;
        }
    }
    $i++;
}


$client = new Client();

try {
    foreach ($paths as $path){
        $response = $client->request('GET', $path)->getBody()->getContents();
        $document = new Document($response);
        $headers = $document->find('.previews h3 span');
        foreach ($headers as $header){
            echo $header->text() . "<br>";
        }
    }
    
} catch(GuzzleHttp\Exception\ClientException $e){
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
}


function getPage($path) {
    $curl = curl_init($path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIEFILE, './cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR,  './cookie.txt');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
}


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











































































