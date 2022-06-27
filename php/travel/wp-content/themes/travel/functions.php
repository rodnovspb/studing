<?php

//Загружаемые стили и скрипты
function load_script(){
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}

function load_style(){
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}


//Загружаем стили и скрипты

add_action('wp_head', 'load_script');
add_action('wp_head', 'load_style');

//Поддержка миниатюр
add_theme_support('post-thumbnails');

//Поддержка меню
register_nav_menu('menu', 'Меню');

//Сайдбар
register_sidebar(array(
    'name' => 'Виджеты сайдбара',
    'id' => 'sidebar',
    'description' => 'Размещайте виджеты сайдбара',
));

//Футер виджеты
register_sidebar(array(
    'name' => 'Виджеты футера',
    'id' => 'footer',
    'description' => 'Размещайте виджеты футера',
));


// слайдер

add_action('init', 'slider');

function slider(){
    register_post_type('slider', array(
        'public' => true,
        'supports' => ['title', 'thumbnail'],
        'labels'=> [
            'name' => 'Слайдер',
            'all_items' => 'Все изображения',
            'add_new' => 'Добавить изображение',
            'add_new_item' => 'Добавить слайдер',
            ]
    ));
}


