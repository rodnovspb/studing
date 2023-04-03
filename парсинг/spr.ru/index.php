<?php
require_once '../show.php';
require 'bootstrap.php';

use DiDom\Document;


ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$domain = 'https://www.spr.ru';
$paths = [
    'https://www.spr.ru/',
];

$parsed = [];



$i = 0;
while ($i < count($paths)){
    $path = $paths[$i];
    $text  = getPage($path);
    $text = iconv('windows-1251', 'utf-8', $text);
    $document = new Document($text);
    if($document->has('a')){
        $links = $document->find('a');
        foreach ($links as $link){
            $href = normalize($domain, $paths[$i], $link->href);
            if(!in_array($href, $paths) && str_starts_with($href, $domain)){
                $paths[] = $href;
                if(!in_array($href, $parsed) && $link->closest('.itemFlexInfo')){
                    $html = getPage($href);
                    $html = iconv('windows-1251', 'utf-8', $html);
                    $page = new Document($html);
                    $name = $page->first('h1.firstHeader') ? trim($page->first('.firstHeader')->text()) : null;
                    $cat = $link->first('span') ? trim($link->first('span')->text()) : null;
                    $address = $page->first('.contactBox_right a.firm_link') ? trim($page->first('.contactBox_right a.firm_link')->text()) : null;
                    $good = $page->first('.good_review') ? trim($page->first('.good_review')->text()) : null;
                    $bad = $page->first('.bad_review') ? trim($page->first('.bad_review')->text()) : null;
                    Org::create(['name' => $name, 'cat' => $cat, 'address' => $address, 'count_good_feedback' => $good, 'count_bad_feedback' => $bad]);
                    $parsed[] = $href;
                }
            }
        }
    }
    
    $i++;
}


show(count($paths), 1);







function getPage($path) {
    $curl = curl_init($path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
}

function normalize($domain, $target, $path){
    
    if(str_starts_with($path, 'http')){
        return $path;
    } elseif (str_starts_with($path, '//')){
        $path = str_replace('//', 'https://', $path);
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


























































