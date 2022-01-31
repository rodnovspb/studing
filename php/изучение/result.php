




<?php  for($i=1; $i<11; $i++){
    echo "<a href=\"?num=$i\">Передаем $i</a><br>";
}

    if(isset($_GET['num'])) echo "<p>$_GET[num]</p>"

?>