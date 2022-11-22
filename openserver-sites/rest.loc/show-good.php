<?php
$query = "SELECT * FROM goods WHERE id = $match[1]";
$res = mysqli_query($link, $query) or die(mysqli_error($link));

if($res->num_rows){
    $good = mysqli_fetch_assoc($res);
} else {
    echo "<div>Товар с таким id не найден</div>";
    return;
}
?>

<h3>Товар</h3>
<table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Действие</th>
            <th>Действие</th>
        </tr>
        <tr>
            <td><?= $good['id'] ?></td>
            <td><?= $good['name'] ?></td>
            <td><?= $good['price'] ?></td>
            <td><a href="?put=true">Редактировать</a></td>
            <td><a href="?del=true">Удалить</a></td>
        </tr>
</table>