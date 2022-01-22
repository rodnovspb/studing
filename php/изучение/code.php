<?php




checkNum(6);


function checkNum($num){
    $sum = array_sum(getDivisors($num));
    $a = $num===$sum ? 'perfect': 'umperfect';
    echo $a;
}

function getDivisors($num){
    $arr = [];
    for($i=1; $i<$num; $i++){
        if($num % $i === 0){
            $arr[]=$i;
        }
    }
    return $arr;
}








































?>