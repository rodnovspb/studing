<?php

$str = "The rain in England falls mainly on the plains.";
$pattern = "/a.+n/U";

preg_match($pattern, $str, $match);
echo "<pre>";
print_r($match);
echo "</pre>";

