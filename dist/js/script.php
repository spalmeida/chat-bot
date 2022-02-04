<script type="text/javascript">
  $(document).ready(function() {
    /*
    |--------------------------------------------------------------------------
    | VAR
    |--------------------------------------------------------------------------
    */

    let stepatual = $('#step-count').text();
    let $messages = $('.messages-content'),
      i = 0;
    let jsonfinal = '';
    let json_gerado_update = $('#json-gerado').attr("data-json");

    if (!get_cookie('chat_iniciado')) {
      set_cookie('chat_iniciado', '0');
      set_cookie('chat_json', '---');
    }


    $messages.mCustomScrollbar();

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS COOKIE 
    |--------------------------------------------------------------------------
    */

    function set_cookie(name, value, days = 1) {
      //' new Date().setHours(24) '
      if (days) {
        var d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + d.toGMTString();
      } else var expires = "";
      document.cookie = name + "=" + value + expires + "; path=/";
    }

    function get_cookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    if (get_cookie('chat_enviado') != '') {
      setTimeout(function() {
        erase_cookie('chat_info');
        $(".progress").css("width", '100%');
        $('<div class="message new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><div class="pergunta">Chat enviado!</div></div>').appendTo($('.mCSB_container')).addClass('new');
      }, 2000)
    }

    function erase_cookie(name) {
      document.cookie = name + '=; Max-Age=-99999999;';
    }


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS CHAT
    |--------------------------------------------------------------------------
    */

    function finaliza_chat() {
      set_cookie('chat_status', 'finalizado');
    }

    if (get_cookie('chat_iniciado')) {
      bot_mensagens(get_cookie('chat_iniciado'));
    }

    function fake_message(step) {
      $('<div class="message loading new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><span></span></div>').appendTo($('.mCSB_container')).addClass('new');
      bot_mensagens(step);
      update_scrollbar();
    }

    function handle_questions(step) {

      $('.question').on('change', function() {
        $(this).siblings('.message-submit').removeClass('hide');
      });

      $('.message-submit').on('click', function() {
        user_insert_mensagem(step);
      });

      $('.message-finish').on('click', finaliza_chat);
    }

    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        user_insert_mensagem(stepatual);
        return false;
      }
    });

    function reload_time() {
      let time = 'time';
      $.ajax({
        url: "<?= plugins_url('chat-bot/includes/tratamento.php') ?>",
        data: {
          time
        },
        success: function(result) {
          $('<div class="timestamp">' + result + '</div>').appendTo($('.message:last'));
          time = '';
        }
      });
    }

    function update_scrollbar() {
      $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
      });
    }

    /*
    |--------------------------------------------------------------------------
    | USER MENSAGENS
    |--------------------------------------------------------------------------
    */

    function user_insert_mensagem(step) {
      if ($('.message-input').length > 0) {
        msg = $('.message-input').val().replace(/"/g, "'");
        sessionStorage.setItem($('.message-input').attr('name') + '_usuario', msg);

        user_mensagens(step, msg, json_gerado_update);

      } else if ($('.questions .question').length > 0) {

        msg = $('.questions input:checked').siblings('label').html();

        user_mensagens(step, msg, json_gerado_update);
      } else if ($.trim(msg) == '') {
        return false;
      }

      $('.message-box').remove();
      $('.questions').remove();
      update_scrollbar();
      setTimeout(function() {
        fake_message(step);
      }, 1000 + (Math.random() * 20) * 100);
    }

    function user_mensagens(step, msg, json_gerado_update) {

      $.ajax({
        url: "<?= plugins_url('chat-bot/includes/tratamento.php') ?>",
        type: 'GET',
        dataType: "json",
        data: {
          step,
          msg,
          json_gerado: get_cookie('chat_json')
        },
        success: function(result) {

          console.log(get_cookie('chat_json'));
          $('<div class="message message-personal"><div class="msg">' + result['msg'] + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
          reload_time();
          set_cookie('chat_json', result['json_gerado']);
          //$('#json-gerado').attr("data-json", result['json_gerado']);
        }
      });
    }

    /*
    |--------------------------------------------------------------------------
    | BOT MENSAGENS
    |--------------------------------------------------------------------------
    */

    function bot_mensagens(step) {
      set_cookie('chat_iniciado', step);
      $.ajax({
        url: "<?= plugins_url('chat-bot/includes/tratamento.php') ?>",
        type: 'GET',
        dataType: "json",
        data: {
          step
        },
        success: function(result) {
          let data = result['data'];
          let next_step = result['next_step'];
          let count_steps = result['count_steps'];

          stepatual = next_step;
          let previus_step = result['previus_step'];

          $('#step-count').text = next_step;
          $(".progress").css("width", ((next_step + 1) / count_steps) * 100 + '%');

          setTimeout(function() {
            $('.message.loading').remove();

            $('<div class="message new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><div class="pergunta">' + data + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
            handle_questions(next_step);
            reload_time();
            update_scrollbar();
            step = next_step;
          }, 1000 + (Math.random() * 20) * 100);
        }
      });

    }

  });
</script>