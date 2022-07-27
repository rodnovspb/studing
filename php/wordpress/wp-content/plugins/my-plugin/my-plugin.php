<?php
/*
 * Plugin Name: Мой первый плагин
 * Description: Описание супер-плагина
 * Version: 1.1.1
 * Author: Денис
 * License: GPLv2 or later
 * Text Domain: truemisha
 * Domain Path: /languages
 *
 * Network: true
 */

add_action('admin_head', "change_background_color_header");

function change_background_color_header(){
    echo '<style>#wpadminbar{background-color: #72aee6;}</style>';
}