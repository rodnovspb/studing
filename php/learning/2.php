<?php

$str = 'dsaвd';


echo preg_match('/^([a-zA-Z]{1,30}|[а-яёА-ЯЁ]{1,30})$/u', $str);