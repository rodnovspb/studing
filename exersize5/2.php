<?php

$str = "qqqqqqqqqqq qqq qqqq";
echo preg_replace("#\s[a-z]{5,6}\s#", "!", $str);