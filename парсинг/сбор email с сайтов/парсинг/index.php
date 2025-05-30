<?php
require 'bootstrap.php';
require 'show.php';

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


/*Вариант, когда не нужно вставлять название конторы*/

$sites = Site::pluck('site')->all();

$emails = Mail::pluck('email')->all();
$count = 0;

foreach ($sites as $site){
    echo $count . ": " . $site . PHP_EOL;
    $count++;
    $document = getPage($site);
    preg_match_all('#\b[a-zA-Z0-9_\.-]+@[\da-zA-Z\.-]+\.[a-zA-Z\.]{2,6}\b#', $document, $matches);
    if(!empty($matches[0])){
        foreach ($matches[0] as $match){
            $match = mb_strtolower($match);
            if(!in_array($match, $emails) && !preg_match('#svg|jpg|webp|png|jpeg|wixpress|ingest|gif#', $match)){
                array_push($emails, $match);
                Mail::create(['email' => $match]);
            }
        }
    }
}






function getPage($path) {
    $headers = [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        "Referer: $path",
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
    ];
    $curl = curl_init($path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt'); без русских папок в пути
//    curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
}