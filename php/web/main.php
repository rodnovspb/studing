<?php
$nouser=$copypass=$dateReg=$confirmReg=$passReg=$mailReg=$loginReg=$surnameReg=$nameReg=$note = '';
?>

<?php
//Функция для чистки данных формы
function clean($value=''){
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

if(!empty($_POST['login-enter']) and !empty($_POST['pass-enter']) and !empty($_POST['submit-enter'])){
    $loginEnter = $_POST['login-enter'];
    $passEnter = $_POST['pass-enter'];
    $submitEnter = $_POST['submit-enter'];
    $query = "SELECT * FROM web WHERE login='$loginEnter'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($res);
    if(!empty($user)) {
        if(password_verify($passEnter, $user['pass'])) {
            $id = $_SESSION['id'] = $user['id'];
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $user['surname']." ".$user['name'];
            header("Location: /id$id");
        }
        else {
            $nouser = 'логин или пароль неверный';
        }
    }
    else {
        $nouser = 'такого пользователя нет';
    }
}


if(!empty($_POST['name-reg']) and !empty($_POST['surname-reg']) and !empty($_POST['mail-reg']) and !empty($_POST['login-reg']) and !empty($_POST['pass-reg']) and !empty($_POST['confirm-reg']) and !empty($_POST['date-reg']) and !empty($_POST['submit-reg'])) {
    $nameReg = clean($_POST['name-reg']);
    $surnameReg = clean($_POST['surname-reg']);
    $loginReg = clean($_POST['login-reg']);
    $mailReg = clean($_POST['mail-reg']);
    $passReg = clean($_POST['pass-reg']);
    $copypass = $passReg; // копия пароля, чтобы вставить в инпут на случай занятого логина, иначе вставляется
    // хешированный
    $confirmReg = clean($_POST['confirm-reg']);
    $dateReg = clean($_POST['date-reg']);
    if(
        (strlen($nameReg) > 1 and strlen($nameReg) < 30) and
        (strlen($surnameReg) > 1 and strlen($surnameReg) < 30) and
        preg_match('/^[\w_.-]{1,30}@[\w_.-]{1,30}\.[\w_.-]{1,30}$/', $mailReg) == 1 and
        (strlen($loginReg) > 1 and strlen($loginReg) < 30) and
        ($passReg===$confirmReg)){
        //проверим наличие логина
        $query = "SELECT * FROM web WHERE login = '$loginReg'";
        $res = mysqli_query($link, $query);
        $result = mysqli_fetch_assoc($res);
        if(empty($result)){
            $passReg = password_hash($passReg, PASSWORD_DEFAULT);
            $query = "INSERT INTO web SET 
name = '$nameReg',
surname = '$surnameReg',
mail = '$mailReg',
login = '$loginReg',
pass = '$passReg',
date = '$dateReg'
";
            mysqli_query($link, $query) or die(mysqli_error($link));
//	  запросим вставленный id
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $surnameReg." ".$nameReg;
            header("Location: /id$id");
            exit();
        } else {
            $note = "Логин занят";
        }
    }
}


?>




<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>
<div class="wrapper">
<h1 class="header">Добро, пожаловать!</h1>
<div class="enter">
  <div>
      <p class="p">Вы можете войти:</p>
      <div>
          <form action="" method="post" class="form">
              <div class="input"><input required pattern="^\w{1,30}$" title="Латинские буквы или цифры в количестве
              от 1 до 30" type="text" placeholder="логин" name="login-enter"></div>
              <div class="input"><input required pattern="^\w{3,8}$" title="Латинские буквы или цифры в количестве
              от 3 до 8" type="password" placeholder="пароль"
                                        name="pass-enter"></div>
              <div class="input"><input type="submit" value="войти" name="submit-enter"></div>
          </form>
		<span class="note"><?=$nouser?></span>
      </div>
  </div>
  <div>
	<p class="p">Или зарегистрироваться:</p>
	<form action="" method="post">
       <div class="input"><span class="reg span-name"></span><input value="<?php if(!empty($nameReg)) echo $nameReg?>"
                                                                    class="input-reg" type="text" placeholder="имя" name="name-reg"></div>
       <div class="input"><span class="reg span-surname"></span><input value="<?php if(!empty($surnameReg)) echo
           $surnameReg?>" class="input-reg" type="text"
                                                                       placeholder="фамилия" name="surname-reg"></div>
	  <div class="input"><span class="reg span-mail"></span><input value="<?php if(!empty($mailReg)) echo $mailReg?>"
                                                                   class="input-reg" placeholder="почта"
                                                                   name="mail-reg"></div>
	   <div class="input"><span class="reg span-login"><?php if(!empty($note)) echo $note?></span><input value="<?php
           if(!empty($loginReg)) echo $loginReg?>" class="input-reg"
                                                                                                         type="text"
                                                                                                         placeholder="логин"
                                                                                                         name="login-reg"></div>
	   <div class="input"><span class="reg span-pass"></span><input value="<?php if(!empty($passReg)) echo
           $copypass?>" class="input-reg" type="password"
                                                                    placeholder="пароль"
                                                                    name="pass-reg"></div>
	   <div class="input"><span class="reg span-confirm"></span><input value="<?php if(!empty($confirmReg)) echo
           $confirmReg?>" class="input-reg" type="password"
                                                                       placeholder="повторите пароль"
                                                                       name="confirm-reg"></div>
	   <div class="input date-birth"><span>Дата </br> рождения</span><input value="<?php if(!empty($dateReg)) echo
           $dateReg?>" class="input-reg" required type="date"
                                                                            name="date-reg"></div>
       <div class="input"><input type="submit" value="зарегистрироваться" name="submit-reg"></div>
	</form>
  </div>
</div>
</div>










</body>
</html>

