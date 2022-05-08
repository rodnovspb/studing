<?php
define("USE_SESSION", true);
// 1. Генерируем код капчи
// 1.1. Устанавливаем символы, из которых будет составляться код капчи
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
// 1.2. Количество символов в капче
$length = 6;
$code = substr(str_shuffle($chars), 0, $length);
if(USE_SESSION){
    // 2a. Используем сессию
    session_start();
    $_SESSION['captcha'] = crypt($code, 'qwerty');
    session_write_close();
} else {
    // 2a. Используем куки (время действия 600 секунд)
    $value = crypt($code, 'qwerty');
    setcookie('captcha', $value, time()+600);
}

// 3. Генерируем изображение
// 3.1. Создаем новое изображение из файла
$image = imagecreatefrompng('bg.png');
// 3.2 Устанавливаем размер шрифта в пунктах
$size = 36;
// 3.3. Создаём цвет, который будет использоваться в изображении
$color = imagecolorallocate($image, 66, 182, 66);
// 3.4. Устанавливаем путь к шрифту.
//с путем к шрифту засада, работает только с абсолютным путем (возможно просто только папка латиницей) и имена папок
// только латиницей
$font = $_SERVER["DOCUMENT_ROOT"].'/tasks/w/oswald.ttf';
$angle = rand(-10, 10);
// 3.6. Устанавливаем координаты точки для первого символа текста
$x = 56;
$y = 64;
//var_dump($font);
// 3.7. Наносим текст на изображение
imagefttext($image, $size, $angle, $x, $y, $color, $font, $code);
header('Cache-Control: no-store, must-revalidate');
header('Expires: 0');
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);