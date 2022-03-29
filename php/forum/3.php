<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$arr = ['name'=>$name, 'surname'=>$surname];
exit(json_encode($arr));

?>