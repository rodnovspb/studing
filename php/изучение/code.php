<?php



















$str = '1 3 32 546 756 867';

$res = preg_replace_callback('/(\d+)/', function ($match){
    return $match[1]**2;
}, $str);

echo $res


















































?>