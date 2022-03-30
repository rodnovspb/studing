<?php

$list = [];

if(file_exists('users.txt')){
    $list = json_decode(file_get_contents('users.txt'), true);
}


exit(json_encode($list));