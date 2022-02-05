



<?php


$arr = array_diff(scandir('dir'), ['.', '..']);

foreach ($arr as $item){
  if(is_dir("dir/".$item)) echo "папка"."<br>";
  elseif (is_file("dir/".$item)) echo "файл"."<br>";
}
















?>


















</body>
</html>


