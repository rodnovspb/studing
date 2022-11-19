<?php

require 'show.php';



if(!empty($_GET['num1']) && !empty($_GET['num2'])){
    echo rand($_GET['num1'], $_GET['num2']);
    
} else {
    echo 'ошибка';
}


