

<?php

function getFile($name){
  ob_start();
  include $name;

  return ob_get_clean();
}

$res = getFile('text.php');

echo 'index'.$res;






?>