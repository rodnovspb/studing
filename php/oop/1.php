<?php


class User {
    public $age;
    public function setAge($num){
       if($this->isAgeCorrect($num)) $this->age=$num;
    }
    public function addAge($num){
        if($this->isAgeCorrect($num)) $this->age=$num;
    }
    public function isAgeCorrect($age){
        return ($age>18 and $age<60);
    }
}

$one = new User;

$one->addAge(61);
echo $one->age;

