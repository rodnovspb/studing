<?php



class User {
    public $name;
    public function setName($str){
        $this->name=$str;
    }
}

$one = new User;

$one->setName('Den');
echo $one->name;