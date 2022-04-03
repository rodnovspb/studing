<?php

class Arr {
    private $nums=[];
    public $sumHelper;
    public $avgHelper;
    public function add($var){
        $this->nums[]=$var;
    }
    public function __construct()
    {
        $this->sumHelper=new SumHelper;
        $this->avgHelper = new AvgHelper;

    }
    public function getSum23(){
        $arr=$this->nums;
        return $this->sumHelper->getSum2($arr) + $this->sumHelper->getSum3($arr);
    }
    public function getNums(){
        return $this->nums;
    }
    public function getAvgMeanSum(){
        return $this->avgHelper->getAvg($this->getNums()) + $this->avgHelper->getMeanSquare($this->nums);
    }
}


class SumHelper {
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
class AvgHelper {
    private $getSquare;
    public function getAvg($arr){
        return array_sum($arr)/count($arr);
    }
    public function getMeanSquare($arr){
        return pow($this->getSquare->getSum2($arr)/count($arr), 1/2);
    }
    public function __construct()
    {
        $this->getSquare=new sumHelper;
    }

}

$one = new Arr;
$one->add(2);
$one->add(3);




echo "среднее арифметическое " . $one->avgHelper->getAvg($one->getNums());
echo "<br>";
echo "среднее квадратическое " . $one->avgHelper->getMeanSquare($one->getNums());
echo "<br>";
echo $one->getAvgMeanSum();

//Добавьте в класс Arr метод getAvgMeanSum, который будет находить сумму среднего арифметического и среднего квадратичного из массива $this->nums.


//квадратный корень, извлеченный из суммы квадратов элементов, деленной на количество)

//средквадр  (4+9)/2 = 7,5  => 2,54

//сред ариф 2,5
