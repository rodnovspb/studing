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

class SessionShell {
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
    public function exists($name){
        return isset($_SESSION[$name]);
    }
    public function set($name, $value){
        $_SESSION[$name] = $value;
    }
    public function get($name){
        return $_SESSION[$name];
    }
    public function del($name){
        unset($_SESSION[$name]);
    }
    public function destroy(){
        if(isset($_SESSION)){
            session_destroy();
        }
    }
}

$session = new SessionShell;
$session->set('test', 1);
$session->destroy();

var_dump($_SESSION);

