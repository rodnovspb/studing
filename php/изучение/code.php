<?php


$months = require_once 'week.php';

echo "<select>";
foreach ($months as $month){
    echo "<option>$month</option>";
}
echo "</select>";






?>