<?php




$arr = range(1, 999999);

function findHappyTickets($num){
    $firstHalf = str_split(substr($num, 0, 3));
    $secondHalf = str_split(substr($num, 3, 3));
    return array_sum($firstHalf)===array_sum($secondHalf);
}

foreach ($arr as $item){
    if(findHappyTickets($item) and strlen($item)===6){
        echo $item."<br>";
    }
}




































?>