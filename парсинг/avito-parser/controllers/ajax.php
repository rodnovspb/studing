<?php
// AJAX MAIN

$actions = [
    // COMMON AJAX ACTIONS
    'loadNewButton' => 'common_ajax',
    // CRUD PROXY
    'loadProxyTable' => 'crud_proxy',
    'insertProxyTable' => 'crud_proxy',
    'deleteProxyTable' => 'crud_proxy',
    // CRUD SETTINGS
    'loadSettingsTable' => 'crud_settings',
    'insertSettingsTable' => 'crud_settings',
    'deleteSettingsTable' => 'crud_settings',
    'getForEditSettingsTable' => 'crud_settings',
    'editSettingsTable' => 'crud_settings',
    // PARSE RUNNING
    'clearStatus' => 'running',
    'checkSetting' => 'running',
    'getSettingForParse' => 'running',
    'parseMainPage' => 'running',
    'getParseInnerPage' => 'running',
    'getParseResultExcel' => 'running'
    
];

$have_action = FALSE;
if(isset($actions[$route->action])) {
    $action_path = __DIR__.DS.'ajax'.DS.$actions[$route->action].'.php';
    if(file_exists($action_path)) {
        include ($action_path);
        $have_action = TRUE;
    } 
}

if(!$have_action) {
    die('Не верно выбран параметр запроса!');
}
?>