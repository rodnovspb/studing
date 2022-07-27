<?php
require_once('../../../wp-load.php');
global $wpdb;
if($_REQUEST['count'] === 'how_much' && !empty($_REQUEST['id'])){
    $id = (int)($_REQUEST['id']);
    $result = $wpdb->get_results("SELECT likes FROM wp_views WHERE id = $id");
    if($result[0]->likes != 0) {
        $num = (string)($result[0]->likes);
    } else {
        $num = '0';
    }
    exit($num);
}

if($_REQUEST['count'] === 'increment' && !empty($_REQUEST['id'])){
    $id = (int)($_REQUEST['id']);
    //id поста уже вставился через плагин показа количества просмотров страницы
    $result = $wpdb->query("UPDATE wp_views SET likes = (likes + 1) WHERE id = $id");
    exit((string)$result);
}
