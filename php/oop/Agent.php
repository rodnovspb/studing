<?php

class Agent {
    private $name;
    public function setName($var){
        $this->name=$var;
    }
    public function getName(){
        return $this->name;
    }
}