<?php

$result = ['result'=>'success', 'error'=>[]];

$name=$mail='';

if(empty($_POST['name'])){
    $result['result'] = 'error';
    $result['error']['name'] = "Это поле не заполнено";
} else{
    $name = $_POST['name'];
    if(!preg_match('/^[a-zа-яё\s]+$/ui', $name)){
        $result['result'] = 'error';
        $result['error']['name'] = "Недопустимые символы";
    }
}

if(empty($_POST['mail'])){
    $result['result'] = 'error';
    $result['error']['mail'] = 'Это поле не заполнено';
} else {
    $mail = $_POST['mail'];
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $result['result'] = 'error';
        $result['error']['mail'] = 'Недопустимые символы';
    }
}


$data = [];
if(file_exists('users.txt')){
    $data = json_decode(file_get_contents('users.txt'), true);
}

if(array_key_exists($mail, $data)) {
    $result['result'] ='error';
    $result['error']['mail'] = 'Почта ранее зарегистрирована';
} else {
    $data[$mail] = $name;
}


if($result['result'] == 'success'){
    if(file_put_contents('users.txt', json_encode($data), LOCK_EX) == false){
        $result['result'] = 'error';
    }
}


exit(json_encode($result));