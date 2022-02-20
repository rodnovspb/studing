<?php
session_start();

if(isset($_SESSION['auth'])) : ?>
<!DOCTYPE html>
	<html>
		<head>

		</head>
		<body>
			<p>текст только для авторизованного пользователя</p>
		</body>
	</html>
<?php else: ?>
    <!DOCTYPE html>
    <html>
		<head>
		</head>
		<body>
			<p>Пожалуйста, авторизуйтесь</p>
		</body>
	</html>

<?php  endif; ?>