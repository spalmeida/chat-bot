<?php

/**
 * Plugin Name: Chat BOT
 * Plugin URI: https://agencia.life
 * Description: Chat BOT - Agência Life.
 * Version: 1.1.7
 * Author: Agência Life
 * Author URI: https://agencia.life
 * License: GPL2
 */

require_once 'plugin-update/plugin-update-checker.php';
require_once 'db/db.php';

$config = array(
    'slug' => plugin_basename(__FILE__),
    'proper_folder_name' => 'chat-bot',
    'api_url' => 'https://api.github.com/repos/worldvisual/chat-bot',
    'raw_url' => 'https://raw.github.com/worldvisual/chat-bot/master',
    'github_url' => 'https://github.com/worldvisual/chat-bot',
    'zip_url' => 'https://github.com/worldvisual/chat-bot/zipball/master',
    'sslverify' => true,
    'requires' => '1.0',
    'tested' => '3.3',
    'readme' => 'README.md',
    'access_token' => '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',
);
new WP_GitHub_Updater($config);


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
