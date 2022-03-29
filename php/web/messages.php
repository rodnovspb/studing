<?php
$list_sender = $messages='';
if(!empty($_SESSION['auth'])) {
if(!empty($_POST['textarea_mess']) and !empty('submit-mess') and (strlen((string)$_POST['textarea_mess'])<255)){
  $query = "INSERT INTO messages SET name_from='$_SESSION[name]', id_from='$_SESSION[id]', id_to='$_GET[for]', message='$_POST[textarea_mess]'";
  mysqli_query($link, $query) or die(mysqli_error($link));
  header("Location: $_SERVER[REQUEST_URI]");
}

$query = "SELECT DISTINCT id_from,  name_from FROM messages WHERE id_to='$_SESSION[id]'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
foreach ($data as $datum){
    $list_sender.="<li><a href='?for=$datum[id_from]'>$datum[name_from]</a></li>";
}

if(!empty($_GET['for'])){
$query = "SELECT * FROM messages WHERE id_from='$_GET[for]' and id_to='$_SESSION[id]' UNION SELECT * FROM messages WHERE id_from='$_SESSION[id]' and id_to='$_GET[for]'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($res); $data[]=$row);
foreach ($data as $datum){
    $messages.="<p>$datum[message] / от $datum[name_from]</p>";
}
}

}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
  <h1 class="header">Мои сообщения</h1>
  <div class="container">
	<div class="left">
	  <ul class="left-messages">
		<?php echo $list_sender ?>
	  </ul>
	</div>
  	<div class="right">
	  <?php  if(!empty($_GET['for'])) {?>
		<form action="" method="post" class="form-mess">
		  <textarea class="textarea-mess" name="textarea_mess" id=""></textarea>
		  <input type="submit" name="submit-mess">
		</form>
	  <?php } ?>
	  	<div>
		  <?php echo $messages ?>
		</div>

	</div>
</div>
</div>



<script>


</script>










</body>
</html>