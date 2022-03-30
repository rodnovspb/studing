<?php


class User {
    public $name;
    public $age;
    public function addAge($num){
        if($this->isCorrect($num)) $this->age+=$num;
    }
    private function isCorrect($num){
        return $this->age+$num<60;
    }
}

$one = new User;
$one->age=20;
$one->addAge(40);
echo $one->age;
