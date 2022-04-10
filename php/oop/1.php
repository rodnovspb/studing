<?php

class Tag {
    private $name;
    function __construct($name)
    {
        $this->name=$name;
    }
    public function open(){
        $name = $this->name;
        return "<$name>";
    }
    public function close(){
        $name = $this->name;
        return "</$name>";
    }
}

$header = new Tag('header');
echo $header->open();
echo 'header сайта';
echo $header->close();



