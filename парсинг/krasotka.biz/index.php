<?php
require_once '../show.php';
require 'bootstrap.php';

use DiDom\Document;


ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

$domain = 'https://www.krasotka.biz';

$paths = [
    'https://www.krasotka.biz',
];



/*1 этап. Спарсил все ссылки статей*/
//$i = 0;
//while ($i < count($paths)){
//    $path = $paths[$i];
//    $text  = getPage($path);
//    $text = iconv('windows-1251', 'utf-8', $text);
//    $document = new Document($text);
//    if($document->has('a')){
//        $links = $document->find('a');
//        foreach ($links as $link){
//            $href = normalize($domain, $path, $link->href);
//            if (!in_array($href, $paths) && str_starts_with($href, $domain)) {
//                $paths[] = $href;
//                $q = parse_url($link->href, PHP_URL_QUERY);
//                if(str_contains($link->class, 'announce') && !str_contains($q, 'sign') && !str_contains($q, 'name')){
//                    Page::create(['url' => $href]);
//                }
//            }
//        }
//    }
//    $i++;
//}


/*2 этап. Спарсил текст и картинки у статей*/
$imageUrlArr = [];
Page::chunkById(200, function ($pages){
    $domain = 'https://www.krasotka.biz';
    foreach ($pages as $page){
        $html = getPage($page->url);
        $html = iconv('windows-1251', 'utf-8', $html);
        $document = new Document($html);
        if($document->has('h1.atema')){
            $scripts = $document->find('script');
            foreach ($scripts as $script){
                $script->remove();
            }
            $menu = $document->first('h1.atema');
            $title = $menu->firstChild('a')->text();
            $subtitle = $menu->first('a.sub[style="margin-left:15px;color:#000;"]');
            $subtitle = $subtitle ? $subtitle->text() : null;
            $page = $document->first('#page');
            $head = $page->first('h1') ? $page->first('h1') : null;
            if($head) {
                $text = $head->nextSibling('div');
            } else {
                $text = $page->first('#art');
            }
            if($text){
                $images = $text->find('img');
            } else {
                $images = [];
            }
            
            $head = $head ? $head->html() : null;
            $text = $text ? $text->html() : null;
            $content =  $head . $text;
            $content = remove_emoji($content);
            Content::create(['title' => $title, 'subtitle' => $subtitle, 'text' => $content]);

            
            if(count($images) > 0){
                foreach ($images as $image){
                    $src = str_replace('..', '',  $image->src);
                    $imageUrlArr[] = $domain . $src;
                }
            }

        }
    }
});


//не сработала, нужно что-то править
$i = 0;
foreach ($imageUrlArr as $item){
    $data = file_get_contents($item);
    $file = preg_match('#/(\w+\.\w+)$#', $item, $match);
    file_put_contents( 'Files/' . $match[1], $data);
    $i++;
    if($i === 200) break;
}

show('Конец', 1);











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



function remove_emoji($string) {
    $symbols = "\x{1F100}-\x{1F1FF}" // Enclosed Alphanumeric Supplement
        ."\x{1F300}-\x{1F5FF}" // Miscellaneous Symbols and Pictographs
        ."\x{1F600}-\x{1F64F}" //Emoticons
        ."\x{1F680}-\x{1F6FF}" // Transport And Map Symbols
        ."\x{1F900}-\x{1F9FF}" // Supplemental Symbols and Pictographs
        ."\x{2600}-\x{26FF}" // Miscellaneous Symbols
        ."\x{2700}-\x{27BF}"; // Dingbats
    
    return preg_replace('/['. $symbols . ']+/u', '', $string);
}























































