<?php
session_start();

echo $_SESSION['flash'];
unset($_SESSION['flash']);

?>