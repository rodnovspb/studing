<?php

$file = file_get_contents('1.html');

function setWebp($html){
    return preg_replace('#(image/slider/.+)\.jpg#', '$1.webp', $html);
}

echo setWebp($file);