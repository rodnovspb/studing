<?php

class User {
    private $name;
    private $age;
    function __set($var, $value)
    {
        $arr = ["name", "age"];
        if(in_array($var, $arr)) {
            $this->$var = $value;
        }
    }
    function __get($name)
    {
        return $this->$name;
    }
}

$one = new User;
$one->name = 'Den';
echo $one->name;