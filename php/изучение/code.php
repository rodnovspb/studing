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

$a = range(1,3000);

for($i=0; $i<count($a); $i++){
    for($k=$i+1; $k<count($a); $k++){
        if(checkFriendlyNum ($a[$i], $a[$k])){
            echo $a[$i]." / ".$a[$k]."<br>";
        }
    }

}
















































?>