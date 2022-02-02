<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>


<form action="" method="get">
  <input name="date" type="date">
  <input type="submit">
</form>

<?php

$arr = [
	'Весы' => 'Все хорошо',
	'Дева' => 'Все плохо',
	'Рак' => 'Отлично',
	'Лев' => 'Хорошо'
];



if(!empty($_GET)){
  $date = explode('-', $_GET['date']);
  $day = $date[2];
  $month = $date[1];

  if($month>='01' and $month<'04') echo $arr["Весы"];
  elseif ($month>='04' and $month<'06') echo $arr["Дева"];
  elseif ($month>='06' and $month<'09') echo $arr["Рак"];
  elseif ($month>='09' and $month<'13') echo $arr["Лев"];
}



?>






















</body>
</html>


