

<?php
session_start();
if(!empty($_SESSION['user'])){
    echo "<ul>";
    foreach ($_SESSION['user'] as $item){
       echo "<li>$item</li>";
    }
    echo "</ul>";

}


?>