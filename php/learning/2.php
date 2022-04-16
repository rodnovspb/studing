<?php

$str = '4dsa@dsadf.ru';

echo preg_match('/^[^ ]+@[^ ]+\.[^ ]{1,30}$/', $str);
