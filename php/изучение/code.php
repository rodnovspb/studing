


<form action="" method="get">
  <input name="elem" placeholder="введите градусы">
  <button type="submit">Кнопка</button>
</form>

<?php if(isset($_GET['elem'])){
  $a = (int)($_GET['elem']);
	$far = $a * 1.8 + 32;
  echo "<p>$far по Фаренгейту</p>";

} ?>