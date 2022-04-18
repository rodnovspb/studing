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
    public function exists($name){
        return isset($_COOKIE[$name]);
    }
}



$one = new CookieShell;
if($one->exists('counter')){
    $value = $one->get('counter');
    $one->set('counter', ++$value, 100000);
} else {
    $one->set('counter', 0, 100000);
}
echo $one->get('counter');