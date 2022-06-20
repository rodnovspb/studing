<?php

add_action('wp_head', 'css_to_wp_head');
function css_to_wp_head(){
    wp_enqueue_style('style1.css', get_stylesheet_directory_uri() . '/style1.css');
    wp_enqueue_style('style2.css', get_stylesheet_directory_uri() . '/style2.css');

    $inline_style = "
    .mycolor {
        background: pink;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    ";
    wp_add_inline_style('style2.css', $inline_style);
}