

<form action="" method="get">
  <input name="year" value="<?= $_GET["year"] ??  date("Y", time()) ?>"><br>
  <input type="submit">
</form>

<?php
if(!empty($_GET)){
    $year = $_GET["year"];
    $a = date("L", mktime(0,0,0,1,1, $year));
    if($a==1){
      echo 'Високосный';
	}
    else {
      echo 'Не високосный';
	}
}



?>
