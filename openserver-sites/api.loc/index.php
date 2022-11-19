<?php

require 'show.php';
header('Content-Type: application/json'); // укажем MIME

$arr = range($_GET['num1'], $_GET['num2']);

exit(json_encode($arr));

