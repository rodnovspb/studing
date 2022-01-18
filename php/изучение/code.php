<?php













$year = '2022';

$w = 5;
$d = 13;
$arr = [];

for($i = 1; $i<=12; $i++){
    $timestamp = strtotime($year.'-'.$i."-".$d);
    $day = date('w', $timestamp);
    if($day==$w){
        array_push($arr, date('d-m-Y', $timestamp));
    }

}

echo '<pre>';
print_r($arr);
echo '</pre>';




























?>