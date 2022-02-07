<?php 

 /*
 |--------------------------------------------------------------------------
 | cria a tabela no banco de dados
 |--------------------------------------------------------------------------
 */

/*  global $wpdb;
 $table_name = $wpdb->prefix . "chat_bot"; 
 $charset_collate = $wpdb->get_charset_collate();

 $sql = "CREATE TABLE $table_name (
 	id mediumint(9) NOT NULL AUTO_INCREMENT,
 	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
 	nome_usuario tinytext NOT NULL,
 	email_usuario tinytext NOT NULL,
 	empresa_usuario tinytext NOT NULL,
 	telefone_usuario tinytext NOT NULL,
 	json_respostas json NOT NULL,
 	PRIMARY KEY  (id)
 ) $charset_collate;";

 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql ); */

 /*
 |--------------------------------------------------------------------------
 | insere os valores no banco de dados
 |--------------------------------------------------------------------------
 */
/*  if (isset($_COOKIE['chat_info'])) {

 	$array = json_decode($_COOKIE['chat_info'], true)[0];

 	$wpdb->insert( 
 		$table_name, 
 		array( 
 			'time' => current_time( 'mysql' ), 
 			'nome_usuario' => $array['nome_usuario'], 
 			'email_usuario' => $array['email_usuario'], 
 			'empresa_usuario' => $array['empresa_usuario'], 
 			'telefone_usuario' => $array['telefone_usuario'],
 			'json_respostas' => json_encode($array['perguntas'])
 		) 
 	);

	//unset($_COOKIE['chat_info']);
 	unset($_COOKIE['chat_info']);
 	setcookie('chat_info', null, -1, '/');
 } */

 $finalizar_chat = '0&&&Olá, sou a Lilian, assistente virtual da Actio Software. Me conte mais sobre você! Qual é o seu nome?&&&samuel&&&&&&@@@1&&&Certo! Em qual empresa você trabalha?&&&life&&&&&&@@@2&&&Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade do RH da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa Política de Privacidade&&&a) Ok, vamos lá! Eu concordo com as Políticas de Privacidade da Actio Software.&&&lgpd&&&@@@3&&&1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?&&&b) Estamos dando início ao processo de gestão de desempenho&&&Processo&&&42@@@4&&&2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa?&&&b) Estamos em fase de implementação da ferramenta&&&Recursos&&&12@@@5&&&3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?&&&a) Não utilizamos essa prática&&&Recursos&&&18@@@6&&&4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?&&&d) Sim, os cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho e a prática já demonstra resultados positivos&&&Cargos Elegíveis&&&0@@@7&&&5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?&&&c) Já usamos a gestão de desempenho para eleger níveis hierárquicos (não líderes) em nossa empresa, mas precisamos evoluir no processo&&&Cargos Elegíveis&&&2@@@8&&&6: Na sua empresa, acontecem autoavaliações com atribuição de pesos?&&&b) Estamos implementando as autoavaliações com atribuição de pesos&&&Modelo de Avaliação&&&4@@@9&&&7: Além disso, acontecem avaliações de líderes com atribuição de pesos?&&&a) Não realizamos avaliações de líderes&&&Modelo de Avaliação&&&6@@@10&&&8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?&&&b) Estamos implementando as avaliações de liderados com atribuição de pesos&&&Modelo de Avaliação&&&8@@@11&&&9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?&&&c) Realizamos avaliações de pares, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir&&&Modelo de Avaliação&&&6@@@12&&&10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?&&&d) Atualmente, usamos a contratação de desempenho/metas e o processo acontece com muita eficiência&&&Contratação de Desempenho&&&0@@@13&&&Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?&&&samuelprado.a@gmail.com&&&&&&@@@14&&&11: Vamos lá, faltam algumas perguntas para concluirmos o diagnóstico. A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?&&&a) Não usamos um modelo definido de competências&&&Avaliação Competências&&&6@@@15&&&12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?&&&b) Estamos desenvolvendo o desdobramento de metas individuais e/ou coletivas em minha empresa&&&Avaliação de Resultados&&&8@@@16&&&13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?&&&c) Já definimos quais serão os KPIs a serem analisados, porém, isso ainda não acontece com efetividade&&&Avaliação de Resultados&&&2@@@17&&&14: Na sua empresa, a avaliação de potencial é colocada em prática?&&&d) Realizamos a análise de potencial e ela acontece com eficiência&&&Avaliação de Potencial&&&0@@@18&&&15: Existe uma escala de avaliação?&&&a) Não contamos com nenhuma escala de avaliação&&&Critérios e Régua&&&6@@@19&&&16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?&&&b) Estamos estruturando a rotina de acompanhamento entre o líder e os liderados&&&Rotina de acompanhamento&&&12@@@20&&&17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?&&&c) Os líderes anotam as evidências, mas o processo ainda é ineficiente e precisa ser aprimorado&&&Rotina de acompanhamento&&&4@@@21&&&18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?&&&d) Nossos colaboradores já sabem sobre o reconhecimento diferenciado para profissionais com melhor performance. Isso até os deixou mais engajados e produtivos&&&Pipeline&&&0@@@22&&&19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?&&&a) Não realizamos feedback contínuo&&&Feedback&&&18@@@23&&&Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?&&&15996125413&&&&&&@@@24&&&20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?&&&b) Estamos implementando ambas as ações em nosso cotidiano&&&Feedback&&&12@@@25&&&21: O avaliado registra sobre o processo de feedback e feedforward?&&&c) Apesar do feedback e feedforward acontecerem, o avaliado não registra sobre&&&Feedback&&&4@@@26&&&22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?&&&d) O líder acompanha os resultados da gestão de desempenho on time&&&Gestão&&&0@@@27&&&23: Sua empresa tem visibilidade do Pipeline de Liderança?&&&a) Não temos Pipeline de Liderança&&&Pipeline&&&6@@@28&&&24: O PDI é algo obrigatório para todos os níveis da organização?&&&b) Estamos implementando o PDI em nossa empresa&&&PDI&&&8@@@';
/* FINALIZAR CHAT */
if (isset($finalizar_chat)) {
	$array = explode('@@@', $finalizar_chat);
	$json_gerado = [];
	foreach ($array as $key => $value) {
		$json_gerado[] .= json_encode(explode('&&&', $value), JSON_UNESCAPED_UNICODE);
	}

	if (isset($finalizar_chat)) {
		$array = explode('@@@', $finalizar_chat);
		$json_gerado = [];
		$json_envia = [];

		foreach ($array as $key => $result) {
			foreach (explode('&&&', $result) as $final) {
				$json_gerado[$key][] .= $final;
			}
		}

		foreach ($json_gerado as $json_final) {
			$json_envia[] = [
				'step_id' => $json_final[0],
				'pergunta_texto' => $json_final[1],
				'mensagem_usuario' => $json_final[2],
				'tema' => $json_final[3],
				'peso' => $json_final[4],
			];
		}

		echo json_encode(gerar_relatorio($json_envia, $perguntas), JSON_UNESCAPED_UNICODE);

		//echo json_encode($json_envia, JSON_UNESCAPED_UNICODE);
	}
}

function get_peso_total($perguntas, $tema)
{
	$peso_total = 0;
	foreach ($perguntas['perguntas'] as $pergunta) {
		if (!empty($pergunta['tema'])) {
			if ($pergunta['tema'] == $tema and $tema != 'lgpd') {
				$peso_total += $pergunta['alternativas']['a']['peso'];
			}
		}
	}
	return $peso_total;
}

function get_alternativas_usuario($perguntas, $tema, $resultados)
{
	$pergunta_alternativa_peso = 0;
	foreach ($resultados as $resultado) {

		foreach ($perguntas['perguntas'] as $pergunta) {

			if (!empty($pergunta['tema'])) {
				$alternativa = $resultado['mensagem_usuario'][0];
				if ($pergunta['tema'] == $resultado['tema'] and $resultado['tema'] == $tema and $tema != 'lgpd') {
					$pergunta_alternativa_peso += $pergunta['alternativas'][$alternativa]['peso'];
				}
			}
		}
	}

	return $pergunta_alternativa_peso;
}
function gerar_relatorio($resultados, $perguntas)
{
	$json_envia = [];
	$peso_total = 0;
	$pergunta_alternativa_peso = 0;

	//resultado_usuario tema mensagem_usuario


	foreach ($resultados as $key => $resultado) {
		/* analisando tema */
		if (!empty($resultado['tema'])) {
			$peso_total = get_peso_total($perguntas, $resultado['tema']);
			$pergunta_alternativa_peso = get_alternativas_usuario($perguntas, $resultado['tema'], $resultados);
		}
	}

	return [
		"peso_total" => $peso_total,
		"alternativas_usuario" => $pergunta_alternativa_peso,
		"nome_usuario" => 'samuel',
		"email_usuario" => 'samuelprado.a@gmail.com',
		"telefone_usuario" => '15996125413',
		"empresa_usuario" => 'life',
		"resultados" => [
			[
				"tema" => "tema a",
				"nivel" => "nivel a",
				"classificacao" => "classificacao a",
				"porcentagem" => "porcentagem a",
				"texto" => "texto a",
			],
			[
				"tema" => "tema b",
				"nivel" => "nivel b",
				"classificacao" => "classificacao b",
				"porcentagem" => "porcentagem b",
				"texto" => "texto b",
			],
			[
				"tema" => "tema c",
				"nivel" => "nivel c",
				"classificacao" => "classificacao c",
				"porcentagem" => "porcentagem c",
				"texto" => "texto c",
			],
		],
	];
}