<?php

class Math {
    public static function getSum($var1, $var2){
        return $var1+$var2;
    }
    public static function getDoubleSum($var1, $var2){
        echo 2*self::getSum($var1, $var2);
    }
}

Math::getDoubleSum(1,2);