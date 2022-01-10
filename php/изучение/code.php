<?php





$age = 19;

if($age >10 and $age <99) {
    $age = (string)$age;
    $sum = $age[0] + $age[1];
    if(strlen($sum)<2) echo 'сумма цифр однозначна';
    else echo 'двузначна';
} else echo 'меньше 10 или больше 99';

echo strlen((string)23);











?>
