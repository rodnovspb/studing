<?php


require_once 'show.php';

$num = 555;
$animal = 'обезьян';

$str = "%d %s сидят на дереве";

echo sprintf($str, $num, $animal);












$text = '<p>sadfsdfsdf</p><br><p>sadfsdfsdf</p>';

echo strip_tags($text);

function cut($str) : string {
    return mb_substr($str, 0, 30);
}

var_dump(function_exists('cut'));


