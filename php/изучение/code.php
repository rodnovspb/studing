<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>





<form action="" method="get">
  <textarea name="text"><?php if(!empty($_GET['text'])) echo $_GET['text'] ?></textarea><br>
  <input type="submit">
</form>

<?php
if(!empty($_GET['text'])) {
  $arr = explode(" ", $_GET['text']);
  $empty = [''];
  $arr = array_diff($arr, $empty);
  $arr1 = array_slice($arr, 0);
  // отфильтровать знаки препинания
    $arr1 = array_filter($arr1, function ($item){
	  	if(preg_match("/\d/", $item) ==0) return false;
	  	else return true;

	});

  $countWord = count($arr1);
  echo "Количество слов: $countWord";
  echo "<br>";

  $str = implode('', $arr);
  $countSymb = mb_strlen($str);
  echo "Количество символов: $countSymb";


}


?>


<?php // var_dump(preg_match("/\d/", '.') !==0)  ?>




















</body>
</html>


