<?php

require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'parsing';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");





$url  = 'http://targ.loc';

$document = new Document($url, true);

$items = $document->find('nav a');


foreach ($items as $item) {
    $page = new Document($url . $item->href, true);
    $links = $page->find('nav a');
        foreach ($links as $link1){
            $page = new Document($url . $link1->href, true);
            $title =  $page->first('title')->text();
            $text =  $page->first('p')->text();
            $query = "INSERT INTO pages SET title='$title', text='$text'";
            mysqli_query($link, $query) or die(mysqli_error($link));
        }
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












