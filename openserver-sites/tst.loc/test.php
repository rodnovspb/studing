<?php
require 'show.php';

$url = 'http://api.loc/index.php';

$res = file_get_contents($url);

show($res, 1);