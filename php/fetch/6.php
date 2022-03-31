<?php

//хоть и отправляем методом post, но файл проверяется через массив $_files
if(!empty($_FILES['file'])){
    $res = $_FILES['file'];
    exit(json_encode($res));
}

