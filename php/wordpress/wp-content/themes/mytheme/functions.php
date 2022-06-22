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


add_action('wp_head', 'js_to_wp_head');
function js_to_wp_head() {
    wp_enqueue_script('script0.js', get_stylesheet_directory_uri() . '/script0.js');
    wp_enqueue_script('script.js', get_stylesheet_directory_uri() . '/script.js');
    wp_enqueue_script('script2.js', get_stylesheet_directory_uri() . '/script2.js');
    $script = "console.log(`четвертый скрипт`)";
    wp_add_inline_script('script2.js', $script, 'after');
}



