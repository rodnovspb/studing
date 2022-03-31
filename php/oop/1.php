<?php

class sumHelper{
    public function getSum1($arr){
        return $this->getSum($arr, 1);
    }
    public function getSum2($arr){
        return $this->getSum($arr, 2);
    }
    private function getSum($arr, $pow){
        $sum=0;
        foreach ($arr as $item){
            $sum+=pow($item, $pow);
        }
        return $sum;
    }
}

$one = new sumHelper;

echo $one->getSum2([2,3,4]);


