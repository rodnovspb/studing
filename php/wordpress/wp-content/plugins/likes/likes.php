<?php
/*
Plugin Name: Количество лайков
*/

add_action('wp_footer', 'set_likes');

function set_likes()
{
    wp_enqueue_script('likes-script', plugins_url('/likes-script.js', __FILE__));
    wp_enqueue_style('likes-style', plugins_url('/likes-style.css', __FILE__));
}

register_activation_hook(__FILE__, 'create_table');
register_uninstall_hook(__FILE__, 'drop_table');

function create_table(){
    global $wpdb;
    $sql = "CREATE TABLE wp_likes (
 id int(11) NOT NULL AUTO_INCREMENT,
 post_id varchar(255) NOT NULL,
 count_likes int(11) NOT NULL DEFAULT 0,
 UNIQUE KEY id (id)
 );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

function drop_table(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS wp_likes");
}

