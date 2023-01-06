<?php

function getDateString($date){
    $months = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
    $arr = explode('-', $date);
    $str = ltrim($arr[2], '0') . ' ' . $months[ltrim($arr[1], '0')] . ' ' . $arr[0] . ' г.';
    return $str;
}
