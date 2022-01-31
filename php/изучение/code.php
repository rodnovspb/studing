


<form action="" method="get">
  <input type="checkbox" name="flag"><br>
  <input type="text" name="text"><br>
  <input type="submit">
</form>

<?php
if(!empty($_GET))
	if(isset($_GET['flag'])) echo 'отмечен';
	else echo "не отмечен";
?>