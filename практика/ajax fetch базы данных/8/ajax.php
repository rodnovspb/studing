<?php

if(!empty($_POST)){
    extract($_POST);
    $mult = (int)$elem1*(int)$elem2*(int)$elem3;
    exit(json_encode($mult));
}
