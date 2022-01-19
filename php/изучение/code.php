<?php















function getDivisiors($num){
    $arr=[];
    for($i=2; $i<$num; $i++){
        if($num%$i===0){
            $arr[]=$i;
        }
    }
    return $arr;
};

function findMean($arr){
    if(!empty($arr)){
    return array_sum($arr)/count($arr);
 }
};

echo findMean(getDivisiors(4))























?>