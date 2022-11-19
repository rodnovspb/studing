<?php
require 'show.php';

$url = 'http://api.loc/index.php';

$res = json_decode(file_get_contents($url), 1);

show($res, 1);