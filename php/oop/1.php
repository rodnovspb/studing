<?php

class Student {
    private $name;
    private $course = 1;
    public function __construct($name)
    {
        $this->name=$name;
    }
    public function transfer(){
        $this->course++;
    }
}