<?php
$host = "localhost";
$user = 'cinedr_bot';
$pass = 'cined261475288@';
$name = 'cinedr_bot';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$types = [
    "Дон",
    "Дон Кихот",
    "Дюма",
    "Гюго",
    "Роб",
    "Робеспьер",
    "Гам",
    "Гамлет",
    "Макс",
    "Максим",
    "Горький",
    "Жук",
    "Жуков",
    "Есь",
    "Есенин",
    "Нап",
    "Наполеон",
    "Баль",
    "Бальзак",
    "Джек",
    "Джек Лондон",
    "Драй",
    "Драйзер",
    "Штир",
    "Штирлиц",
    "Дост",
    "Достоевский",
    "Гек",
    "Гексли",
    "Габен",
    "Царь во дворца",
];

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
        $from_id = $data -> object -> from_id;
        $chat_id = $data -> object -> peer_id;
        if ($message_text == "привет" || $message_text == "Привет"){
            vk_msg_send($chat_id, "Привет, я бот, который говорит две фразы.");
        }
        if ($message_text == "Время"){
            $time = date("H:i:s");
            vk_msg_send($chat_id, $time);
        }
        if(preg_match('/^(?:\/уст|\/установить) ([А-яё]{3,11})$/u', $message_text, $res)){
            if(in_array($res[1], $types)) {
                $type = $res[1];
                $query = "INSERT INTO socio SET
                      link = '$from_id',
                      type = '$res[1]'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                if($result == 1){
                    $text = "Установлен социотип $type";
                    vk_msg_send($chat_id, $text);
                }
     }  else {
                vk_msg_send($chat_id, "Введите, пожалуйста, правильный социотип!");
            }
}

        echo 'ok';
        break;

}

