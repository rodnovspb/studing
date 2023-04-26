<?php
if(isset($_POST)){
    $query = json_decode(file_get_contents('php://input'), true)['query'];
    $url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party';
    $token = '3a3164b3b82f2d86aa1ff7625eef3eeb3ba4202e';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
        "Authorization: Token $token"
    ));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(["query" => $query]));
    $result = curl_exec($curl);
    exit($result);
}


