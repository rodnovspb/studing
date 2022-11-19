<?php

require 'show.php';



if(isset($_GET['date']) && !empty($_GET['date'])){
    
    $date = date_create($_GET['date']);
    echo date_format($date, 'w');
    
} else {
    echo 'ошибка';
}


