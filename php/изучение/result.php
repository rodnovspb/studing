




<?php if(isset($_GET['num'])) echo $_GET['num'];
        else {
            echo

"<a href=\"?num=1\">Передаем 1</a><br>
<a href=\"?num=2\">Передаем 2</a><br>
<a href=\"?num=3\">Передаем 3</a>";

        }

?>