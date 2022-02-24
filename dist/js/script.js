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

  if (!get_cookie('chat_iniciado')) {
    set_cookie('chat_iniciado', '0');
  }
  
$('#resultado .buttons').prepend('<button type="button" class="responder_novamente">Responder novamente</button>');
  
$('#resultado .responder_novamente').on('click', function(){
  $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        dataType: "json",
        data: {
            action : 'tratamento',
            reinicia_chat: 'reiniciar'
        },
        success: function(result) {
            location.reload();
        }
      });
//    erase_cookie('chat_iniciado');
//    erase_cookie('chatbot_status');
//    erase_cookie('chatbot_useremail');
//    location.reload();
});

  monta_resultados();

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

  function monta_resultados(){
    let verify_cookie = get_cookie('chatbot_status') == 'finalizado' && get_cookie('chatbot_useremail') != '';

    if(verify_cookie) {

      $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        dataType: "json",
        data: {
          action : 'tratamento',
          monta_resultados: 'get',
          consulta: get_cookie('chatbot_useremail')
        },
        success: function(result) {
          //console.log(result.json_respostas);
          $("#json_resultados").text(result.json_respostas);
          resultado_sucesso(JSON.parse(result.json_respostas));
        }
      });
    }

    function resultado_sucesso(retorno){

      let jsonres = retorno;

      let textos = { 
        "textos" : [
        {
          "tema" : "Processo",
          "textos_class" : [
          {
            "A" : "<p>O processo de gestão de desempenho deve ser vivo e gerar um ciclo virtuoso, que se renova e se retroalimenta a medida que a empresa e seus colaboradores crescem e/ou envoluem. Por isso, é importante aprimora-lo continuamente para que o mesmo siga agregando valor para todas as partes envolvidas, de acordo com as lições aprendidas no ciclo anterior. Analise as tendências/boas práticas relacionadas a este tema e avalie o que faz mais sentido para a sua empresa, considerando todo o contexto ao qual ela está inserida. O resultado deste processo gera impactos na vida e na carreira das pessoas e, consequentemente, no nível de motivação e engajamento das mesmas. Independente de qual for o modelo de gestão de desempenho da sua empresa (mais ou menos robusto/disrruptivo), busque sempre assegurar a simplicidade, agilidade e a qualidade na execução deste processo. Dica de ouro: busque referências, mas não se baseie apenas nisso! Lembre-se de que não existe um modelo único/ideal de gestão de desempenho, mas sim o modelo certo para cada empresa. O que funciona muito bem para uma empresa, pode não ser adequando para outra!</p><p>Na gestão de desempenho, a tecnologia  tem um  impacto na melhoria da experiência das pessoas ao longo de todo este processo. Quanto mais robusto e avançado for o processo, maior será a necessidade de otimização/automatização para  minimizar a carga de atividades operacionais e  reduzir a dependência das pessoas com o  RH para a execução e cumprimento das atividades/etapas que compõem o processo, promovendo maior visibilidade e  autonomia a todos os envolvidos, além de construir uma base histórica com dados gerando analytics . Assim, a sua empresa pode concentrar energia e tempo naquilo que realmente importa e interessa: nas pessoas! Avalie se as ferramentas/sistemas utilizados pela sua empresa estão sendo suficientes para atender às necessidades e expectativas dos usuários (RH, líderes e colaboradores). Caso não atenda, verifique a possibilidade de aderir um novo recurso, que se adapte melhor a realidade e particularidades da sua empresa.  Você sabia que o lift (nosso software de gestão de desempenho) foi criado e desenvolvido pela Falconi em parceria com a actio, com especialistas neste tema? Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p>",
            "B" : "<p>O processo de gestão de desempenho deve ser vivo e gerar um ciclo virtuoso, que se renova e se retroalimenta a medida que a empresa e seus colaboradores crescem e/ou envoluem. Por isso, é importante aprimora-lo continuamente para que o mesmo siga agregando valor para todas as partes envolvidas, de acordo com as lições aprendidas no ciclo anterior. Analise as tendências/boas práticas relacionadas a este tema e avalie o que faz mais sentido para a sua empresa, considerando todo o contexto ao qual ela está inserida. O resultado deste processo gera impactos na vida e na carreira das pessoas e, consequentemente, no nível de motivação e engajamento das mesmas. Independente de qual for o modelo de gestão de desempenho da sua empresa (mais ou menos robusto/disrruptivo), busque sempre assegurar a simplicidade, agilidade e a qualidade na execução deste processo. Dica de ouro: busque referências, mas não se baseie apenas nisso! Lembre-se de que não existe um modelo único/ideal de gestão de desempenho, mas sim o modelo certo para cada empresa. O que funciona muito bem para uma empresa, pode não ser adequando para outra!</p><p>Na gestão de desempenho, a tecnologia  tem um  impacto na melhoria da experiência das pessoas ao longo de todo este processo. Quanto mais robusto e avançado for o processo, maior será a necessidade de otimização/automatização para  minimizar a carga de atividades operacionais e  reduzir a dependência das pessoas com o  RH para a execução e cumprimento das atividades/etapas que compõem o processo, promovendo maior visibilidade e  autonomia a todos os envolvidos, além de construir uma base histórica com dados gerando analytics . Assim, a sua empresa pode concentrar energia e tempo naquilo que realmente importa e interessa: nas pessoas! Avalie se as ferramentas/sistemas utilizados pela sua empresa estão sendo suficientes para atender às necessidades e expectativas dos usuários (RH, líderes e colaboradores). Caso não atenda, verifique a possibilidade de aderir um novo recurso, que se adapte melhor a realidade e particularidades da sua empresa.  Você sabia que o lift (nosso software de gestão de desempenho) foi criado e desenvolvido pela Falconi em parceria com a actio, com especialistas neste tema? Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p>",
            "C" : "<p>Avalie se o processo de gestão de desempenho adotado pela sua empresa está alinhado ao nível de maturidade. O resultado deste processo gera impactos na vida e na carreira das pessoas e, consequentemente, no nível de motivação e engajamento das mesmas. Opte pela simplicidade e qualidade da execução deste processo! O mais importante é fazer com que ele funcione bem e faça sentido para todas as partes envolvidas. Na dúvida, colete as percepções das pessoas a respeito deste processo x  as necessidades do negócio, antes de viabilizar a implementação das oportunidades de melhoria identificadas. Lembre-se de que não existe um modelo único de gestão de desempenho, mas sim o modelo certo para cada empresa. O que funciona muito bem para uma empresa, pode não ser adequando para outra! Busque sempre a melhoria contínua do processo, de acordo com as lições aprendidas no ciclo anterior. Não tenha pressa, evolua aos poucos (um degrau de cada vez), essa é chave para o sucesso!</p><p>Analise e reflita sobre o que a empresa e as pessoas esperam do atual modelo gestão de desempenho da sua empresa. Como este processo é percebido pela pessoas? O que funciona bem e não pode ser perdido? O que não funciona e precisa ser melhorado? Da forma como é conduzido, este processo atende as reais necessidades e expetativas das pessoas e do negócio? Se a resposta da pergunta anterior for não, o processo certamente não gera o valor esperado e precisa ser revisitado. Se tiver dificuldade, busque ajuda!</p><p>Um fator essencial e indiscutível para a operacionalização e otimização de qualquer processo, é o investimento em tecnologia. Na gestão de desempenho isso não é diferente. Por se tratar de um processo crítico e extremamente estratégico, que demanda a coleta e análise minunciosa de dados para uma tomada decisão assertiva (que afeta diretamente o futuro das pessoas e o negócio), minimizar a carga de atividades operacionais e melhorar a experiência das pessoas ao longo deste processo é fundamental. Assim, a sua empresa pode concentrar energia e tempo naquilo que realmente importa e interessa: nas pessoas! Ter um processo de gestão de desempenho manual, moroso e/ou com o uso de ferramentas/sistemas que não se adaptam ao processo e modelo ideal para a sua empresa, trará mais perdas do que ganhos (principalmente de dinheiro). Por isso, avalie bem as opções e opte por aquele que for mais adequado para a sua empresa. Você sabia que o lift (nosso software de gestão de desempenho) foi criado e desenvolvido pela Falconi em parceria com a actio, com especialistas neste tema? Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p>",
            "D" : "<p>Avalie se o processo de gestão de desempenho adotado pela sua empresa está alinhado ao nível de maturidade. O resultado deste processo gera impactos na vida e na carreira das pessoas e, consequentemente, no nível de motivação e engajamento das mesmas. Opte pela simplicidade e qualidade da execução deste processo! O mais importante é fazer com que ele funcione bem e faça sentido para todas as partes envolvidas. Na dúvida, colete as percepções das pessoas a respeito deste processo x  as necessidades do negócio, antes de viabilizar a implementação das oportunidades de melhoria identificadas. Lembre-se de que não existe um modelo único de gestão de desempenho, mas sim o modelo certo para cada empresa. O que funciona muito bem para uma empresa, pode não ser adequando para outra! Busque sempre a melhoria contínua do processo, de acordo com as lições aprendidas no ciclo anterior. Não tenha pressa, evolua aos poucos (um degrau de cada vez), essa é chave para o sucesso!</p><p>Analise e reflita sobre o que a empresa e as pessoas esperam do atual modelo gestão de desempenho da sua empresa. Como este processo é percebido pela pessoas? O que funciona bem e não pode ser perdido? O que não funciona e precisa ser melhorado? Da forma como é conduzido, este processo atende as reais necessidades e expetativas das pessoas e do negócio? Se a resposta da pergunta anterior for não, o processo certamente não gera o valor esperado e precisa ser revisitado. Se tiver dificuldade, busque ajuda!</p><p>Um fator essencial e indiscutível para a operacionalização e otimização de qualquer processo, é o investimento em tecnologia. Na gestão de desempenho isso não é diferente. Por se tratar de um processo crítico e extremamente estratégico, que demanda a coleta e análise minunciosa de dados para uma tomada decisão assertiva (que afeta diretamente o futuro das pessoas e o negócio), minimizar a carga de atividades operacionais e melhorar a experiência das pessoas ao longo deste processo é fundamental. Assim, a sua empresa pode concentrar energia e tempo naquilo que realmente importa e interessa: nas pessoas! Ter um processo de gestão de desempenho manual, moroso e/ou com o uso de ferramentas/sistemas que não se adaptam ao processo e modelo ideal para a sua empresa, trará mais perdas do que ganhos (principalmente de dinheiro). Por isso, avalie bem as opções e opte por aquele que for mais adequado para a sua empresa. Você sabia que o lift (nosso software de gestão de desempenho) foi criado e desenvolvido pela Falconi em parceria com a actio, com especialistas neste tema? Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p>"
          }
          ]    
        },
        {
          "tema" : "Diretrizes",
          "textos_class" : [
          {
            "A" : "<p>Verifique se o modelo de KPIs/metas individuais e/ou coletivas definidas pela sua empresa é revisitado sempre que necessário, de acordo com o cenário e principais desafios, refletindo e impulsionando a estratégia do negócio. É impressindível  direcionar os esforços de maneira assertiva (na mesma direção) para assegurar e/ou superar o atingimento dos resultados. Lembre-se que a gestão de desempenho mensura e direciona a execução da estratégia da sua empresa.</p><p>Ao final de cada ciclo de gente, avalie se o modelo de gestão de desempenho adotado pela sua empresa está sendo efetivo no fortalecimento da cultura, levando em consideração a aderência dos profissionais ao 'jeito de ser' (aquilo que a empresa acredita, valoriza e não abre mão). Assegure que a identidade organizacional e a estratégia da sua empresa esteja conectada e fortemente internalizada neste processo para potencializar e gerar o máximo de valor para o negócio e, consequentemente, para as pessoas. Dica de ouro: analise a necessidade de customização e/ou adaptação do modelo de competências adotado pela sua empresa, usando uma abordagem mais simples e uma linguagem aderente as necessidades, particularidades do negócio. Assim como nas metas, é importante que as competências organizacionais esteja bem desdobradas e calibradas, de acordo com o nível de exigência e complexidade das funções.</p>",
            "B" : "<p>Verifique se o modelo de KPIs/metas individuais e/ou coletivas definidas pela sua empresa é revisitado sempre que necessário, de acordo com o cenário e principais desafios, refletindo e impulsionando a estratégia do negócio. É impressindível  direcionar os esforços de maneira assertiva (na mesma direção) para assegurar e/ou superar o atingimento dos resultados. Lembre-se que a gestão de desempenho mensura e direciona a execução da estratégia da sua empresa.</p><p>Ao final de cada ciclo de gente, avalie se o modelo de gestão de desempenho adotado pela sua empresa está sendo efetivo no fortalecimento da cultura, levando em consideração a aderência dos profissionais ao 'jeito de ser' (aquilo que a empresa acredita, valoriza e não abre mão). Assegure que a identidade organizacional e a estratégia da sua empresa esteja conectada e fortemente internalizada neste processo para potencializar e gerar o máximo de valor para o negócio e, consequentemente, para as pessoas. Dica de ouro: analise a necessidade de customização e/ou adaptação do modelo de competências adotado pela sua empresa, usando uma abordagem mais simples e uma linguagem aderente as necessidades, particularidades do negócio. Assim como nas metas, é importante que as competências organizacionais esteja bem desdobradas e calibradas, de acordo com o nível de exigência e complexidade das funções.</p>",
            "C" : "<p>Avalie a necessidade de definição e/ou revisão dos KPIs/metas individuais e/ou coletivas, visando garantir que os mesmos estão refletindo e ajudando a impulsionar a estratégia da sua empresa. Além disso, o desdobramento das metas para todos os níveis da empresa, ajuda a direcionar os esforços de maneira mais assertiva para o alcance dos resultados esperados. É fudamental que todos 'remem o barco' na mesma direção.</p><p>Analise se o processo de gestão de desempenho adotado pela sua empresa está coerente com o que de fato ela preza e valoriza, considerando as particularidades do negócio. A identidade organizacional (propósito, missão, visão e valores/principíos) devem estar intimamente internalizados neste processo, pois este reflete a cultura. Do contrário, ele não agregará valor para o negócio e, consequentemente, para os profissionais.</p><p>Enquando as metas devem ser apuradas, os comportamentos devem ser avaliados. Verifique a necessidade de definir e/ou revisar as competências organizacionais e de liderança, garantindo que as mesmas estão traduzindo o 'jeito de ser' da sua empresa (aquilo que a empresa acredita, valoriza e não abre mão) em comportamentos esperados e possíveis de serem observados e avaliados (para reduzir ao máximo o nível de subjetividade no momento da avaliação). Competências bem definidas e comunicadas, dão clareza para as pessoas sobre o que é esperado delas, além de direcionar o desenvolvimento das competências necessárias para o negócio. Assim como nas metas, uma mesma competências pode ser desdobrada e calibrada, de acordo com o nível de exigência e complexidade das funções.</p>",
            "D" : "<p>Avalie a necessidade de definição e/ou revisão dos KPIs/metas individuais e/ou coletivas, visando garantir que os mesmos estão refletindo e ajudando a impulsionar a estratégia da sua empresa. Além disso, o desdobramento das metas para todos os níveis da empresa, ajuda a direcionar os esforços de maneira mais assertiva para o alcance dos resultados esperados. É fudamental que todos 'remem o barco' na mesma direção.</p><p>Analise se o processo de gestão de desempenho adotado pela sua empresa está coerente com o que de fato ela preza e valoriza, considerando as particularidades do negócio. A identidade organizacional (propósito, missão, visão e valores/principíos) devem estar intimamente internalizados neste processo, pois este reflete a cultura. Do contrário, ele não agregará valor para o negócio e, consequentemente, para os profissionais.</p><p>Enquando as metas devem ser apuradas, os comportamentos devem ser avaliados. Verifique a necessidade de definir e/ou revisar as competências organizacionais e de liderança, garantindo que as mesmas estão traduzindo o 'jeito de ser' da sua empresa (aquilo que a empresa acredita, valoriza e não abre mão) em comportamentos esperados e possíveis de serem observados e avaliados (para reduzir ao máximo o nível de subjetividade no momento da avaliação). Competências bem definidas e comunicadas, dão clareza para as pessoas sobre o que é esperado delas, além de direcionar o desenvolvimento das competências necessárias para o negócio. Assim como nas metas, uma mesma competências pode ser desdobrada e calibrada, de acordo com o nível de exigência e complexidade das funções.</p>"
          }
          ]    
        },
        {                
          "tema" : "Pessoas",   
          "textos_class" : [
          {
            "A" : "<p>A gestão de desempenho da sua empresa funciona como um importante aliado da estratégia da jornada do colaborador (employee experience)? Quanto mais os colaboradores estiverem motivados e satisfeitos com a sua empresa, melhor será o engajamento e, consequentemente, melhores serão os resultados alcançados. Por isso, é preciso executar um trabalho contínuo de acompanhamento e desenvolvimento dos colaboradores durante todas as fases dessa jornada (desde o primeiro contato até o fim do vínculo empregatício). É por meio da gestão de desempenho, que a sua empresa poderá acompanhar e identificar rapidamente as fortalezas e os gaps das equipes e mantê-las alinhadas, contribuindo para a melhoria da experiência dos colaboradores da organização.</p><p>É papel da liderança promover e garantir que a gestão de desempenho ocorra na prática (durante a rotina de trabalho) de forma contínua, ao longo de todo o ciclo de gente. Para que isso ocorra, a liderança deve ser acessível e próxima, atuando de forma ativa a participativa na gestão e desenvolvimento do time, oferecendo acompanhamento, orientação/direcionamento e formação, com base nas necessidades, aspirações e particularidades individuais e coletivas do time. Avalie se o assunto 'gente' está  inserido na agenda da liderança da sua empresa de forma definitiva e  recorrente, investindo tempo e enegia necessária para contribir forma efetiva com a melhoria da performance dos colaboradores.</p><p>Quando pensamos em desenvolvimento de pessoas, mais um fator importante deve ser levado em consideração (além do apoio da liderança): o PROTAGONISMO das PESSOAS! Por isso, é essencial que a sua empresa garanta a capacitação de todos e atue na promoção contínua de ações que reforçem o engajamento das mesmas acerca do processo de gestão de desempenho. O desenvolvimento só acontece se as pessoas se comprometerem e entenderem o valor que este processo agrega.</p>",
            "B" : "<p>A gestão de desempenho da sua empresa funciona como um importante aliado da estratégia da jornada do colaborador (employee experience)? Quanto mais os colaboradores estiverem motivados e satisfeitos com a sua empresa, melhor será o engajamento e, consequentemente, melhores serão os resultados alcançados. Por isso, é preciso executar um trabalho contínuo de acompanhamento e desenvolvimento dos colaboradores durante todas as fases dessa jornada (desde o primeiro contato até o fim do vínculo empregatício). É por meio da gestão de desempenho, que a sua empresa poderá acompanhar e identificar rapidamente as fortalezas e os gaps das equipes e mantê-las alinhadas, contribuindo para a melhoria da experiência dos colaboradores da organização.</p><p>É papel da liderança promover e garantir que a gestão de desempenho ocorra na prática (durante a rotina de trabalho) de forma contínua, ao longo de todo o ciclo de gente. Para que isso ocorra, a liderança deve ser acessível e próxima, atuando de forma ativa a participativa na gestão e desenvolvimento do time, oferecendo acompanhamento, orientação/direcionamento e formação, com base nas necessidades, aspirações e particularidades individuais e coletivas do time. Avalie se o assunto 'gente' está  inserido na agenda da liderança da sua empresa de forma definitiva e  recorrente, investindo tempo e enegia necessária para contribir forma efetiva com a melhoria da performance dos colaboradores.</p><p>Quando pensamos em desenvolvimento de pessoas, mais um fator importante deve ser levado em consideração (além do apoio da liderança): o PROTAGONISMO das PESSOAS! Por isso, é essencial que a sua empresa garanta a capacitação de todos e atue na promoção contínua de ações que reforçem o engajamento das mesmas acerca do processo de gestão de desempenho. O desenvolvimento só acontece se as pessoas se comprometerem e entenderem o valor que este processo agrega.</p>",
            "C" : "<p>Reflita se a gestão de desempenho está conectada  com todas as fases da jornada do colaborador (employee experience). A gestão de desempenho deve ser vista um grande 'guarda-chuva', que retroalimenta e possuí interface com a gestão de pessoas como um todo. Sendo assim, a gestão de desempenho não deve se limitar apenas ao processo avaliativo (AVD, reuniões de gente, devolutivas, PDI, dentre outras práticas...), que ocorrem de forma pontual em um ou mais momentos do ano. O processo avaliativo deve ser visto como uma etapa da gestão de desempenho, que permite a mesuração e formalização do desempenho obtido. No entando, as entradas e saídas da gestão de desempenho, devem ser considerados como inputs para outros processos, tais como: Atração & Seleção, Onboarding, Treinamento & Desenvolvimento, Avaliação de Desempenho, Potencial Carreira e Sucessão, Reconhecimento, dentre outros.</p><p>Como está o  preparo e a atuação da liderança na promoção e no apoio a condução deste processo? É crucial ter clareza sobre os papéis & responsabilidades de todos os agentes envolvidos na gestão de desempenho. É papel da liderança promover e garantir que a gestão de desempenho ocorra na prática (durante a rotina de trabalho) de forma contínua, ao longo de todo o ciclo de gente. Para que isso ocorra, a liderança deve ser acessível e próxima, atuando de forma ativa a participativa na gestão e desenvolvimento do time, oferecendo acompanhamento, orientação/direcionamento e formação, com base nas necessidades, aspirações e particularidades individuais e coletivas do time. No entando, essa postura exige maturidade, preparo e comprometimento da liderança. Dica de ouro: avalie o comportamento da liderança da sua empresa e invista energia e tempo na capacitação e sensibilização dos mesmos, para que o assunto 'gente' seja inserido na agenda da liderança de forma definitiva e  recorrente. Além disso, busque uma ferramenta/sistema que apoie e facilite essa gestão.</p><p>Quando pensamos em desenvolvimento de pessoas, mais um fator importante deve ser levado em consideração (além do apoio da liderança): o PROTAGONISMO das PESSOAS! Parece óbvio, mas aqui estamos falando da disposição, do desejo de melhorar e do engajamento das pessoas para se autodesenvolverem. Por mais que a sua empresa forneça condições e recursos para isso, o desenvolvimento só acontece se as pessoas se comprometerem e entenderem o valor que este processo pode agregar. Por isso, é extremamente importante que os colaboradores também sejam capacitados e sensibilizados acerca da importancia da gestão de desempenho. Se a sua empresa optar por um processo centrado nas pessoas, lembre-se de a principal saída deste processo são os planos de desenvolvimento individual/coletivo do time, com o objetivo de reforçar as fortalezas e desenvolver os pontos de melhoria identificados no processo avaliativo. Por isso, o protagonismo, a dedicação e o compromisso de todos com a gestão de desempenho e com o seu próprio desenvolvimento, também é considerado um fator critico de sucesso.</p>",
            "D" : "<p>Reflita se a gestão de desempenho está conectada  com todas as fases da jornada do colaborador (employee experience). A gestão de desempenho deve ser vista um grande 'guarda-chuva', que retroalimenta e possuí interface com a gestão de pessoas como um todo. Sendo assim, a gestão de desempenho não deve se limitar apenas ao processo avaliativo (AVD, reuniões de gente, devolutivas, PDI, dentre outras práticas...), que ocorrem de forma pontual em um ou mais momentos do ano. O processo avaliativo deve ser visto como uma etapa da gestão de desempenho, que permite a mesuração e formalização do desempenho obtido. No entando, as entradas e saídas da gestão de desempenho, devem ser considerados como inputs para outros processos, tais como: Atração & Seleção, Onboarding, Treinamento & Desenvolvimento, Avaliação de Desempenho, Potencial Carreira e Sucessão, Reconhecimento, dentre outros.</p><p>Como está o  preparo e a atuação da liderança na promoção e no apoio a condução deste processo? É crucial ter clareza sobre os papéis & responsabilidades de todos os agentes envolvidos na gestão de desempenho. É papel da liderança promover e garantir que a gestão de desempenho ocorra na prática (durante a rotina de trabalho) de forma contínua, ao longo de todo o ciclo de gente. Para que isso ocorra, a liderança deve ser acessível e próxima, atuando de forma ativa a participativa na gestão e desenvolvimento do time, oferecendo acompanhamento, orientação/direcionamento e formação, com base nas necessidades, aspirações e particularidades individuais e coletivas do time. No entando, essa postura exige maturidade, preparo e comprometimento da liderança. Dica de ouro: avalie o comportamento da liderança da sua empresa e invista energia e tempo na capacitação e sensibilização dos mesmos, para que o assunto 'gente' seja inserido na agenda da liderança de forma definitiva e  recorrente. Além disso, busque uma ferramenta/sistema que apoie e facilite essa gestão.</p><p>Quando pensamos em desenvolvimento de pessoas, mais um fator importante deve ser levado em consideração (além do apoio da liderança): o PROTAGONISMO das PESSOAS! Parece óbvio, mas aqui estamos falando da disposição, do desejo de melhorar e do engajamento das pessoas para se autodesenvolverem. Por mais que a sua empresa forneça condições e recursos para isso, o desenvolvimento só acontece se as pessoas se comprometerem e entenderem o valor que este processo pode agregar. Por isso, é extremamente importante que os colaboradores também sejam capacitados e sensibilizados acerca da importancia da gestão de desempenho. Se a sua empresa optar por um processo centrado nas pessoas, lembre-se de a principal saída deste processo são os planos de desenvolvimento individual/coletivo do time, com o objetivo de reforçar as fortalezas e desenvolver os pontos de melhoria identificados no processo avaliativo. Por isso, o protagonismo, a dedicação e o compromisso de todos com a gestão de desempenho e com o seu próprio desenvolvimento, também é considerado um fator critico de sucesso.</p>"
          }
          ]    
        },
        {                
          "tema" : "Decisão",    
          "textos_class" : [
          {
            "A" : "<p>A gestão de desempenho da sua empresa é efetiva na formação de um pipeline de gente estruturado, que suporte as necessidades das pessoas e do negócios para o curto, médio e longo prazo? Para isso, reflita: as movimentações, ações de reconhecimento, carreira e sucessão da sua empresa estão coerentes e fundamentadas na performance obtida pelos colaboradores? Os dados levados em consideração para apoiar essa decisão, garantem que a mesma seja feita de forma mais justa, imparcial e alinhadas com as necessidades do negócio? A liderança apoia, tem autonomia e/ou contribui com este processo de alguma forma? As pessoas se sentem valorizadas e possuem uma perspectiva clara de carreira, com suas aspirações e expectativas sendo levadas em consideração? Dica: aprofunde essas questões dentro do seu processo e invista em people analytics (algoritmo para cruzamento de dados e geração de hipóteses) para ganhar tempo na geração dos insumos necessários, que garantam uma tomada de decisão bem embasada e assertiva.</p>",
            "B" : "<p>A gestão de desempenho da sua empresa é efetiva na formação de um pipeline de gente estruturado, que suporte as necessidades das pessoas e do negócios para o curto, médio e longo prazo? Para isso, reflita: as movimentações, ações de reconhecimento, carreira e sucessão da sua empresa estão coerentes e fundamentadas na performance obtida pelos colaboradores? Os dados levados em consideração para apoiar essa decisão, garantem que a mesma seja feita de forma mais justa, imparcial e alinhadas com as necessidades do negócio? A liderança apoia, tem autonomia e/ou contribui com este processo de alguma forma? As pessoas se sentem valorizadas e possuem uma perspectiva clara de carreira, com suas aspirações e expectativas sendo levadas em consideração? Dica: aprofunde essas questões dentro do seu processo e invista em people analytics (algoritmo para cruzamento de dados e geração de hipóteses) para ganhar tempo na geração dos insumos necessários, que garantam uma tomada de decisão bem embasada e assertiva.</p>",
            "C" : "<p>Tenho em vista que a gestão de desempenho é um processo altamente crítico e estratégico para o futuro do negócio e de seus colaboradores, é preciso entender e avaliar se o modelo adotado pela sua empresa gera todos os insumos necessários para garantir uma tomada de decisão bem embasada e assertiva. Para isso, reflita: as movimentações, ações de reconhecimento, carreira e sucessão da sua empresa estão coerentes e fundamentadas na performance obtida pelos colaboradores? Os dados levados em consideração para apoiar essa decisão, garantem que a mesma seja feita de forma mais justa, imparcial e alinhadas com as necessidades do negócio? A liderança apoia, tem autonomia e/ou contribui com este processo de alguma forma? As pessoas se sentem valorizadas e possuem uma perspectiva clara de carreira, com suas aspirações e expectativas sendo levadas em consideração?  Se alguma das respostas anteriores for não, é provavel que a gestão de desempenho da sua empresa não seja efetiva na formação de um pipeline de gente estruturado, que suporte as necessidades das pessoas e do negócios para o curto, médio e longo prazo.  Aprofunde essas questões dentro do seu processo e invista em ferramentas/recursos que possam apoiar na consolidação de dados, gerando insumos para essas decisões. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p>",
            "D" : "<p>Tenho em vista que a gestão de desempenho é um processo altamente crítico e estratégico para o futuro do negócio e de seus colaboradores, é preciso entender e avaliar se o modelo adotado pela sua empresa gera todos os insumos necessários para garantir uma tomada de decisão bem embasada e assertiva. Para isso, reflita: as movimentações, ações de reconhecimento, carreira e sucessão da sua empresa estão coerentes e fundamentadas na performance obtida pelos colaboradores? Os dados levados em consideração para apoiar essa decisão, garantem que a mesma seja feita de forma mais justa, imparcial e alinhadas com as necessidades do negócio? A liderança apoia, tem autonomia e/ou contribui com este processo de alguma forma? As pessoas se sentem valorizadas e possuem uma perspectiva clara de carreira, com suas aspirações e expectativas sendo levadas em consideração?  Se alguma das respostas anteriores for não, é provavel que a gestão de desempenho da sua empresa não seja efetiva na formação de um pipeline de gente estruturado, que suporte as necessidades das pessoas e do negócios para o curto, médio e longo prazo.  Aprofunde essas questões dentro do seu processo e invista em ferramentas/recursos que possam apoiar na consolidação de dados, gerando insumos para essas decisões. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift. </p>"
          }
          ]    
        },
        {      
          "tema" : "Comunicação",         
          "textos_class" : [
          {
            "A" : "<p>É de suma importância que as pessoas tenham clareza sobre todo o funcionamento, investimento (principalmente de tempo/energia) e caminho percorrido pela empresa e profissionais envolvidos para assergurar a seriedade, qualidade e efetividade deste processo. Para isso, garanta que a gestão de desempenho da sua empresa seja sempre bem comunicada e entendida por todos em toda a sua amplitude/abrangência (dimensões avaliadas, critérios, regras, etapas, etc.), proprocionando visibilidade acerca do andamento e resultados obtidos no processo avaliativo, após o encerramento do mesmo. Novamente, a tecnologia pode ser uma grande facilitadora deste quesito. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p><p>O fluxo de comunicação e troca constante entre líderes, liderados e equipes ao longo do ciclo de gente, é fundamental para garantir a efetividade da gestão de desempenho . Lembre-se de que, em linhas gerais, a gestão de desempenho nada mais é do que um conjunto de práticas colaborativas, no qual o olhar do outro ajuda a melhorar o seu. Verifique se rotinas de alinhamento adotadas pela sua empresa são cumpridas corretamente, reforçando essa interação entre os profissionais, por meio de conversas frequentes e transparentes com foco no desenvolvimento.</p>",
            "B" : "<p>É de suma importância que as pessoas tenham clareza sobre todo o funcionamento, investimento (principalmente de tempo/energia) e caminho percorrido pela empresa e profissionais envolvidos para assergurar a seriedade, qualidade e efetividade deste processo. Para isso, garanta que a gestão de desempenho da sua empresa seja sempre bem comunicada e entendida por todos em toda a sua amplitude/abrangência (dimensões avaliadas, critérios, regras, etapas, etc.), proprocionando visibilidade acerca do andamento e resultados obtidos no processo avaliativo, após o encerramento do mesmo. Novamente, a tecnologia pode ser uma grande facilitadora deste quesito. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p><p>O fluxo de comunicação e troca constante entre líderes, liderados e equipes ao longo do ciclo de gente, é fundamental para garantir a efetividade da gestão de desempenho . Lembre-se de que, em linhas gerais, a gestão de desempenho nada mais é do que um conjunto de práticas colaborativas, no qual o olhar do outro ajuda a melhorar o seu. Verifique se rotinas de alinhamento adotadas pela sua empresa são cumpridas corretamente, reforçando essa interação entre os profissionais, por meio de conversas frequentes e transparentes com foco no desenvolvimento.</p>",
            "C" : "<p>Avalie se a gestão de desempenho da sua empresa é, de fato, bem comunicada e entendida por todos em toda a sua amplitude/abrangência (dimensões avaliadas, critérios, regras, etapas, etc.), proprocionando visibilidade acerca do andamento e resultados obtidos no processo avaliativo, após o encerramento do mesmo. É de suma importância que as pessoas tenham clareza sobre todo o funcionamento, investimento (principalmente de tempo/energia) e caminho percorrido pela empresas e profissionais envolvidos para assergurar a seriedade, qualidade e efetividade deste processo. Novamente, a tecnologia pode ser uma grande facilitadora deste quesito. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p><p>Verifique a necessidade de promover e/ou aprimorar o fluxo de comunicação e troca constante entre líderes, liderados e equipes ao longo do ciclo de gente. Lembre-se de que, em linhas gerais, a gestão de desempenho nada mais é do que um conjunto de práticas colaborativas, no qual o olhar do outro ajuda a melhorar o seu. Dica de ouro: estabeleça e implemente rotinas que reforcem essa interação entre os profissionais, por meio de conversas frequentes e transparentes, focadas em desenvolvimento.</p>",
            "D" : "<p>Avalie se a gestão de desempenho da sua empresa é, de fato, bem comunicada e entendida por todos em toda a sua amplitude/abrangência (dimensões avaliadas, critérios, regras, etapas, etc.), proprocionando visibilidade acerca do andamento e resultados obtidos no processo avaliativo, após o encerramento do mesmo. É de suma importância que as pessoas tenham clareza sobre todo o funcionamento, investimento (principalmente de tempo/energia) e caminho percorrido pela empresas e profissionais envolvidos para assergurar a seriedade, qualidade e efetividade deste processo. Novamente, a tecnologia pode ser uma grande facilitadora deste quesito. Clique <a href='/' target='_blank'>aqui</a> para saber mais sobre os diferenciais do lift.</p><p>Verifique a necessidade de promover e/ou aprimorar o fluxo de comunicação e troca constante entre líderes, liderados e equipes ao longo do ciclo de gente. Lembre-se de que, em linhas gerais, a gestão de desempenho nada mais é do que um conjunto de práticas colaborativas, no qual o olhar do outro ajuda a melhorar o seu. Dica de ouro: estabeleça e implemente rotinas que reforcem essa interação entre os profissionais, por meio de conversas frequentes e transparentes, focadas em desenvolvimento.</p>"
          }
          ]    
        },
        {
          "tema" : "Resultado Geral",
          "textos_class" : [
          {
            "A" : "<p>A Gestão de Desempenho tem sido um dos temas mais desafiadores e priorizados nos últimos anos, por se tratar de um processo extremamente crítico para alavancar a estratégia das organizações, em meio a um cenário global de negócios cada vez mais complexos, voláteis e disruptivos.</p><p>Pensando nisso, se faz cada vez mais importante e necessário direcionar, acompanhar e mensurar o desempenho das pessoas com dinamismo, constância e eficácia, por meio de práticas construtivas e colaborativas, que promovam de fato o desenvolvimento contínuo dos colaboradores.</p><p>Você sabia que a consultoria Falconi, além de atuar com soluções de gestão e tecnologia, também possui um portfólio completo com soluções de gestão de pessoas? Clique <a href='/' target='_blank'>aqui</a> para consultar um de nossos especialistas!</p>",
            "B" : "<p>A Gestão de Desempenho tem sido um dos temas mais desafiadores e priorizados nos últimos anos, por se tratar de um processo extremamente crítico para alavancar a estratégia das organizações, em meio a um cenário global de negócios cada vez mais complexos, voláteis e disruptivos.</p><p>Pensando nisso, se faz cada vez mais importante e necessário direcionar, acompanhar e mensurar o desempenho das pessoas com dinamismo, constância e eficácia, por meio de práticas construtivas e colaborativas, que promovam de fato o desenvolvimento contínuo dos colaboradores.</p><p>Você sabia que a consultoria Falconi, além de atuar com soluções de gestão e tecnologia, também possui um portfólio completo com soluções de gestão de pessoas? Clique <a href='/' target='_blank'>aqui</a> para consultar um de nossos especialistas!</p>",
            "C" : "<p>A Gestão de Desempenho tem sido um dos temas mais desafiadores e priorizados nos últimos anos, por se tratar de um processo extremamente crítico para alavancar a estratégia das organizações, em meio a um cenário global de negócios cada vez mais complexos, voláteis e disruptivos.</p><p>Pensando nisso, se faz cada vez mais importante e necessário direcionar, acompanhar e mensurar o desempenho das pessoas com dinamismo, constância e eficácia, por meio de práticas construtivas e colaborativas, que promovam de fato o desenvolvimento contínuo dos colaboradores.</p><p>Você sabia que a consultoria Falconi, além de atuar com soluções de gestão e tecnologia, também possui um portfólio completo com soluções de gestão de pessoas? Clique <a href='/' target='_blank'>aqui</a> para consultar um de nossos especialistas!</p>",
            "D" : "<p>A Gestão de Desempenho tem sido um dos temas mais desafiadores e priorizados nos últimos anos, por se tratar de um processo extremamente crítico para alavancar a estratégia das organizações, em meio a um cenário global de negócios cada vez mais complexos, voláteis e disruptivos.</p><p>Pensando nisso, se faz cada vez mais importante e necessário direcionar, acompanhar e mensurar o desempenho das pessoas com dinamismo, constância e eficácia, por meio de práticas construtivas e colaborativas, que promovam de fato o desenvolvimento contínuo dos colaboradores.</p><p>Você sabia que a consultoria Falconi, além de atuar com soluções de gestão e tecnologia, também possui um portfólio completo com soluções de gestão de pessoas? Clique <a href='/' target='_blank'>aqui</a> para consultar um de nossos especialistas!</p>"
          }
          ]
        },
        ] };

      $('#resultado .itens').html('');
      $('#resultado .resumo').prepend('<h2 class="nome">'+jsonres['nome_usuario']+',</h2>');

      let arrayres = jsonres['resultados'];

      console.log(retorno);

      for(var i = 0; i < arrayres.length; i++) {
        $('#resultado .itens').append(`
          <div class="${arrayres[i]['tema'] == 'Resultado Geral' ? 'resgeral' : ''} item ${(arrayres[i]['classificacao']).toLowerCase()}" tema="${arrayres[i]['tema']}" classificacao="${arrayres[i]['classificacao']}">
          <div class="top">
          <span class="tema">${arrayres[i]['tema']}</span>
          <span>${arrayres[i]['nivel']}</span>
          <span class="classif">${arrayres[i]['classificacao']}</span>
          <span class="porcentagem">${arrayres[i]['porcentagem']}<span class="barra"><span class="percent" style="width: ${arrayres[i]['porcentagem']}"></span></span></span>    
    <i class="fas fa-angle-down"></i>
          </div>
          </div>
          `);
      }

      $('#resultado .item .top').on('click', function(){
        $(this).parent().toggleClass('open');
      });


      let arraytextos = textos['textos'];
      for(var j = 0; j < arraytextos.length; j++) {
        if(arraytextos[j]['textos_class']) {
          $('#resultado .item[tema="'+arraytextos[j]['tema']+'"]').append(`
            <div class="texto">${arraytextos[j]['textos_class'][0][$('#resultado .item[tema="'+arraytextos[j]['tema']+'"]').attr('classificacao')]}</div>
            `);
        }
      }

      $('#resultado .imprimir').on('click', function(){
        window.print();
        return false;
      });

      $('#resultado .imprimir').prop('disabled', false);
    
    }
    
  }


  function finaliza_chat() {

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      dataType: "json",
      data: {
        action : 'tratamento',
        finalizar_chat: $('#json-gerado').attr("data-json")
      },
      success: function(result) {
        set_cookie('chatbot_status', 'finalizado');
        document.location.reload(true);
      }
    });
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
      url: ajax_object.ajax_url,
      type: 'POST',
      dataType: "json",
      data: {
        action : 'tratamento',
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

      if($('.message-input').attr('name') == 'email'){
        set_cookie('chatbot_useremail', msg);
      }

      user_mensagens(step, msg);

    } else if ($('.questions .question').length > 0) {

      msg = $('.questions input:checked').siblings('label').html();

      user_mensagens(step, msg);
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

  function user_mensagens(step, msg) {

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      dataType: "json",
      data: {
        action : 'tratamento',
        step,
        msg,
        json_gerado: $('#json-gerado').attr("data-json")
      },
      success: function(result) {
        console.log('%c '+result['json_gerado'] , 'background-color: black; color: red');
        $('<div class="message message-personal"><div class="msg">' + result['msg'] + '</div></div>').appendTo($('.mCSB_container')).addClass('new');
        reload_time();
        $('#json-gerado').attr("data-json", result['json_gerado']);
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
      url: ajax_object.ajax_url,
      type: 'POST',
      dataType: "json",
      data: {
        action: 'tratamento',
        step
      },
      success: function(result) {

        let data = result['data'];
        let next_step = result['next_step'];
        let count_steps = result['count_steps'];

        stepatual = next_step;
        let previus_step = result['previus_step'];

        $('#step-count').text = next_step;
        $(".progress").css("width", ((next_step) / count_steps) * 100 + '%');
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