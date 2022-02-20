<?php

session_start();
if($_SESSION['auth']== true) {
    $_SESSION['auth']=null;
    $_SESSION['flag']=false;
}
header('Location: login.php');

