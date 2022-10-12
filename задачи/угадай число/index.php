<?php

echo PHP_EOL . '================================='. PHP_EOL;
echo '========= Угадай число ==========' . PHP_EOL;
echo '================================='. PHP_EOL . PHP_EOL;


$number = rand(1, 100);

while (true){
    $userOption = readline('Какое число загадал компьютер? ');
    if($userOption == $number) {
        echo 'Вы выиграли';
        break;
    } else if($userOption < $number) {
        echo 'Число больше'. PHP_EOL;
    } else if($userOption > $number) {
        echo 'Число меньше'. PHP_EOL;
    }
    
}
