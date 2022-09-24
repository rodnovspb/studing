<?php
require_once 'connection.php';
require_once 'functions.php';
$countries = selectCountries();
?>

<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Зависимые списки</title>
<script src="lists.js"></script>
<style>
   form div{
       margin-bottom: 15px;
   }
   #divregion, #divcity {
       display: none;
   }
</style>
</head>
<body>


<form action="" method="post">
    <div>
        <select name="country" id="country">
            <option value="0">Выберите страну</option>
            <?php foreach ($countries as $country): ?>
            <option value="<?= $country['id_country'] ?>"><?= $country['country_name_ru'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div id="divregion">
        <select name="region" id="region" disabled>

        </select>
    </div>
    <div id="divcity">
        <select name="city" id="city" disabled>

        </select>
    </div>

    <input type="submit" value="Отправить" name="submit">
</form>

<?php if(isset($city)): ?>
<p>Вы запрашивали: <?= $city ?></p>
<?php endif; ?>












</body>
</html>
