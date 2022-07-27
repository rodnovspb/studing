<?php
/*
Plugin Name: Количество лайков у комментариев
*/

add_action('wp_footer', 'set_comment_likes');

function set_comment_likes()
{
    wp_enqueue_script('comment-likes-script', plugins_url('/comment-likes-script.js', __FILE__));
    wp_enqueue_style('comment-likes-style', plugins_url('/comment-likes-style.css', __FILE__));
}

register_activation_hook(__FILE__, 'create_table_comment_likes');
register_uninstall_hook(__FILE__, 'drop_table_comment_likes');

function create_table_comment_likes(){
    global $wpdb;
    $sql = "CREATE TABLE wp_comment_likes (
 id int(11) NOT NULL AUTO_INCREMENT,
 comment_id int(11) NOT NULL,
 count_likes varchar(10) NOT NULL DEFAULT 0,
 UNIQUE KEY id (id)
 );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

function drop_table_comment_likes(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS wp_comment_likes");
}

