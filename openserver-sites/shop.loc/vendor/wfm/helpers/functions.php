<?php

use wfm\App;
use wfm\Language;

function debug($data, $die = false){
    show($data);
    if($die) {
        die;
    }
    
}

function h($str) {
    return htmlspecialchars($str);
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url() {
    return PATH . '/' . (App::$app->getProperty('lang') ? App::$app->getProperty('lang') . '/' : '');
}

/**
   * @param string $key Key of GET array
   * @param string $type Key of 'i', 'f', 's'
   * @return float|int|string
 **/

function get($key, $type = 'i') {
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST array
 * @param string $type Key of 'i', 'f', 's'
 * @return float|int|string
 **/

function post($key, $type = 's') {
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function __($key) {
    echo Language::get($key);
}

function ___($key) {
    return Language::get($key);
}























