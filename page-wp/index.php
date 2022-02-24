<?php 
  /*
  |--------------------------------------------------------------------------
  | efetua a consulta no banco de dados
  |--------------------------------------------------------------------------
  */
  $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chat_bot", OBJECT ); 
  ?>

  <section class="relatorio">
    <h3>Relátorio de respostas "Chat Bot"</h3>
  </section>
  <section>
    <p>Shortcode para uso: [chat]</p>
  </section>

  <section class="resultados">
    <table id="resultado_chat_bot" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Empresa</th>
          <th>Telefone</th>
          <th>Resultado</th>
          <th>Visualizar</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        $resultados = json_decode(json_encode($results), true);

        foreach ($resultados as $value) {

          echo '
          <tr>
          <td>'.$value["nome_usuario"].'</td>
          <td>'.$value["email_usuario"].'</td>
          <td>'.$value["empresa_usuario"].'</td>
          <td>'.$value["telefone_usuario"].'</td>
          <td><div class="json-resposta">'.$value["json_respostas"].'</div></td>
          <td><form target="_blank" method="POST" action="'.get_site_url().'/chat">
          <input hidden type="text" name="chatbot_useremail" value="'.$value["email_usuario"].'">  
          <input hidden type="text" name="chatbot_status" value="finalizado">
          <button class="btn-consultar">Visualizar</button>
          </form></td>
          </tr>
          ';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Empresa</th>
          <th>Telefone</th>
          <th>Resultado</th>
          <th>Consultar</th>
        </tr>
      </tfoot>
    </table>
  </section>

  <script type="text/javascript">
   $(document).ready(function() {
    $('#resultado_chat_bot').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'copyHtml5',
      'excelHtml5'
      ]
    } );
  } );
</script>