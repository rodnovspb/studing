<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>
<?php
session_start();
if(!empty($_SESSION['auth']) and $_SESSION['status'] === '2'): ?>
    <!doctype html>
    <html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
  <style>
		tr {
        background-color: #7ce7d2;
		}
	   tr.admin {
        background-color: #f75555;
	}
  </style>
</head>
<body>

  <h1>Админ панель</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ducimus explicabo fugiat ipsam ipsum labore omnis quaerat quam soluta totam!</p>

<?php



$query = "SELECT login, id, status FROM user";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

    echo "<table>";
    echo "<tr><th>Логин</th><th>Статус</th></tr>";

    foreach ($data as $elem) {
      	if($elem['status']=='1') echo "<tr>";
      	else echo "<tr class='admin'>";
        echo "<td>$elem[login]</td>";
        echo "<td>$elem[status]</td>";
        echo "<td><a href='?id=$elem[id]'>Удалить</a></td>";
        if($elem['status']=='1') echo "<td><a href='?to_admin=$elem[id]'>Сделать админом</a></td>";
        elseif($elem['status']=='2') echo "<td><a href='?to_user=$elem[id]'>Сделать юзером</a></td>";
        echo "</tr>";
    }

    echo "</table>";
?>

<?php

if(!empty($_GET['id'])){
  	$id = $_GET['id'];
	$query = "DELETE FROM user WHERE id = '$id'";
	mysqli_query($link, $query);
	}
if(!empty($_GET['to_admin'])) {
  $id_to_admin = $_GET['to_admin'];
  $query = "UPDATE user SET status='2' WHERE id='$id_to_admin'";
  mysqli_query($link, $query);
}

if(!empty($_GET['to_user'])) {
    $id_to_user = $_GET['to_user'];
    $query = "UPDATE user SET status='1' WHERE id='$id_to_user'";
    mysqli_query($link, $query);
}




?>






<script>

</script>






</body>
</html>







<?php else: ?>

<h1>Нет прав доступа</h1>

<?php endif; ?>