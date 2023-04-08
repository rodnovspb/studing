<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Referer: https://javascript.ru/',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
    'cookie: _ga=GA1.2.384234155.1662157442; _ym_uid=1662157442977818928; _ym_d=1662157442; vblastvisit=1680658682; vblastactivity=0; cf_clearance=hQmXcIFVoJ1wXUs3qQKJ5Z107_KiDAL6kFb0lzDQfEs-1680799285-0-160; vbsessionhash=69dd05477d9b7d6e68fd1f471b472326',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://javascript.ru'
    
];

$url = 'https://javascript.ru/forum/register.php';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$html = curl_exec($curl);

$document = new Document($html);



$imgSrc = $url . '/' . $document->first('#imagereg')->src;
$imgHash = $document->first('#imagehash')->value;


$curl = curl_init($imgSrc);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($curl);

file_put_contents('cap.jpg', $data);

$keyRucaptcha = '090cf340b43935740f22863d01dbf2c2';

$solver = new \TwoCaptcha\TwoCaptcha($keyRucaptcha);

$result = $solver->normal('cap.jpg')->code;

$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Referer: https://javascript.ru/forum/register.php',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
    
    'origin: https://javascript.ru',
    'content-type: application/x-www-form-urlencoded',
    'sec-ch-ua: "Google Chrome";v="111", "Not(A:Brand";v="8", "Chromium";v="111"'
];

$data = [
    's' => '',
    'do' => 'addmember',
    'url' => 'index.php',
    'agree' => '1',
    'password_md5' => '78b9f228e5a12506fef1cbba45a36841',
    'passwordconfirm_md5' => '78b9f228e5a12506fef1cbba45a36841',
    'day' => '0',
    'month' => '0',
    'year' => '0',
    'username' => 'cined-skynet11124',
    'password' => '',
    'passwordconfirm' => '',
    'email' => 'rodnovspb@mail.ru',
    'emailconfirm' => 'rodnovspb@mail.ru',
    'imagestamp' => $result,
    'imagehash' => $imgHash,
    'timezoneoffset' => '3',
    'dst' => '2',
];

$curl = curl_init('https://javascript.ru/forum/register.php?do=addmember');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_VERBOSE, true);
curl_setopt($curl, CURLOPT_STDERR, fopen('./curl.log', 'w+'));
curl_exec($curl);

show($result, 1);










