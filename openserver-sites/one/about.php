<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Контактная форма</title>

</head>
<body>
<?php require 'blocks/header.php'?>

<?php
if(!empty($_SESSION['error'])){
    $errors = $_SESSION['error'];
    echo "<h3>Ошибки</h3>";
    echo "<ul>";
    foreach($errors as $error){
        echo "<li>$error</li>";
    }
}
unset($_SESSION['error']);
?>



<h3 class="mt-5">Контактная форма</h3><br>
<form action="check.php" method="post">
    <input class="form-control" type="text" name="email" placeholder="Введите почту"><br>
    <textarea class="form-control" name="message" placeholder="Введите сообщение"></textarea><br>
    <button class="btn btn-success"  type="submit" name="send">Отправить</button>
</form>



<?php require 'blocks/footer.php'?>


















</body>
</html>
