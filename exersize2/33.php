<?php

class Car {
    protected static function func(){
        echo '!!!';
    }

    public function func1(){
        self::func();
    }
}

class Bmw extends Car {
    public static function func(){
        parent::func();
    }
}

Bmw::func();


