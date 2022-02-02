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
  <input name="elem2">
  <input name="elem3">
  <input type="submit">
</form>

<?php

if($_GET['elem1'] !='' and $_GET['elem2'] !='' and $_GET['elem3'] !='') {

  $num1 = (int)($_GET['elem1']);
  $num2 = (int)($_GET['elem2']);
  $num3 = (int)($_GET['elem3']);

  $arr = [];
  array_push($arr, $num1 , $num2 , $num3);
  sort($arr);

  $maxSquare = $arr[2]**2;
  $averageSquare = $arr[1]**2;
  $minSquare = $arr[0]**2;

    $a = $maxSquare==($averageSquare+$minSquare) ? 'тройка': "не тройка";
	echo $a;
}
















 ?>











</body>
</html>


