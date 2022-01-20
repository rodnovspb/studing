<?php







$arr = ['a', ['b', 'c', 'd'], ['e', 'f', ['g', ['j', 'k']]]];

function func($a){
    $str = '';
    foreach ($a as $item){
        if(is_array($item)){
            $str.=func($item);
        }
        else $str.=$item;
    }
    return $str;
}

echo func($arr)





















































?>