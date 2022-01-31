


<form action="" method="get">
  <input type="hidden" value="0" name="flag">
  <span>Есть 18, мелкий гавнюк?</span>
  <input type="checkbox" value="1" name="flag" <?php if(isset($_GET["flag"]) and $_GET["flag"] == 1) echo 'checked'?>>
  <input type="submit">
</form>

<?php if(!empty($_GET)) {
  if($_GET['flag']==0) echo "<p>Не разрешаем</p>";
  else echo "<p>Разрешаем</p>";
}  ?>