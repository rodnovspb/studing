



<form action="" method="get">
  <span>Выберите страну</span><br>
  <select name="test">
	<option <?php if(isset($_GET['test']) and $_GET['test']=='Англия') echo 'selected'?>>Англия</option>
	<option <?php if(isset($_GET['test']) and $_GET['test']=='Россия') echo 'selected'?>>Россия</option>
	<option <?php if(isset($_GET['test']) and $_GET['test']=='США') echo 'selected'?>>США</option>
  </select>
  <input type="submit">
</form>

<?php  if(!empty($_GET)){
  echo $_GET['test'];
} ?>