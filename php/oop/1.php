<?php


class Numbers{
    private $nums=[];
    public function __construct($arr)
    {
        $this->nums=$arr;
    }
    public function add($num){
        $this->nums[]=$num;
    }
    public function getSum(){
        return array_sum($this->nums);
    }
}

echo (new Numbers([1,2,3,4,5]))->getSum()+(new Numbers([7,6,4,8]))->getSum();

