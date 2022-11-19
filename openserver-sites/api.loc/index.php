<?php

require 'show.php';



if(isset($_GET['num']) && !empty($_GET['num'])){
    echo rand(1, $_GET['num']);
} else {
    echo 'ошибка';
}


