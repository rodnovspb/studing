<?php
require_once '../show.php';
require 'bootstrap.php';

use DiDom\Document;


ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

$domain = 'https://tury.ru';

$paths = [
    'https://tury.ru',
];

$parsed = [];


$i = 0;
while ($i < count($paths)){
    $path = $paths[$i];
    $text  = getPage($path);
    $document = new Document($text);
    if($document->has('a')){
        $links = $document->find('a');
        foreach ($links as $link){
            $href = normalize($domain, $path, $link->href);
            if(!in_array($href, $parsed)){
                if (!in_array($href, $paths) && str_starts_with($href, $domain) && str_contains($href, '/hotel/') && str_contains($href, '/id/')) {
                    $paths[] = $href;
                    $html= getPage($href);
                    $hotel = new Document($html);
                    if($hotel->has('.page__hotel')){
                        $name = $hotel->first('.hotel__title div.h1') ? trim($hotel->first('.hotel__title div.h1')->text()) : null;
                        $desc = $hotel->first('.hotel__text p') ? trim($hotel->first('.hotel__text p')->text()) : null;
                        $img = $hotel->first('img.hotel-gallery__img') ? $hotel->first('img.hotel-gallery__img')->src : null;
                        $bread_crumbs = $hotel->first('.bread-crumbs__list')->find('.bread-crumbs__link');
                        $country = trim($bread_crumbs[2]->text());
                        $city = trim($bread_crumbs[3]->text());
                        Org::query()->create(['name' => $name, 'description' => $desc, 'cat' => $country, 'subcat' => $city, 'img' => $img, 'url' => $href]);
                    }
                }
                $parsed[] = $href;
            }

        }
    }
    $i++;
}

show($paths, 1);







function getPage($path) {
    $curl = curl_init($path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
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


























































