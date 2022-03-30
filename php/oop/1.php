<?php


class User{
    public $name;
    public function __construct($var1, $var2){
        echo $var1+$var2;
    }
}

$one = new User(5,10);
