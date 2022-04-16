<?php

$str = 'google.com';


var_dump(filter_var($str, FILTER_VALIDATE_URL));

$a = 'asdasd@dfsdf.ru';

echo preg_match('/^\S+@\S+\.\S+$/', $a);