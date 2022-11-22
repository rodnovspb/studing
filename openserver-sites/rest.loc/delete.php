<?php
$id = $match[1];

$query  = "DELETE FROM `goods` WHERE id = $id";
mysqli_query($link, $query) or die(mysqli_error($link));
header('Location: /goods');
exit();


?>
