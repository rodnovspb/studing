

<?php
$arr = ['a', 'b', 'c', 'd', 'e'];

foreach ($arr as $key=>$item){
    echo "<a href=\"?num=$key\">Ссылка на $item</a><br>";
}

if(isset($_GET['num'])) {
    $a = $_GET['num'];
    echo "<div>$arr[$a]</div>";
}

?>