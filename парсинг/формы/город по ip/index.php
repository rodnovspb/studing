<?php

use function Symfony\Component\String\s;

require_once '../../show.php';
require_once '../../vendor/autoload.php';

$token = "3a3164b3b82f2d86aa1ff7625eef3eeb3ba4202e";
$secret = "8eefefbeddf3678c71d5d9d4749d617510d4cb32";
$dadata = new \Dadata\DadataClient($token, $secret);

$result = $dadata->iplocate("176.59.18.255")['value'];

show($result, 1);

?>







