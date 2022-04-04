<?php

class User {
    public $name;
    public function __construct($name)
    {
        $this->name=$name;
    }
    public function getClass(){
        return get_class($this);
    }
}

$one = new User('dasd');
echo get_class($one);