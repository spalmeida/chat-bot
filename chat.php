<?php

/**
* Plugin Name: Chat BOT
* Plugin URI: https://agencia.life
* Description: Chat BOT - Agência Life.
* Version: 1.1.0
* Author: Samuel Prado Almeida e Mariana Caramico
* Author URI: https://github.com/worldvisual/chat-bot
* License: GPL2
*/


require_once 'db/db.php';
date_default_timezone_set('America/Sao_Paulo');

function loadScripts() {
    wp_enqueue_style( 'css-style',plugin_dir_url(__FILE__) . 'dist/css/style.css', get_stylesheet_uri() , '1.3');

    /*JS*/
    wp_enqueue_script( 'js-jquery', plugins_url( 'dist/js/jquery.min.js', __FILE__ ), array(), '1.2' );
    wp_enqueue_script( 'js-script', plugins_url( 'dist/js/script.js', __FILE__ ), array(), '1.2' );
    wp_enqueue_script( 'js-scrollbar', plugins_url( 'dist/js/scrollbar.concat.min.js', __FILE__ ), array(), '1.2' );

    /*CSS*/

    wp_enqueue_style( 'css-scrollbar',plugin_dir_url(__FILE__) . 'dist/css/scrollbar.min.css', get_stylesheet_uri() , '1.2');
}

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Chat BOT', 'textdomain' ),
        'Chat BOT',
        'manage_options',
        'chat/page-wp/index.php',
        '',
        plugins_url( 'chat/dist/images/bot-icon.png' ),
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
add_action('wp_enqueue_scripts', 'loadScripts');


function chat() { 
 return require_once 'chat_template.php'; 
} 
add_shortcode('chat', 'chat'); 