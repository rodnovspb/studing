<?php

class User{
    private $name=1;
    private $age=2;
    function __get($var)
    {
        return $this->$var;
    }
}

$one = new User;
echo $one->ag2e;