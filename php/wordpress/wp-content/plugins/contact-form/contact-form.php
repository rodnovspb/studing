<?php
/*
Plugin Name: Контактная форма
*/

add_action('wp_footer', 'add_contact_form');

function add_contact_form()
{
    wp_enqueue_script('contact_form_script', plugins_url('/contact_form_script.js', __FILE__));
    wp_enqueue_style('contact_form_style', plugins_url('/contact_form_style.css', __FILE__));
}