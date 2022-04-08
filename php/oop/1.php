<?php

class User
{
    private $name;
    private $age;

    function __get($var){
        return $this->$var;
    }

    function __set($var, $value)
    {
        if($value != '' and $var == 'name'){
            $this->$var = $value;
        }
        if($value >=0 and $value <= 70 and $var = 'age'){
            $this->$var = $value;
        }
    }
}

$one = new User;
$one->age = 55;
echo $one->age;


