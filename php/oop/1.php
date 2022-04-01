<?php

class User{
    private $name;
    public function setName($var){
        $this->name=$var;
    }
    public function getName(){
        echo $this->name;
    }
}

class User1 extends User {

}

$one = new User1;
$one->setName('dasdsa');
$one->get();