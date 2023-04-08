<?php
// Business logic
$proxies = $data->getCountProxies();

$outputDataList = [
    'Таблица Excel 2007' => 'xlsx2007',
];

// Load CSS
define ('CSS', $view->loadCSS());

// Load view
define ('BODY', $view->loadView('default', compact('proxies', 'outputDataList')));

// Load JS
define ('JSCRIPT', $view->loadJS());
