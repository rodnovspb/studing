



<?php



$arr = array_diff(scandir('dir'), ['.', '..']);
$arr1 = [];
foreach ($arr as $item){
  $arr1[] = $item;
}

$arr = array_slice($arr1, 0);

for($i=0; $i<count($arr); $i++){
  $data = file_get_contents('dir/'.$arr[$i]);
  file_put_contents('dir/'.$arr[$i], $data."!");
}

foreach ($arr as $item){
  echo file_get_contents('dir/'.$item)."<br>";
}















?>


















</body>
</html>


