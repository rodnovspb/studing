<?php

require_once '../show.php';
require_once 'bootstrap.php';
//require_once '../../vendor/autoload.php'; // уже грузим в bootstrap.php

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

while (true){
    $arr = Advertisement::pluck('url')->all();
    for($i = 0; $i < 100; $i++){
        $html = getContent("https://auto.drom.ru/all/page" . $i);
        $document = new Document($html);
        $links = $document->find('a[data-ftid="bulls-list_bull"]');
        foreach ($links as $link){
            $href = $link->href;
            if(!in_array($href, $arr)){
                Advertisement::create([
                    'url' => $link->href,
                    'name' => $link->first('span[data-ftid="bull_title"]')->text(),
                    'price' => $link->first('span[data-ftid="bull_price"]')->text(),
                    'phone' => null,
                    'city' => null,
                    'date' => null,
                ]);
                $arr[] = $href;
            }
        }
    }
    
    sleep(10);
}








function getContent($url){
    $headers = [
        'Accept : text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Referer: https://drom.ru',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
        'Cookie: ring=91045eda7kd2Y5DRjLQBikB9fsjuA0af; cookie_cityid=2; cookie_regionid=78; my_geo=78; PHPSESSID=5f5d0eda96a25e6b89195663992354ac; dr_df=1; drom_search_web=4; firstHit=1; k6W=eyJhbGciOiJSUzI1NiIsImtpZCI6ImRMQ2MxZUFvdV9kZkwteFVWMmdiWHlUM0JnWnAyYVNFSS00UGdIVzlkNEkiLCJ0eXAiOiJKV1QifQ.eyJleHAiOjE2ODA4ODc3MjEsImtpZCI6ImRMQ2MxZUFvdV9kZkwteFVWMmdiWHlUM0JnWnAyYVNFSS00UGdIVzlkNEkiLCJwcm9qZWN0IjoiZHJvbSIsInN1YiI6InI6OTEwNDVlZGE3a2QyWTVEUmpMUUJpa0I5ZnNqdUEwYWYifQ.WEr5tRtoSxnCuijAsgcN7HuAz01SqIIIZpwXA-fuUgfxSNp6eUeKtDdaojZsbudEhSvyGhnOMmgRVV-1o43E0Eu7hc6T5-208LFvzuuuIKO3aHKPMMZw-cB9FAwBbpO6QPvhHX5ddw4vtetkLZnM5QtfZrhxPP8cC3AIKpxIFlQ; ndyr=1680886896; mrumetr=1680886896'];
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    return curl_exec($curl);
}

