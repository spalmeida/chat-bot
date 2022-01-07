var $messages = $('.messages-content'),
d, h, m,
i = 2;

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

//questions('','','','')

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
'Gdevit is a nice place to stay',
'I think you\'re a nice person',
'Why do you think that?',
'Can you explain?',
'Anyway I\'ve gotta go now',
'It was a pleasure chat with you',
'Time to make a new project',
'Bye',
':)'
]


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