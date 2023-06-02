<?php
require_once 'Loader.php';

$obj = new Loader;

$obj->funcSuccess = function ($data){
    echo $data;
};

$obj->load('Текст');