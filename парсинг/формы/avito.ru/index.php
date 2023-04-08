<?php

require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);


$page = 'https://mail.ru/';

function get_curl($page){
    $curl = curl_init($page);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    echo curl_getinfo($curl)['http_code'];
    
    echo "\n\n HTTP Code: ";
    echo $httpcode;
    echo "\n\n";
    curl_close($curl);
    echo "<<<<<<<< End of the script! <<<<<<<<<\n";
    return curl_exec($curl);
}

echo get_curl($page);












