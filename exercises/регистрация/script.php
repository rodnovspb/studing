<?php
require 'bootstrap.php';

$result = ['errors' => [], 'organizations' => []];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $handler = new RegistrationHandler();
    $data = array_map('strip_tags', $_POST);

    $errors = $handler->validate($data);

    if (count($errors) > 0) {
        $result["errors"] = $errors;
    } else {
        $newOrganization = $handler->saveData($data);
        if(!$newOrganization){
            $result["errors"][] = 'Ошибка сохранения организации';
        }
    }
}

$organizations = Organization::all();
$result["organizations"] = $organizations;

exit(json_encode($result));




