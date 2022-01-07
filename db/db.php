<?php 

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
	json_respostas tinytext NOT NULL,
	PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

/*$wpdb->insert( 
	$table_name, 
	array( 
		'time' => current_time( 'mysql' ), 
		'nome_usuario' => 'samuel', 
		'email_usuario' => 'samuelprado.a@gmail.com', 
		'empresa_usuario' => 'life', 
		'telefone_usuario' => 'samuel',
		'json_respostas' => '{"teste": "teste"}'
	) 
);*/