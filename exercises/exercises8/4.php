<?php


$a = @file_get_contents('file.php') ?? 11111;

echo $a;

echo 2222;