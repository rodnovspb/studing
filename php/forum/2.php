<?php
    $data = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
    exit("Ответ на запрос: $data")

 ?>