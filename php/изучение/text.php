<?php

$days = ['Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота' , 'Воскресенье' ];

?>

<form action="" method="get">
  <select name="elem">
	<?php foreach ($days as $day){
	  echo "<option>$day</option>";
	} ?>
  </select>


</form>
