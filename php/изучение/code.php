


<form action="" method="get">
  <input name="elem1" placeholder="Имя" value="<?php
  if(isset($_GET["elem1"])) echo $_GET["elem1"] ?>">
  <input name="elem2" placeholder="Фамилия" value="<?php
  if(isset($_GET["elem2"])) echo $_GET["elem2"]
  ?>">
  <input type="submit">
</form>

<?php if(!empty($_GET)) echo   "Привет, $_GET[elem1] $_GET[elem2]"?>




