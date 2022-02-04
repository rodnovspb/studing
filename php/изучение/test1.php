


<?php

if(isset($_COOKIE['elem'])){
    setcookie("elem", '', time());
    unset($_COOKIE['elem']);
}

var_dump($_COOKIE['elem']);














?>