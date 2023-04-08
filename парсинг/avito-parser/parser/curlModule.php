<?php

function get_content($parseUrl, $type, $page = FALSE, $proxy = FALSE) {
    
    if(!defined('SCHEME')) {
        define('SCHEME', 'https://');
    }
    
    if($type == 'desktop') {
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36';
        $domain = 'avito.ru';
    } else {
        $userAgent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1';
        $domain = 'm.avito.ru';     
    }
        
    if($page AND $page > 1) {
        if(strrpos($parseUrl, '?')) {
            $arrUrl = explode('?', $parseUrl);
            $parseUrl = $arrUrl[0].'?p='.$page.'&'.$arrUrl[1];
        } else {
            $parseUrl .= '?p='.$page;
        }
    }

    $contentPage = "";
    $url = "https://m.avito.ru".$parseUrl;
    //file_put_contents('./file.txt', PHP_EOL . $url, FILE_APPEND);
    $referer = "https://www.yandex.ru/?yclid=" . rand(0, 100) . rand(0, 100) . rand(0, 100) . rand(0, 100) . rand(0, 100);
    
    $headers = [
        'Host: m.avito.ru',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: '.$userAgent,
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
        'Content-Type: text/html; charset=utf-8',
        //'Transfer-Encoding: chunked',
        'Connection: keep-alive',
        'Keep-Alive: timeout=75',
        'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
        'Cookie: u=21vmd2no.n9j660.f6wvmteb71; _ym_uid=14714265131042248860; __gads=ID=abdce9bfb52a4f31:T=1471609884:S=ALNI_Man9QAeuZ6Tl3tkxrGSUGG6wcNWTA; dfp_group=16; weborama-viewed=1; f=4.b53ee41b77d9840ae5ba07059b0d202f6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc5b68b402642848be5b68b402642848bead33eaef55dd0da15b68b402642848be44620aa09dfab02de75a2b007093b89d05886bb864a616652f4891ba472e4f2618dc79c78ea31ba1ea48e2d99c5312aaffe65fd77b784b7bffe65fd77b784b7bb8a109ce707ef6137c6d6c44a42cb1c70176a16018517b5da399e993193588ae728b89f8cc435269728b89f8cc435269728b89f8cc435269728b89f8cc435269ffe65fd77b784b7b862357a052e106f23f601feec47f73646b10d486f2e98b94bbdd84537b03ad770afd39af11174777efa5660fd55a65b968eae11c327fbc017e3896e0dc5507a54fe26563f7e70342b3db510bee0b105f2878bfba0574374f5b68b402642848be5b68b402642848beec8be4370a6135b1dca1b47b9709106b31ad00aa0bbae7adb817e52b74497bd1; _ym_isad=1; nfh=2be1f7c16dcf4b7be36a84c5eded50d7; _ga=GA1.2.64612684.1471426513; _gid=GA1.2.56430582.1495885618; nps_sleep=1; __utmt=1; anid=removed; sessid=ba5227935cff55ff872b4e7e339801d6.1495906334; v=1495906269; crtg_rta=cravadb240%3D1%3B; __utma=99926606.64612684.1471426513.1495887691.1495906259.182; __utmb=99926606.7.9.1495906326960; __utmc=99926606; __utmz=99926606.1495216859.178.58.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)',
        'X-XSS-Protection: 1; mode=block',
        'X-Content-Type-Options: nosniff',
        'Referer: ' . str_replace(SCHEME . $domain, '', $url)
         //'Referer: https://m.avito.ru/moskva/uslugi?p=17&sgtd=1&q=%D0%BC%D0%B0%D1%81%D1%82%D0%B5%D1%80+%D0%BC%D0%B0%D0%BD%D0%B8%D0%BA%D1%8E%D1%80%D0%B0+%D0%B8+%D0%BF%D0%B5%D0%B4%D0%B8%D0%BA%D1%8E%D1%80%D0%B0',
    ];

    $cookie = dirname(__FILE__) . "/cookie.txt";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_COOKIESESSION, $url);
    @curl_setopt($ch, CURLOPT_COOKIE, $cookie_get);
    curl_setopt($ch, CURLOPT_COOKIEJAR, realpath($cookie));
    curl_setopt($ch, CURLOPT_COOKIEFILE, realpath($cookie));
    if($proxy) {
        curl_setopt($ch, CURLOPT_PROXY, $proxy['ip'].':'.$proxy['port']);
        curl_setopt($ch, CURLOPT_PROXYTYPE, $proxy['type']);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_ENCODING, 'utf-8');

    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $contentPage = curl_exec($ch);
    curl_close($ch);
    
    return $contentPage;
}

