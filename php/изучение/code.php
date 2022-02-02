<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>



<form action="" method="get">
  <select name="day">
	<?php for($i=1; $i<=31; $i++){
	  echo "<option>$i</option>";
	} ?>
  </select>
  <select name="month">
	<?php
	$arr = [1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь'];
	foreach ($arr as $key=>$value){
	  echo "<option value='$key'>$value</option>";
	}
	?>
  </select>
  <select name="year">
	<?php  for($i=1990; $i<=2025; $i++){
        echo "<option>$i</option>";
	}   ?>
  </select>
  <input type="submit">
</form>

<?php if(!empty($_GET)){
  $day = $_GET['day'];
  $month = $_GET['month'];
  $year = $_GET['year'];

  $date = date('w', mktime(0,0,0, $month, $day, $year));
  $week = ['Воскресенье', 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота'];
  echo $week[$date];

} ?>























</body>
</html>


