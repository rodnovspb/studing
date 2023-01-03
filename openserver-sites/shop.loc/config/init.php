<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Необходима версия PHP >= 8');
}

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT.'/public');
define("APP", ROOT.'/app');
define("CORE", ROOT.'/vendor/wfm');
define("HELPERS", ROOT.'/vendor/wfm/helpers');
define("CACHE", ROOT.'/tmp/cache');
define("LOGS", ROOT.'/tmp/logs');
define("CONFIG", ROOT.'/config');
define("LAYOUT", 'shop');
define("PATH", 'http://shop.loc');
define("ADMIN", 'http://shop.loc/admin');
define("NO_IMAGE", 'public/uploads/no_image.jpg');

require_once ROOT.'/vendor/autoload.php';

function show($arr, $die=false){
    echo "<pre><p style='background-color: beige;
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid; font-size: 20px;'>";
    if(is_bool($arr)){
        if($arr == 'bool(true)') {
            print_r('true');
        }  elseif ($arr == 'bool(false)'){
            print_r('false');
        }  else {
            var_dump($arr);
        }
    } elseif($arr === '') {
        print_r('пустая строка ""');
    } elseif($arr === null) {
        print_r('null');
    } else {
        print_r($arr);
    }
    echo "</p></pre>";
    if($die) {
        die;
    }
}
