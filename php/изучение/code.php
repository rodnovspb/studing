<?php







$i = 1;

function func($num){
    echo $num;
    $num++;

    if ($num <= 10){
        func($num); // здесь функция вызывает сама себя
    }
}
func($i);












































?>