<?php
$add_remove = $list= $comment=$content='';
$url = $_SERVER['REQUEST_URI'];
if(!empty($_SESSION['auth'])) {
  $auth = true;

} else  {$auth = false;}

preg_match('/^\/id([0-9]+)$/', $url, $match);
if(!empty($match[1])) {
    $reqId = $match[1];
}
elseif (empty($match[1]) and $auth = true){
    $reqId = $_SESSION['id'];
}
    $query = "SELECT * FROM web WHERE id = '$reqId'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($res);
    $name = $surname = $date = $datereg = $mail = "";
    if($user) {
        $name = $user['name'];
        $surname = $user['surname'];
        $mail = $user['mail'];
        $date = $user['date'];
        $datereg = $user['datereg'];
    }

    else {
        header('Location: 404.php');
    }

	if($auth  and ($_SESSION['id'] != $match[1])) {
	  $query = "SELECT * FROM friends WHERE user_id='$_SESSION[id]' and friend_id='$match[1]'";
	  $res = mysqli_query($link, $query) or die(mysqli_error($link));
	  $result = mysqli_fetch_assoc($res);
	  if(empty($result)) $add_remove="<div class='write_mess'><form action='' method='post'><input type='submit' name='add' value='Добавить в
 друзья'></form><a target='_blank' href='messages?for=$match[1]'>Написать сообщение</a></div>";
	  else $add_remove="<div class='write_mess'><form action='' method='post'><input type='submit' name='remove' value='Удалить из друзей'></form><a target='_blank' href='messages?for=$match[1]'>Написать сообщение</a></div>";
	}

	if(!empty($_POST['add'])) {
	  $query = "INSERT INTO friends SET user_id='$_SESSION[id]', friend_id='$match[1]', friend_name='$surname $name', your_name='$_SESSION[name]'";
      mysqli_query($link, $query) or die(mysqli_error($link));
      header("Location: $_SERVER[REQUEST_URI]");
	}
    if(!empty($_POST['remove'])) {
        $query = "DELETE FROM friends WHERE (user_id='$_SESSION[id]' and friend_id='$match[1]') or (friend_id='$_SESSION[id]' and user_id='$match[1]')";
        mysqli_query($link, $query) or die(mysqli_error($link));
        header("Location: $_SERVER[REQUEST_URI]");
    }


    $query = "SELECT DISTINCT friend_id, friend_name  FROM friends WHERE user_id = '$match[1]'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    if(!empty($res)) {
    for ($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
    foreach ($data as $datum) {
      $list.="<li><a href='id$datum[friend_id]'>$datum[friend_name]</a></li>";
	}
    }

    if(!empty($_POST['textarea']) and !empty($_POST['textarea-submit'])){
      if(strlen($_POST['textarea']) < 255) {
        $text = "$_POST[textarea]<br><a href=\'id$_SESSION[id]\'>$_SESSION[name]</a>";
        $query = "INSERT INTO wall SET text = '$text', id_user_wall = '$match[1]'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        header("Location: $_SERVER[REQUEST_URI]" );
	  }
      else {
          $comment = "<span class='note'>Максимум 255 символов</span>";
	  }
	}
    $query = "SELECT * FROM wall WHERE id_user_wall='$match[1]'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    if(!empty($res)) {
      for($data=[]; $row = mysqli_fetch_assoc($res); $data[] = $row);
      foreach ($data as $datum) {
          $content.="<p class='p-content'>$datum[text]</p>";
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
</head>
<body>
<div class="wrapper">
  <?php if($auth) echo "<div class='out'><a class='href-out' href='?out=1'>Выйти</a><a target='_blank' href='messages'>Мои сообщения</a></div>"?>
<h1 class="header"><?php echo "$name $surname"?></h1>
<div class="info">
    <div class="image">
        <img src="https://via.placeholder.com/250x300" alt="Фото профиля">
    </div>
    <div class="information">
        <p>Почта: <?= $mail ?></p>
        <p>День рождения: <?= $date ?></p>
        <p>Дата регистрации: <?= $datereg ?></p>
        <?php if($auth  and ($_SESSION['id'] != $match[1])) echo "$add_remove"?>
    </div>
</div>
    <div class="main">
        <div class="friends">
            <div class="head">Друзья</div>
		  	<div class="friends_div">
			  <ul class="friends_list"><?= $list ?></ul>
			</div>
        </div>
        <div class="wall">
            <div class="head">Стена</div>
		  	<div class="wall_list">
				<?php if($auth) {?>
				  <form action="" method="post">
					<textarea class="textarea" name="textarea"></textarea>
					<div class="textarea_input"><?= $comment ?><input type="submit" name="textarea-submit"
					value="отправить"></div>
				  </form>
			    <?php } ?>
			</div>
		  <div class="content"><?=$content?></div>
        </div>
    </div>
</div>




<script>



</script>












</body>
</html>
