var progresso = 0;
let chat_loading = document.querySelector('#chat_loading');
window.onload = function(){
	let chat_bot = document.querySelector('#bot');
	let question_chat = document.querySelector('#question_chat');
	steps(progresso);

	function steps(step){
		chat_bot.innerHTML = '';
		//document.querySelector('#testes').innerHTML = step;

		switch (step) {
			case 0:
			chat_bot.innerHTML = getImage('bot') +
			`
			<div class="bot-chat">
			<p class="text">`+perguntas[step].apresentacao+`</p>
			<p class="text"><input placeholder="Informe seu nome" class="input" type="text" name="nome"></p>
			<p class="time"> 13:05 </p>
			<button id="next">Próximo</button>
			</div>
			`;
			nextStep(step);
			break;
			case 1:
			chat_bot.innerHTML = getImage('bot') +
			`
			<div class="bot-chat">
			<p class="text"><input placeholder="Informe em qual empresa você trabalha" class="input" type="text" name="empresa"></p>
			<p class="time"> 13:05 </p>
			<button id="next">Próximo</button>
			</div>
			`;
			nextStep(step);
			chat_user('teste');
			break;
			case 2:
			efetuaPergunta(1, step);
			break;
			case 3:
			efetuaPergunta(2, step);
			break;
			case 4:
			efetuaPergunta(3, step);
			break;
			case 5:
			efetuaPergunta(4, step);
			break;
			case 6:
			efetuaPergunta(5, step);
			break;
			case 7:
			efetuaPergunta(6, step);
			break;
			case 8:
			efetuaPergunta(7, step);
			break;
			case 9:
			efetuaPergunta(8, step);
			break;
			case 10:
			efetuaPergunta(9, step);
			break;
			case 11:
			efetuaPergunta(10, step);
			break;
			case 12:
			question_chat.innerHTML = '';
			chat_bot.innerHTML = getImage('bot') +
			`
			<div class="bot-chat">
			<p class="text">`+perguntas[11].email+`</p>
			<p class="text"><input class="input" type="text" name="email"></p>
			<p class="time"> 13:05 </p>
			<button id="next">Próximo</button>
			</div>
			`;
			nextStep(step);
			break;
			case 13:
			efetuaPergunta(12, step);
			break;
			case 14:
			efetuaPergunta(13, step);
			break;
			case 15:
			efetuaPergunta(14, step);
			break;
			case 16:
			efetuaPergunta(15, step);
			break;
			case 17:
			efetuaPergunta(16, step);
			break;
			case 18:
			efetuaPergunta(17, step);
			break;
			case 19:
			efetuaPergunta(18, step);
			break;
			case 20:
			efetuaPergunta(19, step);
			break;
			case 21:
			efetuaPergunta(20, step);
			break;
			case 22:
			question_chat.innerHTML = '';
			chat_bot.innerHTML = getImage('bot') +
			`
			<div class="bot-chat">
			<p class="text">`+perguntas[21].telefone+`</p>
			<p class="text"><input class="input" type="text" name="telefone"></p>
			<p class="time"> 13:05 </p>
			<button id="next">Próximo</button>
			</div>
			`;
			nextStep(step);
			break;
			case 23:
			efetuaPergunta(22, step);
			break;
			case 24:
			efetuaPergunta(23, step);
			break;
			case 25:
			efetuaPergunta(24, step);
			break;
			case 26:
			efetuaPergunta(25, step);
			break;
			case 27:
			efetuaPergunta(26, step);
			break;
			case 28:
			question_chat.innerHTML = '';
			chat_bot.innerHTML = getImage('bot') +
			`
			<div class="bot-chat">
			<p class="text">`+perguntas[27].finalizacao+`</p>
			<p class="time"> 13:05 </p>
			<button id="next">Finalizar</button>
			</div>
			`;
			break;
			default:
				// statements_def
				break;
			}
		}

		function efetuaPergunta(step, next = 0){
			question_chat.innerHTML = '';
			let pergunta = `
			<div class="input-quest" id="question_chat">
			<p>`+perguntas[step].pergunta+`</p>
			</div>

			<div class="input-quest">
			<input type="radio" name="question-`+step+`" id="pergunta-a">
			<label for="pergunta-a">`+perguntas[step].resposta_a+`</label>
			</div>

			<div class="input-quest">
			<input type="radio" name="question-`+step+`" id="pergunta-b">
			<label for="pergunta-b">`+perguntas[step].resposta_b+`</label>
			</div>

			<div class="input-quest">
			<input type="radio" name="question-`+step+`" id="pergunta-c">
			<label for="pergunta-c">`+perguntas[step].resposta_c+`</label>
			</div>

			<div class="input-quest">
			<input type="radio" name="question-`+step+`" id="pergunta-d">
			<label for="pergunta-d">`+perguntas[step].resposta_d+`</label>
			</div>
			<button id="next">Próximo</button>
			`;
			question_chat.innerHTML = pergunta;
			nextStep(next);
		}

		function nextStep(step){

			let nextButton = document.querySelector('#next');

			nextButton.addEventListener('click', function(){
				chat_loading('true', step+1);
			});
		}

		function chat_loading(load = 'none', step = ''){

			document.querySelector('#chat-load').innerHTML = `
			<div class="chat_loading" id="chat_loading" style="display: none;">
			<div class="bot">
			<div class="bot-image">
			<img class="avatar" src="dist/img/bot_avatar.jpg">
			</div>
			<div class="bot-chat">
			<p class="text">Escrevendo . . . </p>
			</div>
			</div>
			</div>
			`;

			if(load == 'none'){
				document.querySelector('#chat_loading').style = "display:none";
			}else{
				question_chat.innerHTML = '';
				chat_bot.innerHTML = '';
				document.querySelector('#chat_loading').style = "display:block";
				timer = setTimeout(function () {
					document.querySelector('#chat_loading').style = "display:none";
					steps(step);
					console.log(step);
				}, 1000);
			}

		}	
	}

	function chat_user(text){
		let chat_user = document.querySelector('#user');
		let mensagem = `
		<div class="user-chat">
		<p class="text">`+text+`</p>
		<p class="time"> 13:06 </p>
		</div>
		<div class="user-image">
		<img class="avatar" src="dist/img/user_avatar.png">
		</div>
		`;

		return chat_user.innerHTML = mensagem;
	}

	function getImage(name, type = 'jpg'){
		let image = `
		<div class="`+name+`-image">
		<img class="avatar" src="dist/img/`+name+`_avatar.`+type+`">
		</div>
		`;
		return image;
	}

	function setBotText(mensagem){
		document.querySelectorAll('#bot')[0].innerHTML = mensagem;
	}