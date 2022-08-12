<?php
// Просто чтобы посмотреть как работает кнопка
if(isset($_COOKIE['user']) && $_COOKIE['user'] == 'true'){
    setcookie('user', 'true', time() - 3600, '/');
} else {
    setcookie('user', 'true', time() + 3600, '/');
}


header('Location: /');
