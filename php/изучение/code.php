<?php

$arr = [ 0   =>  'ноль',                                     10  =>  'десять',       100 =>  'сто',
    1   =>  'один',         11  =>  'одиннадцать',      20  =>  'двадцать',     200 =>  'двести',
    2   =>  'два',          12  =>  'двенадцать',       30  =>  'тридцать',     300 =>  'триста',
    3   =>  'три',          13  =>  'тринадцать',       40  =>  'сорок',        400 =>  'четыреста',
    4   =>  'четыре',       14  =>  'четырнадцать',     50  =>  'пятьдесят',    500 =>  'пятьсот',
    5   =>  'пять',         15  =>  'пятнадцать',       60  =>  'шестьдесят',   600 =>  'шестьсот',
    6   =>  'шесть',        16  =>  'шестнадцать',      70  =>  'семьдесят',    700 =>  'семьсот',
    7   =>  'семь',         17  =>  'семнадцать',       80  =>  'восемьдесят',   800 =>  'восемьсот',
    8   =>  'восемь',       18  =>  'восемнадцать',     90  =>  'девяносто',     900 =>  'девятьсот',
    9   =>  'девять',       19  =>  'девятнадцать'];

$num = 523;

function partNumber ($num){

    if(strlen($num)===3 and $num%10 !== 0){
        $first = $num - $num%100;
        $third = $num%10;
        $second = $num - $first - $third;
        return $first." ".$second." ".$third;
    }
    elseif(strlen($num)===3 and $num%10 == 0 and $num%100 == 0){
        $first = $num - $num%100;
        return (string)$first;
    }
    elseif(strlen($num)===3 and $num%10 == 0 and $num%100 !== 0){
        $first = $num - $num%100;
        $second = $num - $first;
        return $first." ".$second;
    }
    elseif(strlen($num)===2 and $num>=11 and $num<=19){
        return (string)$num;
    }
    elseif(strlen($num)===2 and $num%10 !== 0){
        $first = $num - $num%10;
        $second = $num - $first;
        return $first." ".$second;
    }
    elseif(strlen($num)===2 and $num%10 === 0){
        $first = $num - $num%10;
        return (string)$first;
    }
    elseif(strlen($num)===1)
        return (string)$num;
}


function NumToString ($num, $arrayForChange){
    $str = partNumber ($num);
    $str = strtr($str, $arrayForChange);
    $str = str_replace('ноль', '', $str);
    echo  $str;
}

NumToString(120, $arr);























?>