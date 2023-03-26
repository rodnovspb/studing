<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc/cat/sat/';

$href = '../dir/page.html';

getUrl('http://targ.loc', $url, $href);

function getUrl($site, $domain, $href){
    $arr = [];
    if(str_starts_with($href, 'http')){
        $arr[] = $href;
    } elseif (str_starts_with($href, '../')){
        preg_match_all('#\.\.\/#', $href, $match);
        $count = count($match[0]);
        for ($i = 0; $i < $count; $i++){
            $href = preg_replace('#^\.\.\/#', '', $href);
            $domain = preg_replace('#[^\/]+\/$#', '', $domain);
        }

        $res = $domain . $href;
        $arr[] = $res;
    } elseif (str_starts_with($href, '/')){
        $res = $site . $href;
        $arr[] = $res;
    } elseif (preg_match('#^\w+#', $href)){
        $res = $domain . $href;
        $arr[] = $res;
    }


    show($arr, 1);

}








