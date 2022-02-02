<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
	.item {
        width: 20px;
        text-align: center;
	}

</style>
</head>
<body>

 <form action="" method="get">
  <input class="item" name="elem1" placeholder="a"><span>x2 + </span>
  <input class="item" name="elem2" placeholder="b"><span>x + </span>
  <input class="item" name="elem3" placeholder="c"><span> = 0</span> &nbsp;
  <input type="submit">
</form>

 <?php

 if(isset($_GET['elem1']) and isset($_GET['elem2']) and isset($_GET['elem3'])) {
   $a = (int)($_GET['elem1']);
   $b = (int)($_GET['elem2']);
   $c = (int)($_GET['elem3']);

   $D = $b**2 - 4*$a*$c;
	if($a==0){
    echo "<p>Первый коэффициент не может быть равен 0 </p>";
	}
	else {
        if($D<0){
            echo "<p>Корней нет</p>";
        }
		elseif ($D == 0) {
            $x1 = (-$b + sqrt($D))/(2*$a);
            echo "<p>Один корень $x1</p>";
        }
		elseif ($D>0){
            $x1 = (-$b + sqrt($D))/(2*$a);
            $x2 = (-$b - sqrt($D))/(2*$a);
            echo "<p>Первый корень $x1, второй корень $x2</p>";
        }
        else echo "<p>Неверные данные</p>";
	}

 }




 ?>














</body>
</html>


