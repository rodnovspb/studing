<?php

$obj = [1=>'Денис', 2=>'Василий', 3=>'Мстислав'];

$id = isset($_GET['id']) ? (int)($_GET['id']): 0;

$response = $obj[$id];

exit(json_encode($response));