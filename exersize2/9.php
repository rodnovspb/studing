<?php

$str = '-234234';

var_dump(filter_var($str, FILTER_VALIDATE_INT, [
    'options' => ['default' => 3, 'min_range' => 0],
    'flags' => FILTER_FLAG_ALLOW_OCTAL,
]));