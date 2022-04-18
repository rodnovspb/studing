<?php

class CookieShell {
    public function set($name, $value, $time){
        setcookie($name, $value, time()+$time);
        $_COOKIE[$name] = $value;
    }
    public function get($name){
        return $_COOKIE[$name];
    }
    public function del($name){
        setcookie($name, '', time());
        unset($_COOKIE[$name]);
    }
    static function exists($name){
        return isset($_COOKIE[$name]);
    }
}


$one = new CookieShell;
$one->set('aaa1', 222, 3600);
$one->del('aaa1');
var_dump($one->get('aaa1'));
