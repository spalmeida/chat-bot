var $messages = $('.messages-content'),
d, h, m,
i = 0;

$(window).load(function() {
  $messages.mCustomScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 100);
});

function updateScrollbar() {
  $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
    scrollInertia: 10,
    timeout: 0
  });
}

function setDate() {
  d = new Date()
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
  }
}

function insertMessage() {
  msg = $('.message-input').val();
  if ($.trim(msg) == '') {
    return false;
  }
  $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
  setDate();
  $('.message-input').val(null);
  updateScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 1000 + (Math.random() * 20) * 100);
}

$('.message-submit').click(function() {
  insertMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    insertMessage();
    return false;
  }
}) 


var Fake = [
'Olá, sou a Lilian, assistente virtual da Actio Software. Me conte mais sobre você! Qual é o seu nome e em qual empresa você trabalha?',
'Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade do RH da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa <a href="https://actiosoftware.com/privacidade/">Política de Privacidade</a>',

'1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?'+
questions('a) Ainda não aplicamos processos de gestão de desempenho', 'b) Estamos dando início ao processo de gestão de desempenho', 'c) Já aplicamos o processo estruturado e periódico de gestão de desempenho, mas sabemos que ainda existem pontos de melhoria', 'd) O processo de gestão de desempenho acontece de forma estruturada e periódica na minha empresa' ),

'2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa?'+
questions('a) Ainda não usamos nenhuma ferramenta para auxiliar o processo','b) Estamos em fase de implementação da ferramenta','c) Até usamos, mas não oferece todas as funcionalidades necessárias','d) Já usamos e atende todas as necessidades da empresa'),

'3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?'+
questions('a) Não utilizamos essa prática','b) A prática está sendo implementada nos processos','c) A empresa usa people analytics, mas precisa evoluir','d) Já implementamos a prática do people analytics em nossa gestão de desempenho e funciona perfeitamente'),

'4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?'+
questions('a) Não elegemos líderes e cargos estratégicos com a ajuda da gestão de desempenho','b) Estamos implementando essa opção para tornar cargos estratégicos elegíveis ao processo de gestão de desempenho','c) Alguns cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho. Sabemos que precisamos evoluir neste ponto','d) Sim, os cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho e a prática já demonstra resultados positivos'),

'5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?'+
questions('a) Nenhum cargo é elegível por meio de práticas de gestão de desempenho','b) Estamos implementando práticas de gestão de desempenho em nossa organização','c) Já usamos a gestão de desempenho para eleger níveis hierárquicos (não líderes) em nossa empresa, mas precisamos evoluir no processo','d) Os demais cargos e níveis hierárquicos (não líderes) são elegíveis por meio de práticas de gestão de desenvolvimento e isso já apresenta resultados positivos para a organização'),

'6: Na sua empresa, acontecem autoavaliações com atribuição de pesos? '+
questions('a) Não usamos autoavaliações em nossa empresa','b) Estamos implementando as autoavaliações com atribuição de pesos','c) Realizamos autoavaliações, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com a autoavaliação com atribuição de pesos e o processo flui perfeitamente'),

'7: Além disso, acontecem avaliações de líderes com atribuição de pesos?'+
questions('a) Não realizamos avaliações de líderes','b) Estamos implementando as avaliações de líderes com atribuição de pesos','c) Realizamos avaliações de líderes, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de líderes com atribuição de pesos e o processo flui perfeitamente'),

'8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?'+
questions('a) Não realizamos avaliações de liderados','b) Estamos implementando as avaliações de liderados com atribuição de pesos','c) Realizamos avaliações de liderados, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de liderados com atribuição de pesos e o processo flui perfeitamente'),

'9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?'+
questions('a) Não realizamos avaliações de pares','b) Estamos implementando as avaliações de pares com atribuição de pesos','c) Realizamos avaliações de pares, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir','d) Já trabalhamos com avaliações de pares com atribuição de pesos e o processo flui perfeitamente'),

'10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?'+
questions('a) Não realizamos a contratação de desempenho/metas','b) Estamos dando início ao processo de gestão de desempenho, iniciando assim, a contratação de desempenho/metas','c) Já realizamos a contratação de desempenho/metas, porém, temos muito a evoluir','d) Atualmente, usamos a contratação de desempenho/metas e o processo acontece com muita eficiência'),

'Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?',

'11: Vamos lá, faltam algumas perguntas para concluirmos o diagnóstico. A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?'+
questions('a) Não usamos um modelo definido de competências','b) Estamos no estágio de definição das competências','c) Utilizamos/analisamos as competências, porém, não temos um modelo definido','d) Já colocamos em prática um modelo definido de competências e ele funciona muito bem'),

'12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?'+
questions('a) O desdobramento de metas não existe em minha empresa','b) Estamos desenvolvendo o desdobramento de metas individuais e/ou coletivas em minha empresa','c) Já possuímos os desdobramentos de metas individuais e/ou coletivas, mas precisamos melhorar sua aplicação','d) Em minha empresa, contamos com o desdobramento de metas individuais e/ou coletivas e elas atendem as expectativas'),

'13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?'+
questions('a) Não realizamos a análise dos KPIs','b) Estamos estabelecendo quais serão os KPIs para análise','c) Já definimos quais serão os KPIs a serem analisados, porém, isso ainda não acontece com efetividade','d) Acompanhamos periodicamente os KPIs colhidos por meio da avaliação de resultados, que acontece periodicamente'),

'14: Na sua empresa, a avaliação de potencial é colocada em prática?'+
questions('a) Não realizamos a avaliação de potencial','b) Estamos em fase de implementação da avaliação de potencial','c) Já temos uma avaliação de potencial, mas existem pontos a serem melhorados para a sua aplicação','d) Realizamos a análise de potencial e ela acontece com eficiência'),

'15: Existe uma escala de avaliação?'+
questions('a) Não contamos com nenhuma escala de avaliação','b) Estamos estudando quais escalas de avaliação utilizar','c) Já temos uma escala de avaliação, porém, existem pontos a melhorar','d) Usamos uma escala de avaliação para analisar os resultados obtidos e isso funciona muito bem'),

'16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?'+
questions('a) Os líderes não possuem essa rotina','b) Estamos estruturando a rotina de acompanhamento entre o líder e os liderados','c) Os líderes realizam o acompanhamento, porém, não acontecem de forma periódica e acaba sendo ineficaz','d) O acompanhamento entre o líder e o liderado acontece periodicamente ao longo do ciclo'),

'17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?'+
questions('a) Os líderes não possuem a prática de registrar as evidências durante o dia a dia','b) Estamos implementando essa cultura com os líderes','c) Os líderes anotam as evidências, mas o processo ainda é ineficiente e precisa ser aprimorado','d) Os líderes fazem as anotações das evidências no dia a dia e não deixam tudo para o final do ciclo'),

'18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?'+
questions('a) Não, pois ainda não aplicamos reconhecimento diferenciado para os profissionais com melhor performance','b) Estamos começando a divulgar essa informação de maneira mais estruturada','c) Apesar de aplicarmos o reconhecimento diferenciado para os profissionais com melhor performance, nem todos os colaboradores sabem sobre o assunto','d) Nossos colaboradores já sabem sobre o reconhecimento diferenciado para profissionais com melhor performance. Isso até os deixou mais engajados e produtivos'),

'19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?'+
questions('a) Não realizamos feedback contínuo','b) Estamos implementando o feedback contínuo em nosso cotidiano de trabalho','c) O feedback contínuo já é uma realidade em nossa empresa, porém, precisamos aperfeiçoar o processo','d) Já realizamos o feedback contínuo no dia a dia de trabalho. Isso está sendo muito importante para direcionar o desempenho dos colaboradores'),

'Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?',

'20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?'+
questions('a) Essas ações não são tratadas em nossa empresa','b) Estamos implementando ambas as ações em nosso cotidiano','c) As ações ainda não acontecem em momentos distintos em nossa empresa','d) As ações de PDI e carreira acontecem em momentos distintos em nossa organização'),

'21: O avaliado registra sobre o processo de feedback e feedfoward?'+
questions('a) Não realizamos feedback e feedfoward','b) Estamos implementando o processo de feedback feedfoward','c) Apesar do feedback e feedfoward acontecerem, o avaliado não registra sobre','d) O avaliado registra sobre o processo de feedback e feedfoward'),

'22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?'+
questions('a) Não realizamos gestão de desempenho','b) Estamos implementando a gestão de desempenho','c) O líder só tem acesso aos resultados no final do processo de gestão de desempenho','d) O líder acompanha os resultados da gestão de desempenho on time'),

'23: Sua empresa tem visibilidade do Pipeline de Liderança?'+
questions('a) Não temos Pipeline de Liderança','b) Estamos implementando o Pipeline de Liderança','c) O Pipeline de Liderança é uma realidade em nossa empresa, mas precisa ser aprimorado','d) A nossa empresa tem total visibilidade do Pipeline de Liderança'),

'24: O PDI é algo obrigatório para todos os níveis da organização?'+
questions('a) Não usamos PDI','b) Estamos implementando o PDI em nossa empresa','c) O PDI é uma realidade em nossa organização, mas ainda não acontece em todos os níveis','d) Todos os níveis da organização usam o PDI'),

'Chegou a hora de gerar o diagnóstico de maturidade de gestão de desenvolvimento da sua empresa. Veja!'

]

//questions('','','','')

function questions(question_a, question_b, question_c, question_d){
  let questions = `
  <div class="questions" id="questions">

  <div class="question">
  <input type="radio" name="question" id="question_a">
  <label for="question_a">`+question_a+`</label>
  </div>

  <div class="question">
  <input type="radio" name="question" id="question_b">
  <label for="question_b">`+question_b+`</label>
  </div>

  <div class="question">
  <input type="radio" name="question" id="question_c">
  <label for="question_c">`+question_c+`</label>
  </div>

  <div class="question">
  <input type="radio" name="question" id="question_d">
  <label for="question_d">`+question_d+`</label>
  </div>
  
  </div>
  `;
  return questions;
}

function fakeMessage() {
  if ($('.message-input').val() != '') {
    return false;
  }
  $('<div class="message loading new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure><span></span></div>').appendTo($('.mCSB_container')).addClass('new');
  updateScrollbar();

  setTimeout(function() {
    $('.message.loading').remove();
    $('<div class="message new"><figure class="avatar"><img src="https://raw.githubusercontent.com/sabasan13/sabasan13.github.io/master/fakemessage-profile.jpg" alt=""></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
    i++;
  }, 1000 + (Math.random() * 20) * 100);
}