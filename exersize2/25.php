<?php


interface Inter0 {
    public function func0($a);
}

interface Inter extends Inter0 {
    public function func1();
}


class Cls {
    public $a;
}

class Car extends Cls implements Inter {
    public function func1()
    {
        echo $this->a;
    }

    public function func0($a)
    {
        $this->a = $a;
    }
}

