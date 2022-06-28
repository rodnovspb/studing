<?php

session_start();

$data = [
    'name' => '',
    'email' => '',
    'product' => '',
    'price' => '',
];

if(!empty($_POST)){
   require_once 'db.php';
   $data = load($data);
   $order_id = save('orders', $data);
   setPaymentData($order_id);
}

function setPaymentData($order_id){
    if(isset($_SESSION['payment'])) unset($_SESSION['payment']);
    $_SESSION['payment']['id'] = $order_id;
    $_SESSION['payment']['price'] = $_POST['price'];
    header('Location: form.php');
    die();
}

function load($data){
    foreach ($_POST as $key => $value){
        if(array_key_exists($key, $data)){
            $data[$key] = $value;
        }
    }
    return $data;
}


function save($table, $data){
    $tbl = R::dispense($table);
    foreach ($data as $k => $v){
        $tbl->$k = $v;
    }
    return R::store($tbl);
}


function show($arr){
    echo "<pre><p style='background-color: beige; 
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid'>";
    print_r($arr);
    echo "</p></pre>";
}