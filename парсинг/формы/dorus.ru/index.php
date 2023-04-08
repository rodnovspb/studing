<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;


ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

//Запрашиваем страницу с формой и капчой

session_start();

$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Encoding: gzip, deflate',
    'Connection: keep-alive',
    'Content-type: application/x-www-form-urlencoded',
    'Cookie: userid=fc2c3a0b5c84c96726ea4aebb6ba23e2; PHPSESSID=3p0eav7u0elg1i4mu7nmaq1sm2; name=%u0414%u0435%u043D%u0438%u0441; city=2; email=rodnovspb@mail.ru; phone=; url=; skype=; id=15758407; password=4ezxy7yn',
    'Host: www.dorus.ru',
    'Pragma: no-cache',
    'Referer: http://www.dorus.ru/',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
];

$curl = curl_init('http://www.dorus.ru/add.html');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');

$html = curl_exec($curl);

$html = iconv('windows-1251', 'utf-8', $html);
$html = "\xEF\xBB\xBF" .  $html;


//Отправляем капчу на расшифровку

$document = new Document($html);
$src = $document->first('#captcha_picture')->src;

$curl = curl_init($src);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
$data = curl_exec($curl);
file_put_contents('cap.jpg', $data);

$keyRucaptcha = '090cf340b43935740f22863d01dbf2c2';
$solver = new \TwoCaptcha\TwoCaptcha($keyRucaptcha);
$result = $solver->normal('cap.jpg')->code;

$headers = [
        'Accept: */*',
        'Accept-Encoding: gzip, deflate',
        'Connection: keep-alive',
        'Content-type: application/x-www-form-urlencoded',
        'Cookie: userid=fc2c3a0b5c84c96726ea4aebb6ba23e2; PHPSESSID=3p0eav7u0elg1i4mu7nmaq1sm2; name=%u0414%u0435%u043D%u0438%u0441; city=2; email=rodnovspb@mail.ru; phone=; url=; skype=',
        'Host: www.dorus.ru',
        'Pragma: no-cache',
        'Referer: http://www.dorus.ru/add.html',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
        'Origin: http://www.dorus.ru',
];

$data = [
    'act' => 'newpost',
    'type' => '0',
    'category' => '167',
    'title' => 'Сделаю сайт, внедрю новые возможности в ваш сайт',
    'text' => 'Сделаю продающий сайт или изменю Ваш сайт. Домен, хостинг и полная настройка сайта. Счетчик посещаемости и высокая оптимизация. Форма обратной связи для приема заявок и звонков. Оптимизирую сайт под поисковые системы. Напишу скрипты, автоматизирую работу. ',
    'price' => '10000',
    'name' => 'Денис',
    'city' => '2',
    'email' => 'rodnovspb@mail.ru',
    'phone' => '',
    'url' => '',
    'skype' => '',
    'expire' => '91',
    'coords' => '',
    'captcha' => $result
    ];


$curl = curl_init('http://www.dorus.ru/action.php');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));


curl_exec($curl);


























$data = [
    'comment' => 'Спасибо за хороший материал'
];
















