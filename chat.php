<?php

/**
* Plugin Name: Chat BOT
* Plugin URI: https://agencia.life
* Description: Chat BOT - Agência Life.
* Version: 1.1.0
* Author: Samuel Prado Almeida
* Author URI: https://github.com/worldvisual
* License: GPL2
*/

function loadScripts() {
    wp_enqueue_script('js-file', plugin_dir_url(__FILE__) . 'dist/js/script.js', array('jquery'), '', false);
}

add_action('wp_enqueue_scripts', 'loadScripts');