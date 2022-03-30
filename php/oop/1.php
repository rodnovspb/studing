<?php



class User {
    public $name;
    public function show(){
        return $this->name;
    }
}

$one = new User;
$one->name='Den';
echo $one->show();