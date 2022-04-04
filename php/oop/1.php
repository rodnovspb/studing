<?php

class Post {
    private $name;
    private $salary;
    public function __construct($name, $salary)
    {
        $this->name=$name;
        $this->salary=$salary;
    }
    public function getName1(){
        return $this->name;
    }
    public function getSalary(){
        return $this->salary;
    }
}

class Employee{
    public $name;
    public $surname;
    public $post;
    public function __construct($name, $surname, Post $var)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->post=$var;
    }
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setName($var){
        $this->name=$var;
    }
    public function setSurname($var){
        $this->surname=$var;
    }
    public function changePost(Post $var){
        $this->post=$var;
    }
}

$programmer = new Post('Программист', 4000);
$manager = new Post('Менеджер', 3000);
$driver = new Post('Водитель', 4500);

$man = new Employee('Den', 'Ronin', $programmer);
$man->changePost($manager);

echo $man->name;
echo "<br>";
echo $man->surname;
echo "<br>";
echo $man->post->getName1();
echo "<br>";
echo $man->post->getSalary();