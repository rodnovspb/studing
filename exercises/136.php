<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
body {
    margin: 0;
}
.wrapper {
    display: flex;
    flex-direction: column;
    height: 100vh;

}
.header {
    background-color: #cccccc;
    flex-basis: 20%;
}
.main {
    background-color: #EEEEEE;
    flex-basis: 60%;
    padding: 15px;
}
.footer {
    background-color: #ded8d8;
    flex-basis: 20%;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

</style>
</head>
<body>
<?php
date_default_timezone_set('Europe/Moscow')
?>


<div class="wrapper">
    <div class="header">
        <?= date('H:i:s d.m.Y') ?>
    </div>
    <div class="main">
 <?php

 echo date('Y') . ' - Y<br>';
 echo date('d') . ' - d<br>';
 echo date('z') . ' - z<br>';
 echo date('D') . ' - D<br>';
 echo date('F') . ' - F<br>';
 echo date('m') . ' - m<br>';
 echo date('M') . ' - M<br>';
 echo date('y') . ' - y<br>';
 echo date('a') . ' - a<br>';
 echo date('g') . ' - g<br>';
 echo date('G') . ' - G<br>';
 echo date('h') . ' - h<br>';
 echo date('H') . ' - H<br>';
 echo date('i') . ' - i<br>';
 echo date('s') . ' - s<br><br>';

echo date('F')



 ?>





    </div>
    <div class="footer">
        <?= 'Все права защищены  &copy;&nbsp  2014 - ' . date('Y')?>
    </div>
</div>









<script>



</script>












</body>
</html>
