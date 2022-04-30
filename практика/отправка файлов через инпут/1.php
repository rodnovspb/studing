<?php

//важно! файлы попадают в FILES, а не в POST!!!
if(!empty($_FILES)){
    exit(json_encode($_FILES));
} else {
    exit(json_encode('файл не пришел'));
}




?>