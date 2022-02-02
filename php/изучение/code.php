<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>



<form action="" method="get">
  <input name="elem1">
  <input type="submit">
</form>

<?php

if(!empty($_GET)) {
  $arr = explode(".", $_GET['elem1']);
  $month = $arr[1];
  $day = $arr[0];
  $year = date('Y');

  $timestampBirth = mktime(23,59,59, $month, $day, $year);
  $timestampNow = time();
  if ($timestampBirth>$timestampNow) {
    $x = floor(($timestampBirth-$timestampNow)/60/60/24);
    echo "Осталось суток: $x";
  }
  else {
      $timestampBirth = mktime(23,59,59, $month, $day, $year+1);
      $x = floor(($timestampBirth-$timestampNow)/60/60/24);
      echo "Осталось суток: $x";
  }




}















 ?>











</body>
</html>


