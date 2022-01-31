


<form action="" method="get">
  <input type="checkbox" name="flag1" value="1"><br>
  <input type="checkbox" name="flag2" value="1"><br>
  <input type="checkbox" name="flag3" value="1"><br>
  <input type="submit">
</form>

<?php if(!empty($_GET)) {
  echo $_GET['flag1']."<br>";
  echo $_GET['flag2']."<br>";
  echo $_GET['flag3']."<br>";
  var_dump($_GET);
} ?>