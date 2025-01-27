<?php


require_once './vendor/autoload.php';
require_once './show.php';

use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use classes\DB;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');


$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//$db->query("UPDATE links SET done = null, tmp_uniq = null");

// это не защита от перезаписи, а разделение строк БД между разными скриптами
//$db->query("UPDATE links SET tmp_uniq = '{$tmp_uniq}' WHERE tmp_uniq is null limit 10");

while (true){
    $tmp_uniq = md5(uniqid().time());
    $db->query("UPDATE links SET tmp_uniq = '{$tmp_uniq}' WHERE tmp_uniq is null limit 1");
    $result = $db->query("UPDATE links SET done = 1 WHERE tmp_uniq = '{$tmp_uniq}'");
    echo $result . PHP_EOL;
    sleep(10);
    if(!$result){
        exit('Все обработано');
    }
}





//$client = new Client();
//
//try {
//    $response = $client->request('GET', $url)->getBody()->getContents();
//
//	$document = new Document($response);
//
//    $listlinks = $document->find('a');
//
//    foreach ($listlinks as $link) {
//        $href = $db->escape($link->getAttribute('href'));
//        $sql = "insert into links set link = '{$href}'";
//        $db->query($sql);
//        usleep(200000);
//        echo $href . PHP_EOL;
//    }
//
//
//    } catch(GuzzleHttp\Exception\ClientException $e){
//        $response = $e->getResponse();
//        $responseBodyAsString = $response->getBody()->getContents();
//    }

