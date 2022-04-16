<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
</head>
<body>

<?php
$input=$textarea=$checkbox=$radio='';

if(!empty($_POST['submit'])) {
    $input = $_POST['input'];
    $textarea = $_POST['textarea'];
    $checkbox = $_POST['checkbox'] ? 'checked': '';
    $radio = $_POST['radio'];
}
?>

<form action="" method="post">
    <input type="text" name="input" value="<?= $input?>"><br>
    <textarea name="textarea"><?= $textarea?></textarea><br>
    <input type="checkbox" name="checkbox" <?= $checkbox?>><br>
    <input type="radio" name="radio" value="1" <?php if($radio==1) echo 'checked'?>>
    <input type="radio" name="radio" value="2" <?php if($radio==2) echo 'checked'?>>
    <input type="radio" name="radio" value="3" <?php if($radio==3) echo 'checked'?>><br>
    <input type="submit" name="submit">
</form>















</body>
</html>


<?php



