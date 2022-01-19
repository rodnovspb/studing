<?php




















function check($arr){
    for ($i=0; $i<count($arr); $i++){
        if($arr[$i]===$arr[$i++]){
            return true;
        }
    }
    return false;
}

var_dump(check([1,2,3,4,5,5,6,7]));






















?>