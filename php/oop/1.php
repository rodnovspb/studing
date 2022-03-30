<?php



class User {
    public $name;
    public $age;
    public function setAge($str){
        if($str>=18) $this->age=$str;
    }
}

$one = new User;

$one->age=25;
$one->setAge(17);

echo $one->age;