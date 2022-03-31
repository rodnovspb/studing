<?php


class Numbers{
    private $nums=[];
    public function __construct($arr)
    {
        $this->nums=$arr;
    }
    public function add($num){
        $this->nums[]=$num;
        return $this;
    }
    public function getSum(){
        return array_sum($this->nums);
    }
    public function push($arr){
        $this->nums=array_merge($this->nums, $arr);
        return $this;
    }
}

$one=new Numbers([1,2,3]);

echo $one->add(7)->add(8)->push([4,5,8,6,7])->add(9)->getSum();
