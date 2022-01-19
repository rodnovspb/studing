<?php




















function checkPositiv($arr){
    foreach ($arr as $item){
        if($item<0){
            return false;
        }
    }
    return true;
}



























?>