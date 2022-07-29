<?php
/*
Plugin Name: Установка blank внешним ссылкам
*/

add_action('wp_footer', 'add_blank');

function add_blank()
{
    wp_enqueue_script('add_blank', plugins_url('/add_blank.js', __FILE__));
}