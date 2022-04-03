<?php

class Arr {
    private $nums=[];
    private $sumHelper;
    public function add($var){
        $this->nums[]=$var;
    }
    public function __construct()
    {
        $this->sumHelper=new sumHelper;
    }
    public function getSum23(){
        $arr=$this->nums;
        return $this->sumHelper->getSum2($arr) + $this->sumHelper->getSum3($arr);
    }
    public function getNums(){
        return $this->nums;
    }
}

class sumHelper {
    public function getSum2($arr){
        return $this->getSum($arr, 2);
    }
    public function getSum3($arr){
        return $this->getSum($arr, 3);
    }
    private function getSum($arr, $pow){
        $sum=0;
        foreach ($arr as $elem){
            $sum+=$elem**$pow;
        }
        return $sum;
    }
}

$one = new Arr;
$one->add(2);
$one->add(3);
$one->add(4);
echo $one->getSum23();