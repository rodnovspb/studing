<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
</head>
<body>


<?php
$nameError = $surnameError = $patrError = '';
$name = $surname = $patronymic = '';

if(!empty($_POST['submit'])){
    empty($_POST['name']) ? $nameError = 'Введите имя' : $name = $_POST['name'];
    empty($_POST['surname']) ? $surnameError = 'Введите фамилию' : $surname = $_POST['surname'];
    empty($_POST['patronymic']) ? $patrError = 'Введите отчество' : $patronymic = $_POST['patronymic'];
}
?>


<form action="" method="post">
    <label>Введите имя <input type="text" name="name"></label><span>*<?= $nameError ?></span><br>
    <label>Введите фамилию <input type="text" name="surname"></label><span>*<?= $surnameError ?></span><br>
    <label>Введите отчество <input type="text" name="patronymic"></label><span>*<?= $patrError ?></span><br>
    <input type="submit" name="submit">
</form>














</body>
</html>
