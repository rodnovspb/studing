<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
    table {
      border-collapse: collapse;
    }
    td {
        border: 1px solid grey;
    }
    .all {
        height: 150px;
        padding-top: 10px;
    }
</style>
</head>
<body>

<form action="" method="post">
   <input type="submit" class="submit" name="all" value="Запросить всех">
</form>

<?php
if(isset($_POST['all'])){
    $query = "SELECT * FROM employees";
    $res = mysqli_query($link, $query);
    for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
}
?>

<div class="all">
    <table>
        <tr>
            <th>id</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Возраст</th>
            <th>Зарплата</th>
        </tr>
        <?php if(!empty($data)): ?>
        <?php foreach ($data as $datum):?>
        <tr>
            <td><?= $datum['id']?></td>
            <td><?= $datum['name']?></td>
            <td><?= $datum['surname']?></td>
            <td><?= $datum['age']?></td>
            <td><?= $datum['salary']?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>













</body>
</html>
