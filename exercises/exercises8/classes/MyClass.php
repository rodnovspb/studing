<?php


class MyClass
{
    public static $container;
    
    public static function loadContainer(){
        if(is_null(self::$container)){
            self::$container = 11111111111;
        }
    }
    
    public static function show(){
        self::loadContainer();
        return self::$container;
    }
    
}