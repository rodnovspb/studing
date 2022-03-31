<?php

class Arr{
    private $numbers=[];
    public function add($num){
        $this->numbers[]=$num;
    }
    public function sum(){
        return array_sum($this->numbers);
    }
}

$one = new Arr;

echo $one->sum();