

<form action="" method="get">
  <span>Английский</span>
  <input type="radio" name="lang" value="1" <?= (isset($_GET['lang']) and $_GET['lang']=='1') ? 'checked': '' ?>><br>
    <span>Русский</span>
  <input type="radio" name="lang" value="2" <?= (isset($_GET['lang']) and $_GET['lang']=='2') ? 'checked': '' ?>><br>
  <input type="submit">

</form>

<?php
  echo $_GET["lang"]==1 ? 'Английский': ($_GET["lang"]==2 ? 'Русский' : "Не выбран");
 ?>