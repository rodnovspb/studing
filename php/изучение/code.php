<?php







$arr = [1, [2, 7, 8], [3, 4, [5, [6, 7]]]];

function func($a){
    foreach ($a as $item){
        if(is_array($item)){
            func($item);
        }
        else {
            echo $item."<br>";
        }

    }
}

func($arr)



























































?>