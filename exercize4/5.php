<?php
require_once 'show.php';



$doc = new DOMDocument();

$doc->loadHTML("<html><body>Example<br></body></html>");

echo $doc->saveHTML();
