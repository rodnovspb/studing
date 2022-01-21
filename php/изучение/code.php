<?php







$arr = [1, [2, 7, 8], [3, 4], [5, [6, 7]]];

function func($a){
    $length = count($a);
    for($i=0; $i<$length; $i++){
        if(is_array($a[$i])){
            $a[$i] = func($a[$i]);
        }
        else {
            $a[$i]=pow($a[$i], 2);
        }
    }

    return $a;
}


echo "<pre>";
print_r(func($arr));
echo "</pre>";



















































?>