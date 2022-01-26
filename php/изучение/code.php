<?php



















$str = '2+3= 3+5= 7+8=';

$res = preg_replace_callback('#(\d+)\+(\d+)=#', function ($match){
    return $match[0].($match[1]+$match[2]);
//   echo "<pre>";
//   print_r($match);
//   echo "</pre>";
}, $str);

echo $res;




















































?>