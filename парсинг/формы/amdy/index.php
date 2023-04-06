<?php

require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);




$page = 'https://amdy.su/2021/08/23/cache/';

$curl = curl_init($page);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($curl);

$document = new Document($html);

$html = $document->text();

preg_match_all("#'sitekey\W*(\w+\S*)'#", $html, $match);

$keyRucaptcha = '090cf340b43935740f22863d01dbf2c2';

$solver = new \TwoCaptcha\TwoCaptcha($keyRucaptcha);

$result = $solver->recaptcha([
    'sitekey' => $match[1][0],
    'url'     => $page,
])->code;

$akismet_comment_nonce = $document->first('#akismet_comment_nonce')->value;
$comment_post_ID = $document->first('#comment_post_ID')->value;

$curl = curl_init('https://amdy.su/wp-comments-post.php');
$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Referer: https://amdy.su/2013/09/19/order-by-field-v-laravel/',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
];
$data = [
    'comment' => 'Спасибо за материал',
    'author' => 'Денис',
    'email' => 'rodnovspb@mail.ru',
    'wp-comment-cookies-consent' => 'yes',
    'submit' => 'Отправить комментарий',
    'comment_post_ID' => $comment_post_ID,
    'comment_parent' => '0',
    'akismet_comment_nonce' => $akismet_comment_nonce,
    'ak_js' => 1680805887140,
    'g-recaptcha-response' => $result
];
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

curl_exec($curl);

?>






