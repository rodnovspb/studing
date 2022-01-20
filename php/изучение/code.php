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





$arr1 = [1,2,3,4,5,6];

function func($arr){
    $sum = array_shift($arr);
    if(count($arr)>0){
        $sum += func($arr);
    }
    return $sum;
}

echo func($arr1);








































?>