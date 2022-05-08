<?php
session_start();
$captcha = $_SESSION['captcha'];
unset($_SESSION['captcha']);
session_write_close();

//для куки
//$captcha = $_COOKIE['captcha'];
//unset($_COOKIE['captcha']);
//setcookie('captcha', '', time());

$result = ['success'=>false];
$code = $_POST['captcha'];

if(empty($code)){
    $result['errors'][] = ['captcha', 'Пожалуйста введите код!'];
} else {
    $code = crypt(trim($code), 'qwerty');
    $result['success'] = $code === $captcha;
    if(!$result['success']){
        $result['errors'][] = ['captcha', 'Введенный код не соответствует изображению!'];
    }
}

echo json_encode($result);