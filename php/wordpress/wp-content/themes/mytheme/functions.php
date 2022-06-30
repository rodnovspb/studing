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
    wp_enqueue_script('script0.js', get_template_directory_uri() . '/script0.js');
    wp_enqueue_script('script.js', get_template_directory_uri() . '/script.js');
    wp_enqueue_script('script2.js', get_template_directory_uri() . '/script2.js');
    $script = "console.log(`четвертый скрипт`)";
    wp_add_inline_script('script2.js', $script, 'after');
}

function date_ru(){
    $months = [
        1=>'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря'
    ];
    return date('d') . " " . $months[date('n')] . " " . date('Y') . " г.";
}


add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}

add_action('widgets_init', 'my_widgets');

function my_widgets(){
    register_sidebar([
        'name'=> 'Боковая панель',
        'id' => 'homepage-sidebar',
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ]);
}




// мои перехваты на события и создание фильтров

add_action('my_hook', 'func');

function func($data){
    echo $data[0] . " " . $data[1];
}

function my_filter($str){
    return 'Здравствуйте, ' . $str;
}

add_filter('filter__my', 'my_filter');


function text($text){
    $text = strip_tags($text);
    return apply_filters('to_cut', $text);
}

add_filter('to_cut', 'cut');

function cut($str) : string {
    return mb_substr($str, 0, 30);
}
