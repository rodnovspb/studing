<?php

$startTime = microtime(true);
$startMemory = memory_get_usage();
$arr = [];
for ($i=0; $i < 10000000; $i++){
    $arr[] = $i;
}

$time = microtime(true) - $startTime;
$memory = memory_get_usage() - $startMemory;

file_put_contents(__DIR__ . '/time.txt', $time . PHP_EOL, FILE_APPEND);
file_put_contents(__DIR__ . '/memory.txt', $memory . PHP_EOL, FILE_APPEND);
file_put_contents(__DIR__ . '/peak.txt', memory_get_peak_usage() . PHP_EOL, FILE_APPEND);




