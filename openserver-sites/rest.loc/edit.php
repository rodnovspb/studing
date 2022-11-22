<?php

if(!empty($_POST)){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "UPDATE `goods` SET `name`='$name',`price`= $price WHERE id = $match[1]";
    mysqli_query($link, $query) or die(mysqli_error($link));
    header('Location: http://rest.loc/goods');
    exit();
}

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
        </tr>
        <tr>
            <form action="" method="post">
                <td><?= $good['id'] ?></td>
                <td><input type="text" value="<?= $good['name'] ?>" name="name" required></td>
                <td><input type="number" value="<?= $good['price'] ?>" name="price" required></td>
                <td><input type="submit" value="Сохранить"></td>
            </form>
            
        </tr>
</table>
