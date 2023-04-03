<form action="https://amdy.su/wp-comments-post.php" method="post">
    <textarea  name="comment" required=""></textarea>
    <input name="author" required="">
    <input  name="email"required="">
    <input  name="url">
    <input  name="wp-comment-cookies-consent" value="yes">
    <input name="submit" type="submit" value="Отправить комментарий">
    <input type="hidden" name="comment_post_ID" value="687">
    <input type="hidden" name="comment_parent"  value="0">
    <input type="hidden" name="akismet_comment_nonce" value="5033b82c4f">
    <input type="hidden" name="ak_js" value="1680534066716">
</form>



<?php

$curl = curl_init('https://amdy.su/2016/03/25/%d0%bd%d0%b5%d0%b4%d0%be%d1%81%d1%82%d0%b0%d1%82%d0%ba%d0%b8-laravel/');
$data = [
        'comment'=>'Спасибо',
        'author'=>'Денис',
        'email'=>'rodnovspb@mail.ru',
        'wp-comment-cookies-consent'=>'yes',
        'submit'=>'Отправить комментарий',
        'comment_post_ID'=>'687',
        'comment_parent'=>'0',
        'akismet_comment_nonce'=>'5033b82c4f5033b82c4f',
        'ak_js'=>'1680534066716',
        
        
];
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
curl_setopt($curl, CURLOPT_HEADER, false);
curl_exec($curl);









?>
<!--k=6Lcno_MUAAAAAOggmDaS8g0Ad-n4T1Dccp4jPZnV&-->
<!---->
<!--key=090cf340b43935740f22863d01dbf2c2-->
<!---->
<!--http://rucaptcha.com/in.php?key=090cf340b43935740f22863d01dbf2c2&method=userrecaptcha&googlekey=6Lcno_MUAAAAAOggmDaS8g0Ad-n4T1Dccp4jPZnV&&pageurl=https://amdy.su/2016/03/25/%d0%bd%d0%b5%d0%b4%d0%be%d1%81%d1%82%d0%b0%d1%82%d0%ba%d0%b8-laravel/-->
<!---->
<!---->
<!--http://rucaptcha.com/res.php?key=090cf340b43935740f22863d01dbf2c2&action=get&id=51672011147-->