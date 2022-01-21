<?php




function findSumDivisors ($num) {
    $sum=0;
    for($i=1; $i<$num; $i++){
        if($num % $i === 0) {
            $sum+=$i;
        }
    }
    return $sum;
}

function checkFriendlyNum ($num1, $num2){
    return (findSumDivisors($num1) === $num2 and findSumDivisors($num2) === $num1);
}

var_dump(checkFriendlyNum(220, 284));

















































?>