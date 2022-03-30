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
    public function subAge($num){
        if($this->isAgeCorrect($this->age-$num)) $this->age = $this->age-$num;
    }
}

$one = new User;

$one->addAge(59);
$one->subAge(20);
echo $one->age;

