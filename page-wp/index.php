<?php 
  /*
  |--------------------------------------------------------------------------
  | efetua a consulta no banco de dados
  |--------------------------------------------------------------------------
  */
  $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chat_bot", OBJECT ); 
  ?>

  <style type="text/css">
  	p{
  		font-weight: 600;
  	}
  	.relatorio{
  		margin: 20px 20px 0px 0px;
  		padding: 20px;
  		background-color: #fefefe;
  		border-radius: 10px;
  		display: flex;
  		flex-wrap: wrap;
  		justify-content: space-around;
  	}
  	.button-download{
  		background-color: #2980b9;
  		color: #fff;
  		border: none;
  		border-radius: 3px;
  		cursor: pointer;
  		padding: 10px;
  	}
  	.button-download:hover{
  		background-color: #16a085;
  	}
  </style>

  <section class="relatorio">
  	<p>Gerar download de respostas "Chat Bot"</p>
  	<form action="<?= plugins_url( 'chat/page-wp/generate/generate.php' ) ?>" method="post">
  		<input type="text" hidden name="results" value='<?php echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)?>'>
  		<button class="button-download" id="button-download">DOWNLOAD RELATÓRIOS</button>
  	</form>
  </section>
  <section>
  	<p>Shortcode para uso: [chat]</p>
  </section>