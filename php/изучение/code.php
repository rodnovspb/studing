<?php







$arr = [1, 2, 3, [4, 5, [6, 7]], [8, [9, 10]]];


function func ($a){
    $sum=0;
    foreach ($a as $item){
        if(is_array($item)){
            $sum += func($item);
        }
        else {
            $sum += $item;
        }
    }
    return $sum;
}

echo func($arr)























































?>