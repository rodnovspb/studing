<?php //header('HTTP-X-HTTP-METHOD: PUT'); ?>
<?php $_SERVER['HTTP-X-HTTP-METHOD'] = 'DELETE' ?>

<?php require 'show.php'?>

<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" value="Отправить">
</form>

<?php

if(isset($_SERVER['HTTP-X-HTTP-METHOD'])){
    show($_SERVER['HTTP-X-HTTP-METHOD']);
}

?>

