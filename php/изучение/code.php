<?php

//function getSum($arr) {
//    $sum = array_shift($arr);
//
//    if (count($arr) !== 0) {
//        $sum += getSum($arr);
//    }
//
//    return $sum;
//}
//
//var_dump(getSum([1, 2, 3]));





$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

function func($arr){
    $sum = array_shift($arr);

    if(count($arr)>0){
        $sum += func($arr);
    }

    echo $sum."<br>";
    return $sum;
}

echo func($arr)






































?>