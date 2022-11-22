<?php require 'show.php'?>


<?php

if(isset($_SERVER['HTTP-X-HTTP-METHOD'])){
    show($_SERVER['HTTP-X-HTTP-METHOD']);
}


?>