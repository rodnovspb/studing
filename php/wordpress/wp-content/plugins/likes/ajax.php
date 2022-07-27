<?php
require_once('../../../wp-load.php');
global $wpdb;
// проверяем сколько лайков в базе по этому посту
if($_REQUEST['count'] === 'how_much' && !empty($_REQUEST['id'])){
    $id = (int)($_REQUEST['id']);
    // получаем количество лайков по этому посту
    $result = $wpdb->get_results("SELECT count_likes FROM wp_likes WHERE post_id = $id");
    // если такой строки не существует вставляем ее
    if(empty($result)){
        $wpdb->query("INSERT INTO wp_likes SET post_id = $id, count_likes = 0");
    }
    if(isset($result[0]->count_likes)) {
        $num = (string)($result[0]->count_likes);
    } else {
        //строки не было, создавали в базе новую, в скрипт передаем количество лайков 0
        $num = '0';
    }
    exit($num);
}

//увеличиваем количество лайков в базе
if($_REQUEST['count'] === 'increment' && !empty($_REQUEST['id'])){
    $id = (int)($_REQUEST['id']);
    $result = $wpdb->query("UPDATE wp_likes SET count_likes = (count_likes + 1) WHERE post_id = $id");
    exit((string)$result);
}
