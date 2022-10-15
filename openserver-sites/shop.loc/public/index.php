<?php



require_once dirname(__DIR__) . '/config/init.php';

new \wfm\App();

\wfm\App::$app->setProperty('Имя', 'Денис');


show(\wfm\App::$app->getProperties());


// начинать с класса обработки ошибок
