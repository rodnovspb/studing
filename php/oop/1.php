<?php

class Test {
    public static $prop='qwe';
    public $elem;
    public static function f(){
        echo self::$prop;
    }
}

$a = new Test;
$a::f();