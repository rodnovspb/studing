<?php
$res = 'Ошибка при загрузке файла';
if(!empty($_FILES['file']) and isset($_FILES['file'])){
    if($_FILES['file']['error']===1) $res = 'Превышен размер файла';
    if($_FILES['file']['error']===2) $res = 'Превышен размер файла';
    if($_FILES['file']['error']===3) $res = 'Файл получен частично';
    if($_FILES['file']['error']===4) $res = 'Файл не был загружен';
    if($_FILES['file']['error']===6) $res = 'Отсутствует временная папка';
    if($_FILES['file']['error']===7) $res = 'Не удалось записать файл';
    if($_FILES['file']['error']===0) $res = 'Файл успешно загружен';
    $result = move_uploaded_file($_FILES['file']['tmp_name'], __DIR__."/".$_FILES['file']['name']);
    $result = $result ? 'Файл успешно помещен в директорию: '.__DIR__."/".$_FILES['file']['name'] : 'Файл не сохранен на сервере';
    $response = [$res, $result];
        exit(json_encode($response));
}