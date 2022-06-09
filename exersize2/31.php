<?php

$_SESSION['flash'] = 5;

if(isset($_SESSION['flash'])){
    echo $_SESSION['flash'];
    $_SESSION['flash'] = "";
    unset($_SESSION['flash']);
}
echo $_SESSION['flash'];