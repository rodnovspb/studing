<?php

const TOKEN = '5681045251:AAHbkoI4TJcgzn8CPo7vax6p_Ne4HPJ9SwU';

const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

while (true){
    if(isset($last_update)){
        $params = [
            'offset' => $last_update + 1
        ];
    } else {
        $params = [];
    }
    $updates = send_request('getUpdates', $params);
    
    if($updates->result){
        foreach ($updates->result as $update){
            $last_update = $update->update_id;
    
            send_request('sendMessage', [
                'chat_id' => $update->message->chat->id,
                'text' => "Привет, {$update->message->from->first_name}! Вы написали: {$update->message->text}",
            ]);
        }
    }
    sleep(3);
}


function send_request($method, $params = []){
    $url = BASE_URL . $method;
    if(!empty($params)){
        $url = BASE_URL . $method . "?" . http_build_query($params);
    }
    return json_decode(file_get_contents($url));
}



















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