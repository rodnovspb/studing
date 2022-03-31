<?php

require_once 'User.php';
require_once 'Agent.php';

$one = new User('Den', 35);
var_dump($one->get());

echo "<br>";

$two = new Agent;
$two->setName('Alex');
echo $two->getName();