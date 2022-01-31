

<form action="" method="get">
  <input type="text" name="text" placeholder="Ваше имя?"><br>
  <input type="checkbox" name="flag"><br>
  <input type="submit">
</form>

<?php if(!empty($_GET))
  	if(isset($_GET["flag"])) echo "<p>Привет, $_GET[text]</p>";
	else echo "<p>Пока, $_GET[text]</p>";

  ?>