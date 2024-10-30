<?php

require_once 'show.php';




$arr = [1, 2, 3, 4, 5];

foreach ($arr as &$elem) {
  $elem = $elem ** 2;
}


show($arr);