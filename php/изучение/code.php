

<form action="" method="get">
  <input type="hidden" name="flag" value="0">
  <input type="checkbox" name="flag" value="1">
  <input type="submit">
</form>

<?php if(!empty($_GET)){
  	if($_GET['flag']==0) echo '<p>Не отмечен</p>';
  	elseif($_GET['flag']==1) echo '<p>отмечен</p>';
}  ?>