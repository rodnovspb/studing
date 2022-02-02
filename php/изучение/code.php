<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>





<form action="" method="get">
  <textarea name="text"><?php if(!empty($_GET['text'])) echo $_GET['text'] ?></textarea><br>
  <input type="submit">
</form>

<?php
if(!empty($_GET['text'])) {
  $arr = str_split($_GET['text'], 1);
  $amountSymb = array_count_values($arr);
  $count = count($arr);
  $rez = [];

  foreach ($amountSymb as $key=>$value){
    $rez[$key] = round(($value / $count) * 100, 1)." процентов";
  }


  echo "<pre>";
  print_r($rez);
  echo "</pre>";


}


?>























</body>
</html>


