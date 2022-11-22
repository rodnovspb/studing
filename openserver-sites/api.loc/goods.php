<?php
require 'db-goods.php';
require 'show.php';
?>
<style>
    td, th {
        border-collapse: collapse;
        border: 1px solid black;
        padding: 8px 15px;
    }
</style>



<form action="" method="post">
    <fieldset>
    <legend>Создать товар</legend>
    <input type="text" name="name" placeholder="Название">
    <input type="number" name="price" placeholder="Цена">
    <button type="submit">Создать</button>
    </fieldset>
</form>

<?php



?>


<?php
$query = "SELECT * FROM goods";
$res = mysqli_query($link, $query) or die(mysqli_error($link));

for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row)
?>

    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
        <?php  foreach ($data as $datum):  ?>
        <tr>
            <td><?= $datum['id'] ?></td>
            <td><?= $datum['name'] ?></td>
            <td><?= $datum['price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    
