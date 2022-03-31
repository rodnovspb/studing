<?php
if(isset($_POST['name']) and !empty($_POST['name'])){
    $result['name'] = $_POST['name'];
}
else {
    $result['name'] = 'пришло пустое поле';
}

if(isset($_POST['textarea']) and !empty($_POST['textarea'])){
    $result['textarea'] = $_POST['textarea'];
}
else {
    $result['textarea'] = 'пришло пустое поле';
}

exit(json_encode($result));