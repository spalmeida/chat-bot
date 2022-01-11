<?php 

 /*
 |--------------------------------------------------------------------------
 | cria a tabela no banco de dados
 |--------------------------------------------------------------------------
 */

 global $wpdb;
 $table_name = $wpdb->prefix . "chat_bot"; 
 $charset_collate = $wpdb->get_charset_collate();

 $sql = "CREATE TABLE $table_name (
 	id mediumint(9) NOT NULL AUTO_INCREMENT,
 	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
 	nome_usuario tinytext NOT NULL,
 	email_usuario tinytext NOT NULL,
 	empresa_usuario tinytext NOT NULL,
 	telefone_usuario tinytext NOT NULL,
 	json_respostas json NOT NULL,
 	PRIMARY KEY  (id)
 ) $charset_collate;";

 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql );

 /*
 |--------------------------------------------------------------------------
 | insere os valores no banco de dados
 |--------------------------------------------------------------------------
 */
 if (isset($_COOKIE['chat_info'])) {

 	$array = json_decode($_COOKIE['chat_info'], true)[0];

 	$wpdb->insert( 
 		$table_name, 
 		array( 
 			'time' => current_time( 'mysql' ), 
 			'nome_usuario' => $array['nome_usuario'], 
 			'email_usuario' => $array['email_usuario'], 
 			'empresa_usuario' => $array['empresa_usuario'], 
 			'telefone_usuario' => $array['telefone_usuario'],
 			'json_respostas' => json_encode($array['perguntas'])
 		) 
 	);

	//unset($_COOKIE['chat_info']);
 	unset($_COOKIE['chat_info']);
 	setcookie('chat_info', null, -1, '/');
 }