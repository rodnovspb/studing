<?php


$str = "<h1>Hello°ƒ #WorldÆØÅ!</h1>";

var_dump(filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));


