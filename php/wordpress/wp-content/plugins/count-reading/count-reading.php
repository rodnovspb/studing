<?php
/*
Plugin Name: Количество прочтений
*/


add_action('wp_head', "count_reading");

function count_reading(){
    global $user_ID, $post, $wpdb;
    $agent = $_SERVER['HTTP_USER_AGENT'];

    if(!$post || !is_singular()){
        return;
    }

    if(preg_match('/"Bot"|"robot"|"Slurp"|"yahoo"/i',$agent)){
        return;
    }

    if(preg_match('/["Mozilla"|"Opera"]/i',$agent)){
        $wpdb->query("INSERT INTO wp_views SET id = $post->ID, count = 1 ON DUPLICATE KEY UPDATE count = (count + 1)");
        wp_cache_delete( $post->ID, 'wp_views' );

    }

}