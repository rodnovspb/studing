<?php
$query = "SELECT * FROM goods";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
?>



<h3>Список товаров</h3>
<table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
    <?php  foreach ($data as $datum):  ?>
        <tr>
            <td><?= $datum['id'] ?></td>
            <td><a href="/good/<?= $datum['id'] ?>"><?= $datum['name'] ?></a></td>
            <td><?= $datum['price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<div><a href="/good">Создать товар</a></div>
