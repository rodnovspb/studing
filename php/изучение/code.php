<?php





















function func($num){
    $i=1;
    while (true){
        $num = $num/=2;
        if($num<=10){
            return $i;
        }
        $i++;
    }


}

echo func(99);


































?>