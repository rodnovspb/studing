<?php

class User {
    public $name='1';
    public $name1='2';
    public $name2;
    private $name3=5;
}

echo '<pre>';
print_r(get_class_vars(User));
echo '</pre>';