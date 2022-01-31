


<form action="" method="get">
  <span>Мужской</span>
  <input type="radio" name="sex" value="1"><br>
  <span>Женский</span>
  <input type="radio" name="sex" value="2"><br>
  <input type="submit">
</form>

<?php
  if($_GET['sex']==1) echo 'Мужской';
  elseif($_GET['sex']==2) echo 'Женский';
  else echo 'Выберите пол';

 ?>