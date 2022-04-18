<?php
setcookie('test1', 111, time()+1000);
unset($_COOKIE['test1']);

var_dump($_COOKIE['test1']);