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


</body>
</html>

<?php endif; ?>