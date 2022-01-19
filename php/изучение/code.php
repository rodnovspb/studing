<?php




















function check($num){
    $n = str_split($num, 1);
    foreach ($n as $item){
        if($item%2===0){
            return false;
        }
    }
    return true;
}

var_dump(check(14));






















?>