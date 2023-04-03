<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);



//Вход--------------------------------------------------------------------------------------------------------
$curl = curl_init('https://xdan.ru/login');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);

$document = new Document($html);

$inp = $document->first('fieldset')->child(11)->name;

$curl = curl_init('https://xdan.ru/login?task=user.login');
$post = [
         'username'=>'cined',
         'password'=>'111111',
         'return'=>'',
         $inp => '1'];
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
curl_exec($curl);



//Решение капчи-------------------------------------------------------------------------------------------
$page = 'https://xdan.ru/multi-threaded-parsers.html';
$curl = curl_init($page);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);

$document = new Document($html);
$k = $document->first('#dynamic_recaptcha_1')->attr('data-sitekey');

$keyRucaptcha = '090cf340b43935740f22863d01dbf2c2';

$solver = new \TwoCaptcha\TwoCaptcha($keyRucaptcha);

$result = $solver->recaptcha([
    'sitekey' => $k,
    'url'     => $page,
])->code;


//Отправка комментария-------------------------------------------------------------------------------------------

$data = ['comment' => 'Спасибо за материал'];

$curl = curl_init($page);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,  'cookie.txt');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_exec($curl);

?>



































$data = [
    'comment' => 'Спасибо за хороший материал'
];
















