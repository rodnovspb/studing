


<form action="" method="get">
  <span>Выберите язык</span><br>
	<select name="lang">
	  <option value="1" <?= (!empty($_GET['lang']) and $_GET['lang']==1) ? 'selected': null ?>>Английский</option>
	  <option value="2" <?= (!empty($_GET['lang']) and $_GET['lang']==2) ? 'selected': null ?>>Русский</option>
	  <option value="3" <?= (!empty($_GET['lang']) and $_GET['lang']==3) ? 'selected': null ?>>Итальянский</option>
	</select>
  <input type="submit">
</form>

<?php if(!empty($_GET)) echo $_GET['lang']==1 ? "Английский" : ($_GET['lang']==2 ? "Русский" : "Итальянский");

  ?>