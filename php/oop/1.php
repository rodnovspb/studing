<?php

class User {
    protected $name='111';
}

class One extends User {
    public $two;
    public function setTwo(){
        $this->two=$this->name;
    }
}

$qwerty = new One;
$qwerty->setTwo();
echo $qwerty->two;
