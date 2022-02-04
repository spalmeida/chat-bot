<?php
//teste
/**
 * Plugin Name: Chat BOT
 * Plugin URI: https://agencia.life
 * Description: Chat BOT - Agência Life.
 * Version: 1.1.4
 * Author: Agência Life
 * Author URI: https://agencia.life
 * License: GPL2
 */

//require_once 'plugin-update/plugin-update-checker.php';
require_once 'db/db.php';
require_once 'plugin-update/plugin-update-checker.php';

if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'chat-bot', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/worldvisual/chat-bot', // the GitHub API url of your GitHub repo
        'raw_url' => 'https://raw.github.com/worldvisual/chat-bot/master', // the GitHub raw url of your GitHub repo
        'github_url' => 'https://github.com/worldvisual/chat-bot', // the GitHub url of your GitHub repo
        'zip_url' => 'https://github.com/worldvisual/chat-bot/zipball/master', // the zip url of the GitHub repo
        'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '3.0', // which version of WordPress does your plugin require?
        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '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', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}


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
