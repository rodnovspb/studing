<?php

require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$page
    = 'https://amdy.su/2022/07/22/%d1%80%d0%b0%d0%b1%d0%be%d1%82%d0%b0-%d1%81-%d0%b2%d0%b5%d1%82%d0%ba%d0%b0%d0%bc%d0%b8-%d0%b8-pull-request/';

$keyRucaptcha = '090cf340b43935740f22863d01dbf2c2';

$solver = new \TwoCaptcha\TwoCaptcha($keyRucaptcha);

$result = $solver->recaptcha([
    'sitekey' => '6Lcno_MUAAAAAOggmDaS8g0Ad-n4T1Dccp4jPZnV',
    'url'     => $page,
])->code;




$curl = curl_init($page);
$data = [
    'comment' => 'Спасибо',
    'author' => 'Денис',
    'email' => 'rodnovspb@mail.ru',
    'wp-comment-cookies-consent' => 'yes',
    'submit' => 'Отправить комментарий',
    'comment_post_ID' => '823',
    'comment_parent' => '0',
    'akismet_comment_nonce' => '237062fa66',
    'ak_js' => '1680561730717',
    'g-recaptcha-response' => $result
];
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_exec($curl);

?>









<!--<form action="https://amdy.su/wp-comments-post.php" method="post">-->
<!--    <textarea  name="comment" required=""></textarea>-->
<!--    <input name="author" required="">-->
<!--    <input  name="email"required="">-->
<!--    <input  name="url">-->
<!--    <input  name="wp-comment-cookies-consent" value="yes">-->
<!--    <input name="submit" type="submit" value="Отправить комментарий">-->
<!--    <input type="hidden" name="comment_post_ID" value="687">-->
<!--    <input type="hidden" name="comment_parent"  value="0">-->
<!--    <input type="hidden" name="akismet_comment_nonce" value="5033b82c4f">-->
<!--    <input type="hidden" name="ak_js" value="1680534066716">-->
<!--</form>-->