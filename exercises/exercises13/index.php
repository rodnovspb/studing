<?php

require_once 'show.php';

$arr1 = [1, 2, 3, 4, 5];

$arr2 = &$arr1;

$arr2[0] = 0;

show($arr1);
