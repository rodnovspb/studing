<?php




















function getDivisors ($num) {
    $arr = [];
    for ($n=2; $n<$num; $n++){
        if($num%$n===0){
            $arr[] = $n;
        }
    }
    return $arr;
}


var_dump(getDivisors(24));





























?>