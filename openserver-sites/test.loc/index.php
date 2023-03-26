<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use function Symfony\Component\String\s;


$url = 'http://targ.loc/cat/sat/';

$href = '../../dir/page.html';

getUrl($url, $href);

function getUrl($domain, $href){
    preg_match_all('#\.\.\/#', $href, $match);
    $count = count($match[0]);
    for ($i = 0; $i < $count; $i++){
        $href = preg_replace('#\.\.\/#', '', $href);
        $domain = preg_replace('#[^\/]+\/$#', '', $domain);
    }

    $res = $domain . $href;

    show($res, 1);

}








