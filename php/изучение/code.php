<?php




















function check($arr){
    foreach ($arr as $item){
        if($item%2!==0){
            return false;
        }
    }
    return true;
}

var_dump(check([2,4,6]));
























?>