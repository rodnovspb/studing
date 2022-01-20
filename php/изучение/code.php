<?php







$arr = [1,2,3,4,5,6,7];

function func ($arr){
    var_dump(array_shift($arr));
    var_dump($arr);
    if(count($arr)>0){
        func($arr);
    }
}
func($arr)












































?>