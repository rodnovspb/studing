<?php

class Geometry {
    private static $pi = 3.14;
    public static function getSquare($radius){
        return self::$pi * $radius**2;
    }
    public static function getLength($radius){
        return self::$pi*2*$radius;
    }
    public static function getVolume($radius){
        return (1+1/3)*self::$pi*pow($radius, 3);
    }
}

echo Geometry::getVolume(1);