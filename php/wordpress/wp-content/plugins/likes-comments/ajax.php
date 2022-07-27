<?php
require_once('../../../wp-load.php');
global $wpdb;
// отдаем сколько лайков у комментариев из присланного массива
if(!empty($_REQUEST['ids'])){
    $ids = $_REQUEST['ids'];
    $result = $wpdb->get_results("SELECT comment_id, count_likes FROM wp_comment_likes WHERE comment_id IN ($ids)");
    exit(json_encode($result));
}

if(!empty($_REQUEST['id']) && !empty($_REQUEST['count'])) {
    $id = $_REQUEST['id'];
    $wpdb->query("INSERT INTO wp_comment_likes SET comment_id = $id, count_likes = 1 ON DUPLICATE KEY UPDATE count_likes = (count_likes + 1)");
}

