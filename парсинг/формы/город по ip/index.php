<?php

use function Symfony\Component\String\s;

require_once '../../show.php';
require_once '../../vendor/autoload.php';

$token = "3a3164b3b82f2d86aa1ff7625eef3eeb3ba4202e";
$secret = "8eefefbeddf3678c71d5d9d4749d617510d4cb32";
$dadata = new \Dadata\DadataClient($token, $secret);

$result = $dadata->iplocate("46.226.227.20");




function getClientIp() {
    $ip = '';
    $ipAll = []; // networks IP
    $ipSus = []; // suspected IP
    $serverVariables = [
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_X_COMING_FROM',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'HTTP_COMING_FROM',
        'HTTP_CLIENT_IP',
        'HTTP_FROM',
        'HTTP_VIA',
        'REMOTE_ADDR',
    ];
    foreach ($serverVariables as $serverVariable) {
        $value = '';
        if (isset($_SERVER[$serverVariable])) {
            $value = $_SERVER[$serverVariable];
        } elseif (getenv($serverVariable)) {
            $value = getenv($serverVariable);
        }
        if (!empty($value)) {
            $tmp = explode(',', $value);
            $ipSus[] = $tmp[0];
            $ipAll = array_merge($ipAll, $tmp);
        }
    }
    $ipSus = array_unique($ipSus);
    $ipAll = array_unique($ipAll);
    $ip = (sizeof($ipSus) > 0) ? $ipSus[0] : $ip;
    return [
        'ip' => $ip,
        'suspected' => $ipSus,
        'network' => $ipAll,
    ];
}

