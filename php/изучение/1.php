<?php
session_start();
if($_SESSION['auth'] = true) : ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>
  <p>Вы авторизованы</p>
	<?php
	echo  $_SESSION['status']=='2' ? 'АДМИН': "ПОЛЬЗОВАТЕЛЬ" ;
	echo '<br>';
	echo "Логин:" . $_SESSION['login'];
	?>

	<?php
	if($_SESSION['status']=='2') echo "<a href='admin.php'>Админ панель</a>"

	?>

</body>
</html>

<?php endif; ?>