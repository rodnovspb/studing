<?php


$confirmation_token = 'b5547f9a';
function vk_msg_send($peer_id,$text){
    $request_params = array(
        'message' => $text,
        'peer_id' => $peer_id,
        'access_token' => "9063aad1797542f5c17d6ab240e07de63ad8184420f3bef4c545e8764c1923d425a2dfd0a3d8624eb54d6",
        'v' => '5.87'
    );
    $get_params = http_build_query($request_params);
    file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}
$data = json_decode(file_get_contents('php://input'));
switch ($data->type) {
    case 'confirmation':
        echo $confirmation_token;
        break;

    case 'message_new':
        $message_text = $data -> object -> text;
        $chat_id = $data -> object -> peer_id;
        if ($message_text == "привет" || $message_text == "Привет"){
            vk_msg_send($chat_id, "Привет, я бот, который говорит две фразы.");
        }
        if ($message_text == "Время"){
            $time = date("H:i:s");
            vk_msg_send($chat_id, $time);
        }
        if (true){
            $text = str_repeat('!', 99);
            vk_msg_send($chat_id, $text);
        }
        echo 'ok';
        break;
}