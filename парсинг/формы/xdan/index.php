<?php
require_once '../../show.php';


//$curl = curl_init('https://xdan.ru/login?task=user.login');
//$data = [
//    'username'=>'cined',
//    'password'=>'111111',
//    'remember'=>'yes',
//    'a464e7cbc108e1e1758e9e4211ee51b7' => '1'
//];
//curl_setopt($curl, CURLOPT_POST, 1);
//curl_setopt($curl, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
//curl_setopt($curl, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
//curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_exec($curl);
//curl_close($curl);
//echo 111;




$curl = curl_init('https://lenta.ru/');
curl_setopt($curl, CURLOPT_COOKIEFILE,   'cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR,   'cookie.txt');
curl_exec($curl);
curl_close($curl);




