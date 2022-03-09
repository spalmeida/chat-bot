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

require_once 'functions/functions.php';

/* ON ACTIVE */
function pluginprefix_activate()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "chat_bot";
    $charset_collate = $wpdb->get_charset_collate();

    $user_respostas = "CREATE TABLE $table_name (
 	id mediumint(9) NOT NULL AUTO_INCREMENT,
 	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
 	nome_usuario tinytext NOT NULL,
 	email_usuario tinytext NOT NULL,
 	empresa_usuario tinytext NOT NULL,
 	telefone_usuario tinytext NOT NULL,
 	json_respostas json NOT NULL,
 	PRIMARY KEY  (id)
 ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($user_respostas);
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

/* ON DEACTIVE */
function deactivation_plugin_database_tables()
{
    global $wpdb;
    $tableArray = [
        $wpdb->prefix . "chat_bot_perguntas",
        $wpdb->prefix . "chat_bot",
    ];

    foreach ($tableArray as $tablename) {
        $wpdb->query("DROP TABLE IF EXISTS $tablename");
    }

}
register_deactivation_hook(__FILE__, 'deactivation_plugin_database_tables');

  if(isset($_POST["chatbot_useremail"]) || isset($_POST["chatbot_status"]) && !isset($_COOKIE['reinicia_chat'])){
    setcookie("chatbot_useremail", $_POST["chatbot_useremail"]);
    setcookie("chatbot_status", 'finalizado');
  }

/*
  |--------------------------------------------------------------------------
  | cria o menu
  |--------------------------------------------------------------------------
  */
  function wpdocs_register_my_custom_menu_page()
  {
    $plugin_name = reset(explode('/', str_replace(WP_PLUGIN_DIR . '/', '', __DIR__)));
    add_menu_page(
        __('Chat BOT', 'textdomain'),
        'Chat BOT',
        'manage_options',
        "$plugin_name/page-wp/index.php",
        '',
        plugin_dir_url( __FILE__ ).'dist/images/bot-icon.png',
        6
    );
}
add_action('admin_menu', 'wpdocs_register_my_custom_menu_page');

function script_enqueuer() {

 $version = rand(1,9);

 wp_enqueue_script('js-jquery', plugins_url('dist/js/jquery.min.js', __FILE__), array(), $version);
 wp_enqueue_script('datatables-js', '//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js', array(), $version);

 wp_enqueue_script('datatables-buttons-js', 'https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js', array(), $version);

 wp_enqueue_script('datatables-excel-js', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array(), $version);

 wp_enqueue_script('datatables-buttons-html5-js', 'https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js', array(), $version);

 wp_enqueue_script('js-scrollbar', plugins_url('dist/js/scrollbar.concat.min.js', __FILE__), array(), $version);


 wp_register_script('js-script', plugins_url('dist/js/script.js', __FILE__), array('jquery'), $version);
 wp_localize_script('js-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')), $version);

 wp_enqueue_style('css-style', plugin_dir_url(__FILE__) . 'dist/css/style.css', get_stylesheet_uri(), $version);
  wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . 'dist/css/custom.css', get_stylesheet_uri(), $version);
 wp_enqueue_style('css-scrollbar', plugin_dir_url(__FILE__) . 'dist/css/scrollbar.min.css', get_stylesheet_uri(), $version);
 wp_enqueue_style('datatables-css', '//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css', get_stylesheet_uri(), $version); 
 wp_enqueue_style('datatables-buttons-css', 'https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css', get_stylesheet_uri(), $version);


 wp_enqueue_script( 'jquery' );
 wp_enqueue_script( 'js-script' );
}
add_action( 'init', 'script_enqueuer', 10, 1 );

/*
|--------------------------------------------------------------------------
| cria o shortcode
|--------------------------------------------------------------------------
*/
function chat_template()
{

    if(isset($_COOKIE['chatbot_useremail']) && $_COOKIE['chatbot_useremail'] != "0"){
		$require_page = 'dist/resultados.php';
    }else{
        $require_page = 'chat_template.php';
    }

    require_once $require_page;
    //require_once 'resultados.php';
}
add_shortcode('chat', 'chat_template');