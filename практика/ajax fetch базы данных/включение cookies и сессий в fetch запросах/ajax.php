<?php
session_start();

if(!isset($_SESSION['login']) and isset($_POST['login'])){
    $_SESSION['login'] = $_POST['login'];
    exit(json_encode("Вы зашли первый раз, ваш логин {$_SESSION['login']}"));
} elseif (isset($_SESSION['login'])){
    exit(json_encode("Вы уже авторизованы, ваш логин {$_SESSION['login']}"));
}


