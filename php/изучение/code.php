



<?php



$arr = array_diff(scandir('dir'), ['.', '..']);


foreach ($arr as $item){
 echo file_get_contents('dir/'.$item)."<br>";
}

















?>


















</body>
</html>


