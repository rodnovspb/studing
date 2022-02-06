

<?php

function getFile ($name) {
  ob_start();
  include $name;
  return ob_get_clean();
}

$week = getFile('text.php');

echo $week;
echo $week;
echo $week;





?>