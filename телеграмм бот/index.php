<?php

const TOKEN = '5681045251:AAHbkoI4TJcgzn8CPo7vax6p_Ne4HPJ9SwU';

const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

while (true){
    $url = BASE_URL . 'getUpdates';
    if(isset($last_update)){
        $params = [
            'offset' => $last_update + 1
        ];
        $url .= '?' . http_build_query($params);
    }
    $res = json_decode(file_get_contents($url));
    
//    send message
    if(!empty($res->result)){
        file_put_contents(__DIR__ . '/logs.txt', print_r($res, 1), FILE_APPEND);
    foreach ($res->result as $item){
        echo $item->message->text . PHP_EOL;
        $last_update = $item->update_id;
        $send_url = BASE_URL . 'sendMessage';
        $send_params = [
            'chat_id' => $item->message->chat->id,
            'text' => "Вы написали: {$item->message->text}",
        
        ];
        
        $send_url .= "?" . http_build_query($send_params);
        $send = json_decode(file_get_contents($send_url));
       
    }
}
    sleep(3);

}



//$url = BASE_URL . 'getUpdates';
//$send_url = BASE_URL . 'sendMessage';
//
//$res = json_decode(file_get_contents($url));
//
//if(!empty($res->result)){
//    foreach ($res->result as $item){
//        echo "{$item->message->text}<br><hr>";
//        $text = "Вы написали: {$item->message->text}";
//        $send_url = BASE_URL . 'sendMessage';
//        $send_url .= "?chat_id={$item->message->chat->id}&text={$text}";
//        $send = json_decode(file_get_contents($send_url));
//        show($send);
//    }
//}
//
//
//file_get_contents($send_url . "?chat_id=1894725120&text=Здрасьте");

















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