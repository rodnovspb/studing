

<form action="" method="get">
  <input name="year" placeholder="год" value="<?= $_GET["year"] ?? date('Y', time()) ?>"><br>
  <input name="month" placeholder="месяц" value="<?= $_GET["month"] ?? date('n', time()) ?>"><br>
  <input name="day" placeholder="день" value="<?= $_GET["day"] ?? date('d', time()) ?>"><br>
  <input type="submit">
</form>

<?php

if(!empty($_GET)){
  $year = $_GET["year"];
  $month = $_GET["month"];
  $day = $_GET["day"];
  $newYear = mktime(12, 59, 59, 12, 31, date("Y", time()));
  $now = mktime(0,0,0, $month, $day, $year);
  echo floor(($newYear-$now)/60/60/24) . ' суток до Нового года';

}


?>
