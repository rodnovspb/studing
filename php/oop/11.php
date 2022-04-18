<?php
echo '!!!';
session_start();
$_SESSION['aaa'] = 5;
echo $_SESSION['aaa'];