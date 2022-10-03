<?php

const TOKEN = '5681045251:AAHbkoI4TJcgzn8CPo7vax6p_Ne4HPJ9SwU';

const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

$url = BASE_URL . 'getUpdates?offset=96752917';

$send_url = BASE_URL . 'sendMessage?chat_id=1894725120&text=';

$res = json_decode(file_get_contents($url), 1);

$chat_id = $res['result'][0]['message']['chat']['id'];

show($chat_id);















function show($arr)
{
    echo "<pre><p style='background-color: beige;
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid'>";
    if (is_bool($arr)) {
        if ($arr == 'bool(true)') {
            print_r('true');
        } elseif ($arr == 'bool(false)') {
            print_r('false');
        } else {
            var_dump($arr);
        }
    } else {
        print_r($arr);
    }
    echo "</p></pre>";
}