


<form action="" method="get">
  <input name="elem" placeholder="введите число">
  <button type="submit">Кнопка</button>
</form>

<?php if(isset($_GET['elem'])){
  $a = (int)($_GET['elem']);
	$sum = 1;
	for($i = 1; $i <= $a; $sum*=($i++));
 	echo "<p>$sum</p>";
} ?>