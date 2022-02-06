



<?php


$files = array_diff(scandir("dir"), ['.', '..']);

$arr = [];

foreach ($files as $file){
  $arr[] = $file;
}

$files = array_slice($files, 0);


for($i=0; $i<count($files); $i++){
  rename('dir/'.$files[$i], 'dir/'.$i.'-'.date("H-i-s", time()).".txt");
}















?>


















</body>
</html>


