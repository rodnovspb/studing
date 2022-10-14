<?php

use classes\A;

spl_autoload_register();

var_dump((new A())->sum()->sq()->a);