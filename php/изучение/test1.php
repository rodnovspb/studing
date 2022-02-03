


<?php if(!empty($_GET)){
  session_start();
  $_SESSION['user'] = $_GET;

}  ?>




<form action="" method="get">
<input name="name" placeholder="Имя">
<input name="age" placeholder="Возраст">
<input name="salary" placeholder="Зарплата">
  <input type="submit">
</form>