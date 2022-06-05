<?php


interface Car {
    const PI = 3.14;
    public function getPi();
}

class BMW implements Car {
    public function getPi()
    {
        echo self::PI;
    }
}

$obj = new BMW;
$obj->getPi();