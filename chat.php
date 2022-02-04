<?php

/**
 * Plugin Name: Chat BOT
 * Plugin URI: https://agencia.life
 * Description: Chat BOT - Agência Life.
 * Version: 1.1.3
 * Author: Agência Life
 * Author URI: https://agencia.life
 * License: GPL2
 */

//require_once 'plugin-update/plugin-update-checker.php';
require_once 'db/db.php';


/*
  |--------------------------------------------------------------------------
  | cria o menu
  |--------------------------------------------------------------------------
  */
function wpdocs_register_my_custom_menu_page()
{
    add_menu_page(
        __('Chat BOT', 'textdomain'),
        'Chat BOT',
        'manage_options',
        'chat/page-wp/index.php',
        '',
        plugins_url('chat/dist/images/bot-icon.png'),
        6
    );
}
add_action('admin_menu', 'wpdocs_register_my_custom_menu_page');

function loadScripts()
{
    $version = '2.9.2';

    /*
    |--------------------------------------------------------------------------
    | JS
    |--------------------------------------------------------------------------
    */
    wp_enqueue_script('js-jquery', plugins_url('dist/js/jquery.min.js', __FILE__), array(), $version);
    wp_enqueue_script('js-script', plugins_url('dist/js/scrollbar.concat.min.js', __FILE__), array(), $version);
    wp_enqueue_script('js-script', plugins_url('dist/js/script.php', __FILE__), array(), $version);

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    */
    wp_enqueue_style('css-style', plugin_dir_url(__FILE__) . 'dist/css/style.css', get_stylesheet_uri(), $version);
    wp_enqueue_style('css-scrollbar', plugin_dir_url(__FILE__) . 'dist/css/scrollbar.min.css', get_stylesheet_uri(), $version);
}
add_action('wp_enqueue_scripts', 'loadScripts');

function my_plugin_update_checker_setting()
{
    if (!is_admin() || !class_exists('Puc_v4_Factory')) {
        return;
    }

    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/worldvisual/chat-bot/',
        __FILE__,
        'unique-plugin-or-theme-slug'
    );

    // (Opcional) If you're using a private repository, specify the access token like this:
    $myUpdateChecker->setAuthentication('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');

    // (Opcional) Set the branch that contains the stable release.
    $myUpdateChecker->setBranch('main');
}

add_action('admin_init', 'my_plugin_update_checker_setting');

/*
|--------------------------------------------------------------------------
| cria o shortcode
|--------------------------------------------------------------------------
*/
function chat_template()
{
    require_once 'chat_template.php';
}
add_shortcode('chat', 'chat_template');