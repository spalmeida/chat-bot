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

function loadScripts() {
    wp_enqueue_script('js-file', plugin_dir_url(__FILE__) . 'dist/js/script.js', array('jquery'), '', false);
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