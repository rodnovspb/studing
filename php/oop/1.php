<?php

trait Trait1 {
    public $a = 2;
    public function met(){
        return 'trait';
    }
}

class Parent1 {
    public $a = 1;
    public function met(){
        return 'parclass';
    }
}

class Class1 extends Parent1 {
        use Trait1;
}

$one = new Class1;
echo $one->a;

