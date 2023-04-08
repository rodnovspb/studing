<?php
// Business logic

if(isset($route->settingId) AND $route->settingId > 0) {
    
    $resString = $data->loadSettingsTable($route->settingId);
    $setting = unserialize($resString);
    
    $_SESSION['current_setting'] = $setting;
    
    $setting['setting'] = TRUE;
} else {
    $setting['setting'] = FALSE;
}


// Load CSS
define ('CSS', $view->loadCSS());

// Load view
define ('BODY', $view->loadView('default', $setting));

// Load JS
define ('JSCRIPT', $view->loadJSfile('terminal.min').$view->loadJS());

