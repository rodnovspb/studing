<?php

class Car
{
    public static $value = 5;
    public static function set($a) {
        self::$value = $a;
    }
}

Car::set(111);

class Bmw extends Car {
    public static function func() {
        return parent::$value;
    }
}

echo Bmw::func();