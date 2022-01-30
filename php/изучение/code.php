

<form action="" method="get">
  <input name="city" placeholder="город" value="<?php if(isset($_GET["city"])) echo $_GET["city"]?>"><br>
  <input name="country" placeholder="страна" value="<?php if(isset($_GET["country"])) echo $_GET["country"]?>"><br>
  <input type="submit">
</form>

<?php if(!empty($_GET)) echo "Город: $_GET[city], страна: $_GET[country]"?>


