<?php


class Employee {
    public $name;
    public $age;
    public $salary;
}

$user1 = new Employee;
$user1->name='Den';
$user1->age=25;
$user1->salary=1000;

$user2 = new Employee;
$user2->name='Erich';
$user2->age=26;
$user2->salary=2000;

echo array_sum([$user1->age, $user2->age]);