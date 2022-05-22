<?php
// создаем класс для своей ошибки
class MyError extends Exception {};


try{
    //Здесь выполняем что-то и если результат не устраивает, то пробрасываем ошибку,
    //код сразу переходит к catch
throw new Exception(' Перехваченная через try ошибка');

    // Если надо пробрасываем свою ошибку
throw new MyError('Текст ошибки', 111);
}
catch (MyError $e){
    $mess = $e->getMessage();
    $line = $e->getLine();
    $file = $e->getFile();
    $code = $e->getCode();
    $date = date("H-i-s d-m-Y");
    $error = "Сообщение: $mess, строка: $line, файл: $file, код: $code, время: $date \n";
    error_log($error, 3, 'exceptionLog.log');
}
catch (Exception $e){
    $message = $e->getMessage();
    $line = $e->getLine();
    $file = $e->getFile();
    $code = $e->getCode();
    $date = date("H-i-s d-m-Y");
    $error = "Сообщение: $message, строка: $line, файл: $file, код: $code, время: $date \n";
    error_log($error, 3, 'exceptionLog.log');
}

// код продолжается, так как перехватили через try
echo '!!!!!!!!qqqqqqq';

//Функция для остальных неперехваченных через try ошибок, скрипт остановится
function handleUncaughtError($e){
//    echo "Что-то пошло не так";

    $message = "Неперехваченная ошибка в " . date("H-i-s d-m-Y");
    $message .= " в файле " . $e->getFile() . " на линии " . $e->getLine() . "
    , сообщение" . $e->getMessage() . "\n";

    error_log($message, 3, 'exceptionLog.log');
//    error_log($message, 1, 'rodnovspb@mail.ru');
}

set_exception_handler('handleUncaughtError');