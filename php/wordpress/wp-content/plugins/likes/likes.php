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

