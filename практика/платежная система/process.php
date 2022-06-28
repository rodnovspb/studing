<?php

if(empty($_POST)){
    exit();
}


require_once __DIR__ . 'inc/db.php';

$key = 'wJuUtyVjxJRVD59p';
$ik_id = '62ba5fdb3dd015761a4ec816';
$dataSet = $_POST;

unset($dataSet['ik_sign']); // Delete string with signature from dataset
sortByKeyRecursive($dataSet); // Sort elements in array by var names in alphabet queue
$dataSet[] = $key; // Adding secret key at the end of the string
$signString = implodeRecursive(':', $dataSet); // Concatenation values using symbol ":"
$sign = base64_encode(hash('sha256', $signString, true)); // Get sha256 hash as binare view using generate string and code it in BASE64

$order = R::load('orders', (int)$dataSet['ik_pm_no']);
if(!$order) exit();

if($dataSet['ik_co_id'] != $ik_id || $dataSet['ik_inv_st'] != 'success' || $dataSet['ik_am'] != $order->price || $sign != $_POST['ik_sign']){
    exit();
}

$order->status = '1';
R::store($order);











function sortByKeyRecursive(array $array): array
{
    ksort($array, SORT_STRING);
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $array[$key] = sortByKeyRecursive($value);
        }
    }

    return $array;
}

function implodeRecursive(string $separator, array $array): string
{
    $result = '';
    foreach ($array as $item) {
        $result .= (is_array($item) ? implodeRecursive($separator, $item) : (string) $item) . $separator;
    }

    return substr($result, 0, -1 * strlen($separator));
}