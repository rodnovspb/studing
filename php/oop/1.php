<?php
class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

$user1 = new User('Den', 35);
$user2 = new User('Den', '35');
$user3 = $user1;

var_dump($user1==$user2);
