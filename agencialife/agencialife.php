<?php

/**
* Plugin Name: Agência Life
* Plugin URI: https://agencia.life
* Description: Lista de produtos interativa.
* Version: 1.1.0
* Author: Samuel Prado Almeida
* Author URI: https://github.com/worldvisual
* License: GPL2
*/

function loadScripts() {
    wp_enqueue_script('js-file', plugin_dir_url(__FILE__) . 'assets/main.js', array('jquery'), '', false);
}

add_action('wp_enqueue_scripts', 'loadScripts');

