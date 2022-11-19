<?php
require 'show.php';

show(json_decode(file_get_contents('http://api.loc'), 1), 1);



