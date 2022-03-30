<?php


class User{
    private $age;
    public function setAge($num){
        if($this->isCorrectAge($num)){
            $this->age=$num;
        }
    }
    public function getAge(){
        return $this->age;
    }
    private function isCorrectAge($num){
        return $num>18 and $num<60;
    }
}

$one = new User;
$one->setAge(19);
echo $one->getAge();