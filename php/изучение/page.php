<meta charset="utf-8">

<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>



<?php
	session_start();
	if(!empty($_POST)) {
//        валидация формы
	  if(true) {
	  $_SESSION['flash'] = 'форма заполнена';
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['age'] = $_POST['age'];
      $_SESSION['salary'] = $_POST['salary'];
      $query = "INSERT INTO users SET name = '$_POST[name]', age = '$_POST[age]', salary = '$_POST[salary]'";
	  mysqli_query($link, $query) or die(mysqli_error($link));
      header('Location: page.php');
      }
	  else {
          $_SESSION['flash'] = 'форма заполнена некорректно';
          header('Location: page.php');
	  }
	}
	elseif (isset($_SESSION['flash'])) {
	  echo $_SESSION['flash'];
	  unset($_SESSION['flash']);
	}


?>

<form action="" method="post">
  <input name="name" placeholder="имя" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ?>">
  <input name="age" placeholder="возраст" value="<?php if(isset($_SESSION['age'])) echo $_SESSION['age'] ?>">
  <input name="salary" placeholder="зп" value="<?php if(isset($_SESSION['salary'])) echo $_SESSION['salary'] ?>">
  <input type="submit">
</form>





