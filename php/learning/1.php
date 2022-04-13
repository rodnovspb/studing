<?php

$str = "The rain in England falls mainly on the plains.";
$pattern = "/ain\b/";

preg_match_all($pattern, $str, $match);
echo "<pre>";
print_r($match);
echo "</pre>";

