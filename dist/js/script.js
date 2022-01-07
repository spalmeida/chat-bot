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

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),

'Bye'+
questions('','','',''),
':)'
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