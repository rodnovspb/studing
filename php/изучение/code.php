<?php







echo "<pre>";
print_r(getPrimeDivisors(853));
print_r(getDivisors(853));
echo "</pre>";






// Функция, которая находит массив простых делителей
function getPrimeDivisors($num){
    $arr = [];
    $div = getDivisors($num);
    foreach ($div as $item){
        if(isSimple($item)){
            $arr[] = $item;
        }
    }
    return $arr;
}

// Функция, которая находит массив делителей

function getDivisors($num){
    $arr = [];
    $arr1 = range(2, $num-1);
    foreach ($arr1 as $item){
        if($num % $item ===0){
            $arr[] = $item;
        }
    }
    return $arr;
}

// Функция, которая проверяет число на простоту
    function isSimple($num){
        for($i=2; $i<$num; $i++){
            if($num % $i ===0) return false;
        }
        return true;
    }























?>