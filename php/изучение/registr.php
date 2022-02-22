<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
    .inline-block {
        display: inline-block;
    }
    .block {
        display: block;
        font-size: 9px;
        color: red;
    }

</style>
</head>
<body>

<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<form action="" method="post">
    <div class="inline-block">
    <span class="block">
       <?php
       $flag = false;

       if(!empty($_POST['submit'])) {
           if(empty($_POST['login'])) {
               echo 'Пустой логин';
           }
           elseif (preg_match('/^\w+$/', $_POST['login'])!==1) {
               echo 'Логин только из лат. букв и цифр';
           }
           elseif (strlen($_POST['login'])<4 or strlen($_POST['login'])>10){
               echo 'Логин должен быть от 4 до 10 символов';
           }
           else {
               $flag = true;
           }
       }
       ?>
    </span>
    <input name="login" placeholder="логин">
    </div>
    <div class="inline-block">
     <span class="block">
         <?php
         if(!empty($_POST['submit'])) {
             if(empty($_POST['pass'])) {
                 echo 'Пустой логин';
                 $flag = false;
             }
            elseif (strlen($_POST['pass'])<6 or strlen($_POST['pass'])>12){
            echo    'Пароль должен быть от 6 до 12 символов';
           $flag = false;
}
         }
         ?>
     </span>
    <input name="pass" type="password" placeholder="пароль">
    </div>

    <div class="inline-block">
     <span class="block">
     <?php
     if(!empty($_POST['submit'])) {
         if(preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['mail']) !==1){
             echo 'Некорректная почта';
             $flag = false;
         }
     }
     ?>
     </span>
     <input name="mail"  placeholder="почта">
     </div>

      <div class="inline-block">
     <span class="block">
     <?php
     if(!empty($_POST['submit'])) {
         if(preg_match('/^\d{1,2}\.\d{1,2}\.(\d{2}|\d{4})$/', $_POST['date']) !==1){
             echo 'Некорректная дата';
             $flag = false;
         }
     }
     ?>
     </span>
     <input name="date"  placeholder="Дата рождения xx.xx.xxxx">
     </div>

  	<div class="inline-block">
	  <span class="block">
		<?php
        if(!empty($_POST['submit'])) {
          if($_POST['country']==1) {
            echo "Выберите страну";
            $flag = false;
		  }
		}
		?>

	  </span>
	  <select name="country">
		<option value="1">Выберите страну</option>
		<option>Россия</option>
		<option>США</option>
		<option>Канада</option>
		<option>Япония</option>
	  </select>
    </div>


    <div class="inline-block">
    <input name="submit"  type="submit">
    </div>
</form>


<?php
if(!empty($_POST['submit']) and $flag) {
    $pass = $_POST['pass'];
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $query = "SELECT * FROM users WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if(empty($user)) {
    $query = "INSERT INTO users SET
 login='$login',
 password = '$pass',
 mail = '$mail',
 date = '$date',
 country = '$country'";
            mysqli_query($link, $query);}

}

?>


</body>
</html>