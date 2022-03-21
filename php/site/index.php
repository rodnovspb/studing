<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
.form {
    display: flex;
}

.form>div {
    margin-right: 10px;
}
.select {

}

td {
    padding: 0px 10px;
}

</style>
</head>
<body>

<div>Выберите рубрику</div>

<form action="" method="post" class="form">
  <div class="sel">
  <select class="select" name="theme">
	<option value="1">Строительство</option>
	<option value="2">Бизнес</option>
	<option value="3">Производство</option>
	<option value="4">Финансы</option>
	<option value="5">Частные услуги</option>
  </select>
  </div>
  <div class="tex">
	<textarea name="text"></textarea>
  </div>
  <div class="sub">
  	<input type="submit" name="submit">
  </div>
</form>


<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
if(!empty($_POST['text']) and isset($_POST['submit'])) {
	$theme = $_POST['theme'];
	$text = $_POST['text'];
	$query = "INSERT INTO board SET theme = '$theme', text = '$text'";
	mysqli_query($link, $query) or die(mysqli_error($link));
	header('Location: /');
}
?>


<?php
$query = "SELECT * FROM board ORDER BY id DESC LIMIT 10";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row = mysqli_fetch_assoc($result); $data[]=$row);
echo "<p>Последние объявления:</p>";
echo "<table><tr><th>Тема</th><th>Текст</th></tr>";

foreach ($data as $elem) {
  echo "<tr>";
  echo "<td>";
  switch ($elem['theme']){
	  case '1':
	    echo 'Строительство';
	    break;
	  case '2':
	    echo 'Бизнес';
	    break;
      case '3':
        echo 'Производство';
        break;
      case '4':
          echo 'Финансы';
          break;
      case '5':
          echo 'Частные услуги';
          break;
	  default:
	    echo 'Прочее';
	    break;
  }
  echo "</td>";
  echo "<td>" . $elem['text'] . "</td>";
  echo "</tr>";
}
echo "</table>"


?>












</body>
</html>