<?php
session_start();

$email = $_POST['email'];
$message = $_POST['message'];
$error = [];

if(trim($email) == ''){
    $error[] = 'Введите почту';
}
if (trim($message) == ''){
    $error[] = 'Введите сообщение';
}
if (strlen(trim($message)) < 10){
    $error[] = 'Сообщение дб больше 10 символов';
}

if($error != ''){
    $_SESSION['error'] = $error;
}

$subject = "=?utf-8?B?" . base64_encode("Тестовое письмо") . "?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n";

mail('rodnovspb@mail.ru', $subject, $message, $headers);

header('Location: /about.php');

?>
