<?php




$arr[] = 'addr@mail.ru';    // +
$arr[] = 'addr123@mail.ru'; // +
$arr[] = 'my-addr@mail.ru'; // +
$arr[] = 'my_addr@mail.ru'; // +
$arr[] = 'addr@site.ru';    // +
$arr[] = 'addr.ru';         // -
$arr[] = 'addr@.ru';        // -
$arr[] = 'my@addr@mail.ru'; // -

$reg = "/^[\w-]+@[\w-]+\.(com|ru)$/";

foreach ($arr as $item){
    if(preg_match($reg, $item)){
        echo $item;
        echo "<br>";
    }
}




























































?>