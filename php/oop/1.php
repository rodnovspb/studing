<?php

class Test {
    private $prop1;
    private $prop2;
    function __set($name, $value)
    {
        $this->$name = $value;
    }
    function __get($name){
        return $this->$name;
    }
}

$one = new Test;
$one->prop4 = 'dsad';
echo $one->prop4;