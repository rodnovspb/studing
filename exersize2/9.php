<?php


$ip = "193.169.0.3";

var_dump(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));


