<?php
session_start();
mb_internal_encoding('UTF-8');
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
error_reporting (E_ALL);

define ('PROJECT', __DIR__);

require_once './classes/Launch.php';