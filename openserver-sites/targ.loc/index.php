

<form action="" method="GET">
	<input name="num1">
	<input name="num2">
	<input type="submit">
</form>



<?php

if(!empty($_GET)){
    $num = $_GET['num1'] * $_GET['num2'];
    echo "<p id='qqq'>$num</p>";
}

