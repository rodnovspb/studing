<?php
require_once '../show.php';
require 'bootstrap.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);






$domain = 'https://smolensk.jsprav.ru';


$html = getPage($domain);
$document = new Document($html);

$hrefs = $document->find('.cat-tile__blc-list-link');

$fullUrls = [];

foreach ($hrefs as $href){
    $fullUrls[] = normalize($domain, $domain, $href->href);
}


foreach ($fullUrls as $fullUrl){
    $html = getPage($fullUrl);
    $document = new Document($html);
    $orgs = $document->find('.company-list__i .company-info-c');
    foreach ($orgs as $org){
        $name = $org->first('.company-info-name-org') ? htmlspecialchars(trim($org->first('.company-info-name-org')->text())) : null;
        $cat = $org->first('.company-info-name-category') ? htmlspecialchars(trim($org->first('.company-info-name-category')->text())) : null;
        $address = $org->first('.company-info-address-full') ? htmlspecialchars(trim($org->first('.company-info-address-full')->text())): null;
        
        $phones = $org->first('.company-info-phone') ? htmlspecialchars(trim(json_decode($org->first('.company-info-phone')->getAttribute('data-props'))->phones[0])) : null;
        
        
        $site = $org->first('.company-info-site-open') ? htmlspecialchars(trim($org->first('.company-info-site-open')->text())) : null;
        
        Org::query()->create(['name' => $name, 'cat' => $cat, 'address' => $address, 'phones' => $phones,  'site' => $site]);
        
    
    }
}


show('Конец', 1);






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











































































