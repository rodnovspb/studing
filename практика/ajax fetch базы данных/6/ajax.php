<?php

if(isset($_POST['num1']) & isset($_POST['num2'])){
    exit(json_encode((int)($_POST['num1'])*(int)($_POST['num2'])));
}   else {
    exit('Введите два числа');
}





?>