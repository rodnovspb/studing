<?php
// Business logic
$params = [
    'params' => [
        'HTTP' => CURLPROXY_HTTP,
        'SOCKS4' => CURLPROXY_SOCKS4,
        'SOCKS5' => CURLPROXY_SOCKS5,
    ],
];

// Load CSS
define ('CSS', $view->loadCSS());

// Load view
define ('BODY', $view->loadView('default', $params));

// Load JS
define ('JSCRIPT', $view->loadJS());