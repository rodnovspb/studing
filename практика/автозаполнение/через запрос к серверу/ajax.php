<?php

$arr =  ['JavaScript', 'PHP', 'MySQL', 'SQL', 'PostgreSQL', 'HTML', 'CSS', 'HTML5', 'CSS3', 'JSON', 'Python'];


$str = $_REQUEST['text'];
$hint = '';

    $str = json_decode(strtolower($str));
    $length = strlen($str);

    foreach ($arr as $item){
        if(str_starts_with(strtolower($item), $str)){
            if($hint === '') $hint .= "$item";
            else $hint .= ", $item";
        } else {
            $hint .= '';
        }
    }




exit(json_encode($hint === "" ? "нет предложения" : $hint));
