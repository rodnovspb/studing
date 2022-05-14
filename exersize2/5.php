<?php
$file='hhhhh/dddd/rrrr/yyy.txt';
preg_match_all('~.*?\/~is', $file, $a);

echo '<pre>';
print_r($a);
echo '</pre>';


foreach ($a[0] as $item){
    $b=explode('/', "$item");
    print_r($b);
}






