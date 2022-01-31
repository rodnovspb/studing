


<form action="" method="get">
  <span>Мужской</span>
  <input type="radio" name="sex" value="1"><br>
  <span>Женский</span>
  <input type="radio" name="sex" value="2"><br>
  <input type="submit">
</form>

<?php
echo $_GET["sex"]."<br>";
$elem = $_GET["sex"];
$a =  $elem==1 ? 'Мужской' : ($elem=='2' ? "Женский" : 'Не выбран');
echo $a;
?>