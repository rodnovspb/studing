


<?php



if(!isset($_COOKIE['counter'])){
    setcookie('counter', 1);
    $_COOKIE['counter']=1;
}
else {
    setcookie('counter', ++$_COOKIE['counter']);
}

echo $_COOKIE['counter'];














?>