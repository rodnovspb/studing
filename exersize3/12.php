<?php

$arr = [
    'key1' => 11,
    'key2' => 'qweqwe',
    'key3' => null,
];

$arr1 = ['asd', 'fdgdfgdfg', 'asdfsdfgsdg'];

echo http_build_query($arr);
echo "<br>";
echo http_build_query($arr1);