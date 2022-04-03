<?php
function compare($obj1, $obj2){
    return $obj1 == $obj2;
}
function compareExact($obj1, $obj2){
    return $obj1 === $obj2;
}

function compareAll($obj1, $obj2){
    if($obj1 === $obj2) return 1;
    elseif ($obj1 == $obj2) return 0;
    else return -1;
}

class User {
    public $name;
    public $age;
    public function __construct($name, $age)
    {
        $this->name=$name;
        $this->age=$age;
    }
}

$one = new User('Den', 35);
$two = new User('Den', 35);
$three = $two;

echo compareAll($three, $two);
