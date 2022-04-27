<?php

if(isset($_GET['num1']) & isset($_GET['num2'])){
    exit(json_encode((int)($_GET['num1'])*(int)($_GET['num2'])));
}   else {
    exit('Введите два числа');
}





?>