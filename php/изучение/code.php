



<?php

$arr = ['1.txt', '2.txt','3.txt'];
$res = '';
foreach ($arr as $elem){
  $res.=file_get_contents($elem);
}

file_put_contents('4.txt', $res);
echo file_get_contents('4.txt');





?>


















</body>
</html>


