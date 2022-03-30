<?php


class User {
    public $name;
    public $age;
}

$user1= new User;
$user1->name='Денис';
$user1->age=25;

$user2 = new User;
$user2->name='Вася';
$user2->age=35;

echo $user1->age + $user2->age;