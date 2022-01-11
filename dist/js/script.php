<script type="text/javascript">
  $(document).ready(function() {

    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i <ca.length; i++) {
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

    if(getCookie('chat_enviado') != '') {
      setTimeout(function(){
        eraseCookie('chat_info');
        $(".progress").css("width", '100%');
        $('<div class="message new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><div class="pergunta">Chat enviado!</div></div>').appendTo($('.mCSB_container')).addClass('new');
      }, 2000)
    } else {      
      setTimeout(function() {
        fakeMessage();
      }, 100);
    }

    function eraseCookie(name) {   
      document.cookie = name+'=; Max-Age=-99999999;';  
    }

    $('#togglemenu').on('click', function(){
      $('#header').toggleClass('open');
    });

    var $messages = $('.messages-content'),
    d, h, m, itemjson, alternativasel, npergunta,
    i = 0;
    var jsonfinal = '';
    var stringjson = '[{ "perguntas": {';

    $messages.mCustomScrollbar();
    sessionStorage.setItem('nome_usuario', '');
    sessionStorage.setItem('empresa_usuario', '');
    sessionStorage.setItem('email_usuario', '');
    sessionStorage.setItem('telefone_usuario', '');

    function updateScrollbar() {
      $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
      });
    }

    function insertMessage() {
      if($('.message-input').length > 0) {
        msg = $('.message-input').val().replace(/"/g, "'");
        sessionStorage.setItem($('.message-input').attr('name')+'_usuario', msg);

        tratamento(msg, 'textarea');
      } else if($('#questions .question').length > 0) {
        msg = $('#questions input:checked').siblings('label').html();
        alternativasel = $('#questions input:checked').attr('id');
        npergunta = $('.n-pergunta-input').last().val();

        tratamento(msg, 'alternativas', alternativasel, npergunta);
      } else if ($.trim(msg) == '') {
        return false;
      }

      reloadTime();
          //$('.message-input').val(null);
          $('.message-box').remove();
          $('#questions').remove();
          updateScrollbar();
          setTimeout(function() {
            fakeMessage();
          }, 1000 + (Math.random() * 20) * 100);
        }

        $(window).on('keydown', function(e) {
          if (e.which == 13) {
            insertMessage();
            return false;
          }
        }) 

        var Fake = [
        'Olá, sou a Lilian, assistente virtual da <b>Actio Software</b>. Me conte mais sobre você! Qual é o seu nome?'+
        questionInput('nome'),

        'Certo! Em qual empresa você trabalha?'+
        questionInput('empresa'),

        'Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade do RH da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa <a target="_blank" href="https://actiosoftware.com/privacidade/">Política de Privacidade</a>'+
        questions('a) Ok, vamos lá! Eu concordo com as Políticas de Privacidade da Actio Software.'),

        '<div class="txt-pergunta">1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?</div>'+
        hiddenNpergunta('1')+
        questions('a) Ainda não aplicamos processos de gestão de desempenho', 'b) Estamos dando início ao processo de gestão de desempenho', 'c) Já aplicamos o processo estruturado e periódico de gestão de desempenho, mas sabemos que ainda existem pontos de melhoria', 'd) O processo de gestão de desempenho acontece de forma estruturada e periódica na minha empresa' ),

        '<div class="txt-pergunta">2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa?</div>'+
        hiddenNpergunta('2')+
        questions('a) Ainda não usamos nenhuma ferramenta para auxiliar o processo','b) Estamos em fase de implementação da ferramenta','c) Até usamos, mas não oferece todas as funcionalidades necessárias','d) Já usamos e atende todas as necessidades da empresa'),

        '<div class="txt-pergunta">3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?</div>'+
        hiddenNpergunta('3')+
        questions('a) Não utilizamos essa prática','b) A prática está sendo implementada nos processos','c) A empresa usa people analytics, mas precisa evoluir','d) Já implementamos a prática do people analytics em nossa gestão de desempenho e funciona perfeitamente'),

       '<div class="txt-pergunta">4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?</div>'+
        hiddenNpergunta('4')+
        questions('a) Não elegemos líderes e cargos estratégicos com a ajuda da gestão de desempenho','b) Estamos implementando essa opção para tornar cargos estratégicos elegíveis ao processo de gestão de desempenho','c) Alguns cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho. Sabemos que precisamos evoluir neste ponto','d) Sim, os cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho e a prática já demonstra resultados positivos'),

        '<div class="txt-pergunta">5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?</div>'+
        hiddenNpergunta('5')+
        questions('a) Nenhum cargo é elegível por meio de práticas de gestão de desempenho','b) Estamos implementando práticas de gestão de desempenho em nossa organização','c) Já usamos a gestão de desempenho para eleger níveis hierárquicos (não líderes) em nossa empresa, mas precisamos evoluir no processo','d) Os demais cargos e níveis hierárquicos (não líderes) são elegíveis por meio de práticas de gestão de desenvolvimento e isso já apresenta resultados positivos para a organização'),

        '<div class="txt-pergunta">6: Na sua empresa, acontecem autoavaliações com atribuição de pesos?</div>'+
        hiddenNpergunta('6')+
        questions('a) Não usamos autoavaliações em nossa empresa','b) Estamos implementando as autoavaliações com atribuição de pesos','c) Realizamos autoavaliações, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com a autoavaliação com atribuição de pesos e o processo flui perfeitamente'),

        '<div class="txt-pergunta">7: Além disso, acontecem avaliações de líderes com atribuição de pesos?</div>'+
        hiddenNpergunta('7')+
        questions('a) Não realizamos avaliações de líderes','b) Estamos implementando as avaliações de líderes com atribuição de pesos','c) Realizamos avaliações de líderes, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de líderes com atribuição de pesos e o processo flui perfeitamente'),

        '<div class="txt-pergunta">8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?</div>'+
        hiddenNpergunta('8')+
        questions('a) Não realizamos avaliações de liderados','b) Estamos implementando as avaliações de liderados com atribuição de pesos','c) Realizamos avaliações de liderados, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de liderados com atribuição de pesos e o processo flui perfeitamente'),

        '<div class="txt-pergunta">9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?</div>'+
        hiddenNpergunta('9')+
        questions('a) Não realizamos avaliações de pares','b) Estamos implementando as avaliações de pares com atribuição de pesos','c) Realizamos avaliações de pares, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de pares com atribuição de pesos e o processo flui perfeitamente'),

        '<div class="txt-pergunta">10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?</div>'+
        hiddenNpergunta('10')+
        questions('a) Não realizamos a contratação de desempenho/metas','b) Estamos dando início ao processo de gestão de desempenho, iniciando assim, a contratação de desempenho/metas','c) Já realizamos a contratação de desempenho/metas, porém, temos muito a evoluir','d) Atualmente, usamos a contratação de desempenho/metas e o processo acontece com muita eficiência'),

        'Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?'+
        questionInput('email'),

        '<div class="txt-pergunta">11: Vamos lá, faltam algumas perguntas para concluirmos o diagnóstico. A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?</div>'+
        hiddenNpergunta('11')+
        questions('a) Não usamos um modelo definido de competências','b) Estamos no estágio de definição das competências','c) Utilizamos/analisamos as competências, porém, não temos um modelo definido','d) Já colocamos em prática um modelo definido de competências e ele funciona muito bem'),

        '<div class="txt-pergunta">12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?</div>'+
        hiddenNpergunta('12')+
        questions('a) O desdobramento de metas não existe em minha empresa','b) Estamos desenvolvendo o desdobramento de metas individuais e/ou coletivas em minha empresa','c) Já possuímos os desdobramentos de metas individuais e/ou coletivas, mas precisamos melhorar sua aplicação','d) Em minha empresa, contamos com o desdobramento de metas individuais e/ou coletivas e elas atendem as expectativas'),

        '<div class="txt-pergunta">13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?</div>'+
        hiddenNpergunta('13')+
        questions('a) Não realizamos a análise dos KPIs','b) Estamos estabelecendo quais serão os KPIs para análise','c) Já definimos quais serão os KPIs a serem analisados, porém, isso ainda não acontece com efetividade','d) Acompanhamos periodicamente os KPIs colhidos por meio da avaliação de resultados, que acontece periodicamente'),

        '<div class="txt-pergunta">14: Na sua empresa, a avaliação de potencial é colocada em prática?</div>'+
        hiddenNpergunta('14')+
        questions('a) Não realizamos a avaliação de potencial','b) Estamos em fase de implementação da avaliação de potencial','c) Já temos uma avaliação de potencial, mas existem pontos a serem melhorados para a sua aplicação','d) Realizamos a análise de potencial e ela acontece com eficiência'),

        '<div class="txt-pergunta">15: Existe uma escala de avaliação?</div>'+
        hiddenNpergunta('15')+
        questions('a) Não contamos com nenhuma escala de avaliação','b) Estamos estudando quais escalas de avaliação utilizar','c) Já temos uma escala de avaliação, porém, existem pontos a melhorar','d) Usamos uma escala de avaliação para analisar os resultados obtidos e isso funciona muito bem'),

        '<div class="txt-pergunta">16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?</div>'+
        hiddenNpergunta('16')+
        questions('a) Os líderes não possuem essa rotina','b) Estamos estruturando a rotina de acompanhamento entre o líder e os liderados','c) Os líderes realizam o acompanhamento, porém, não acontecem de forma periódica e acaba sendo ineficaz','d) O acompanhamento entre o líder e o liderado acontece periodicamente ao longo do ciclo'),

        '<div class="txt-pergunta">17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?</div>'+
        hiddenNpergunta('17')+
        questions('a) Os líderes não possuem a prática de registrar as evidências durante o dia a dia','b) Estamos implementando essa cultura com os líderes','c) Os líderes anotam as evidências, mas o processo ainda é ineficiente e precisa ser aprimorado','d) Os líderes fazem as anotações das evidências no dia a dia e não deixam tudo para o final do ciclo'),

        '<div class="txt-pergunta">18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?</div>'+
        hiddenNpergunta('18')+
        questions('a) Não, pois ainda não aplicamos reconhecimento diferenciado para os profissionais com melhor performance','b) Estamos começando a divulgar essa informação de maneira mais estruturada','c) Apesar de aplicarmos o reconhecimento diferenciado para os profissionais com melhor performance, nem todos os colaboradores sabem sobre o assunto','d) Nossos colaboradores já sabem sobre o reconhecimento diferenciado para profissionais com melhor performance. Isso até os deixou mais engajados e produtivos'),

        '<div class="txt-pergunta">19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?</div>'+
        hiddenNpergunta('19')+
        questions('a) Não realizamos feedback contínuo','b) Estamos implementando o feedback contínuo em nosso cotidiano de trabalho','c) O feedback contínuo já é uma realidade em nossa empresa, porém, precisamos aperfeiçoar o processo','d) Já realizamos o feedback contínuo no dia a dia de trabalho. Isso está sendo muito importante para direcionar o desempenho dos colaboradores'),

        'Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?'+
        questionInput('telefone'),

        '<div class="txt-pergunta">20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?</div>'+
        hiddenNpergunta('20')+
        questions('a) Essas ações não são tratadas em nossa empresa','b) Estamos implementando ambas as ações em nosso cotidiano','c) As ações ainda não acontecem em momentos distintos em nossa empresa','d) As ações de PDI e carreira acontecem em momentos distintos em nossa organização'),

        '<div class="txt-pergunta">21: O avaliado registra sobre o processo de feedback e feedforward?</div>'+
        hiddenNpergunta('21')+
        questions('a) Não realizamos feedback e feedforward','b) Estamos implementando o processo de feedback feedforward','c) Apesar do feedback e feedforward acontecerem, o avaliado não registra sobre','d) O avaliado registra sobre o processo de feedback e feedforward'),

        '<div class="txt-pergunta">22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?</div>'+
        hiddenNpergunta('22')+
        questions('a) Não realizamos gestão de desempenho','b) Estamos implementando a gestão de desempenho','c) O líder só tem acesso aos resultados no final do processo de gestão de desempenho','d) O líder acompanha os resultados da gestão de desempenho on time'),

        '<div class="txt-pergunta">23: Sua empresa tem visibilidade do Pipeline de Liderança?</div>'+
        hiddenNpergunta('23')+
        questions('a) Não temos Pipeline de Liderança','b) Estamos implementando o Pipeline de Liderança','c) O Pipeline de Liderança é uma realidade em nossa empresa, mas precisa ser aprimorado','d) A nossa empresa tem total visibilidade do Pipeline de Liderança'),

        '<div class="txt-pergunta">24: O PDI é algo obrigatório para todos os níveis da organização?</div>'+
        hiddenNpergunta('24')+
        questions('a) Não usamos PDI','b) Estamos implementando o PDI em nossa empresa','c) O PDI é uma realidade em nossa organização, mas ainda não acontece em todos os níveis','d) Todos os níveis da organização usam o PDI'),

        '<div class="pergunta-finish">Chegou a hora de gerar o diagnóstico de maturidade de gestão de desenvolvimento da sua empresa. Veja!</div>'+finish()

        ]

        function questions(question_a, question_b, question_c, question_d){
          let questions = `
          <div class="questions" id="questions">
          ${question_a ? `<div class="question">
          <input type="radio" name="question" id="a">
          <label for="a">`+question_a+`</label>
          </div>` : ``}
          ${question_b ? `<div class="question">
          <input type="radio" name="question" id="b">
          <label for="b">`+question_b+`</label>
          </div>` : ``}
          ${question_c ? `<div class="question">
          <input type="radio" name="question" id="c">
          <label for="c">`+question_c+`</label>
          </div>` : ``}
          ${question_d ? `<div class="question">
          <input type="radio" name="question" id="d">
          <label for="d">`+question_d+`</label>
          </div>` : ``}
          
          <button type="submit" class="message-submit hide" >Enviar</button>
          </div>
          `;
          return questions;
        }

        function questionInput(name){
          let input = `
          <div class="message-box">
          <textarea name="`+name+`" type="text" class="message-input" placeholder="Escrever..."></textarea>
          <button type="submit" class="message-submit" >Enviar</button>
          </div>
          `;

          return input;
        }

        function hiddenNpergunta(n) {
          let hidden = `
          <input type="hidden" class="n-pergunta-input" value="${n}">
          `;

          return hidden;
        }

        function finish() {
          let finish = `
          <button type="submit" class="message-finish" >Finalizar</button>
          `;

          return finish;
        }

        function handleQuestions() {
          $('.question').on('change', function(){
            $(this).siblings('.message-submit').removeClass('hide');
          })

          $('.message-submit').on('click', function() {
            insertMessage(); 
          });  

          $('.message-finish').on('click', function() {   
            stringjson = stringjson.replace(/,$/, '');

            stringjson += `
          },
          "nome_usuario": "${sessionStorage.getItem('nome_usuario')}",
          "empresa_usuario": "${sessionStorage.getItem('empresa_usuario')}",
          "email_usuario": "${sessionStorage.getItem('email_usuario')}",
          "telefone_usuario": "${sessionStorage.getItem('telefone_usuario')}"
        }
        ]`;

        jsonfinal = $.parseJSON(stringjson);

        document.cookie = 'chat_info=' + JSON.stringify(jsonfinal);

        document.cookie = 'chat_enviado=1';

        location.reload();
        
       // updateDB(stringjson);

     });  
        }


        function tratamento(msg, tipo, altsel, nperg){
          $.ajax({
            url: "<?= plugins_url( 'chat/includes/tratamento.php' ) ?>",
            data: {msg},
            success: function(result) {
              if(tipo == 'textarea') {
                $('<div class="message message-personal"><div class="msg">' + result + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
              } else {
                $('<div class="message message-personal" alternativa="'+altsel+'">' + result + '</div>').appendTo($('.mCSB_container')).addClass('new');                 

                if(nperg) {
                  stringjson += `"pergunta_${nperg}" : "${$('.txt-pergunta').last().html()}", "resposta_${nperg}" : "${altsel}",`;
                }
              }
            }
          });
        }


        function reloadTime(){
          var time = 'time';
          $.ajax({
            url: "<?= plugins_url( 'chat/includes/tratamento.php' ) ?>",
            data: {time},
            success: function(result) {
              $('<div class="timestamp">' + result + '</div>').appendTo($('.message:last'));
              time = '';
            }
          });
        }

        function fakeMessage() {

          $(".progress").css("width",((i+1)/Fake.length)*100+'%')
          $('<div class="message loading new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><span></span></div>').appendTo($('.mCSB_container')).addClass('new');
          updateScrollbar();

          setTimeout(function() {
            $('.message.loading').remove();
            $('<div class="message new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><div class="pergunta">' + Fake[i] + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
            handleQuestions();
            reloadTime();
            updateScrollbar();
            i++;
          }, 1000 + (Math.random() * 20) * 100);
        }
      });
    </script>