<?php

require_once 'show.php';


$arr = [1, 2, 3, 4, 5];

function func(&$arr)
{
  $arr[0] = '!';
}

func($arr);
show($arr);

