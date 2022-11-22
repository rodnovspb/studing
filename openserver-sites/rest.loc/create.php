<form action="" method="post">
    <fieldset>
    <legend>Создать товар</legend>
    <input type="text" name="name" placeholder="Название" required>
    <input type="number" name="price" placeholder="Цена" required>
    <button type="submit">Создать</button>
    </fieldset>
</form>

<?php
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO `goods`(`name`, `price`) VALUES ('$name',$price)";
    
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    if($res) {
        header('Location: /goods');
        exit();
    } else {
        echo "<div>Ошибка вставки</div>";
    }
    
}



?>
