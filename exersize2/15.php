<?php

$str = '^xx axx ^zz bkk @ss';

echo preg_replace('/[^^@\s][A-z]{2}/', '!', $str);