

<form action="" method="get">
  <input name="elem" placeholder="введите число">
  <input name="elem1" placeholder="введите число">
  <button type="submit">Получить общие делители</button>
</form>

<?php

function getDivisors($num){
    $arr = [];
    for($i=2; $i<=$num; $i++){
        if($num%$i==0){
            array_push($arr, $i);
        }
    }
    return $arr;
}


if(isset($_GET["elem"]) and isset($_GET["elem1"])){
 	$num1 = $_GET['elem'];
 	$num2 = $_GET['elem1'];
 	$arr1 = getDivisors($num1);
 	$arr2 = getDivisors($num2);
 	$common = array_intersect($arr1, $arr2);
 	$w = implode(',', $common);
 	echo "<p>$w</p>";

} ?>