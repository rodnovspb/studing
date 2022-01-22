<?php




function commonDivisors($num1, $num2){
    $arr1 = getDivisors($num1);
    $arr2 = getDivisors($num2);
    return array_intersect($arr1, $arr2);
}

function getDivisors($num){
    $arr = [];
    for($i=1; $i<$num; $i++){
        if($num%$i===0){
            $arr[] = $i;
        }
    }
    return $arr;
}


echo "<pre>";
print_r(commonDivisors(33, 99));
echo "</pre>";

























?>