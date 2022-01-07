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
  '1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?',
  'Not too bad, thanks',
  'What do you do?',
  'That\'s awesome',
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