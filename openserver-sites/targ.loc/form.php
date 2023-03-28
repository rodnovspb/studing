<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>форма</title>
	</head>
	<body>
		<form action="" method="POST">
			<input name="num1">
			<input name="num2">
			<input type="hidden" name="eee" value="1">
			<input type="submit">
		</form>
		
		<?php
			if (isset($_POST['num1']) and isset($_POST['num2'])) {
				if (isset($_POST['eee']) and $_POST['eee'] == '1') {
					echo '<p id="res">' . 
						$_POST['num1'] * $_POST['num2'] 
					. '</p>';
				}
			}
		?>
	<body>
</html>