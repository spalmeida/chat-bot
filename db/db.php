<?php 
error_reporting(E_ERROR | E_PARSE);
 /*
 |--------------------------------------------------------------------------
 | cria a tabela no banco de dados
 |--------------------------------------------------------------------------
 */
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

 global $wpdb;
 $table_name = $wpdb->prefix . "chat_bot";
 $table_name_perguntas = $wpdb->prefix . "chat_bot_perguntas";
 $charset_collate = $wpdb->get_charset_collate();

 $user_respostas = "CREATE TABLE $table_name (
 	id mediumint(9) NOT NULL AUTO_INCREMENT,
 	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
 	nome_usuario tinytext NOT NULL,
 	email_usuario tinytext NOT NULL,
 	empresa_usuario tinytext NOT NULL,
 	telefone_usuario tinytext NOT NULL,
 	json_respostas json NOT NULL,
 	PRIMARY KEY  (id)
 ) $charset_collate;";

 $chat_perguntas = "CREATE TABLE $table_name_perguntas (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    json_perguntas json NOT NULL,

    PRIMARY KEY  (id)
 ) $charset_collate;";

 dbDelta( $user_respostas );
 dbDelta( $chat_perguntas );

 /*
 0&&&Certo! Em qual empresa você trabalha?&&&samuel&&&&&&@@@1&&&Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade do RH da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa Política de Privacidade&&&life&&&&&&@@@2&&&1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?&&&a) Ok, vamos lá! Eu concordo com as Políticas de Privacidade da Actio Software.&&&lgpd&&&@@@3&&&2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa?&&&c) Já aplicamos o processo estruturado e periódico de gestão de desempenho, mas sabemos que ainda existem pontos de melhoria&&&Processo&&&21@@@4&&&3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?&&&c) Até usamos, mas não oferece todas as funcionalidades necessárias&&&Recursos&&&6@@@5&&&4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?&&&d) Já implementamos a prática do people analytics em nossa gestão de desempenho e funciona perfeitamente&&&Recursos&&&0@@@6&&&5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?&&&c) Alguns cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho. Sabemos que precisamos evoluir neste ponto&&&Cargos Elegíveis&&&2@@@7&&&6: Na sua empresa, acontecem autoavaliações com atribuição de pesos?&&&b) Estamos implementando práticas de gestão de desempenho em nossa organização&&&Cargos Elegíveis&&&4@@@8&&&7: Além disso, acontecem avaliações de líderes com atribuição de pesos?&&&c) Realizamos autoavaliações, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir&&&Modelo de Avaliação&&&2@@@9&&&8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?&&&c) Realizamos avaliações de líderes, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir&&&Modelo de Avaliação&&&2@@@10&&&9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?&&&c) Realizamos avaliações de liderados, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir&&&Modelo de Avaliação&&&4@@@11&&&10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?&&&c) Realizamos avaliações de pares, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir&&&Modelo de Avaliação&&&6@@@12&&&Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?&&&b) Estamos dando início ao processo de gestão de desempenho, iniciando assim, a contratação de desempenho/metas&&&Contratação de Desempenho&&&4@@@13&&&11: Vamos lá, faltam algumas perguntas para concluirmos o diagnóstico. A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?&&&samuelprado.a@gmail.com&&&&&&@@@14&&&12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?&&&b) Estamos no estágio de definição das competências&&&Avaliação Competências&&&4@@@15&&&13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?&&&c) Já possuímos os desdobramentos de metas individuais e/ou coletivas, mas precisamos melhorar sua aplicação&&&Avaliação de Resultados&&&4@@@16&&&14: Na sua empresa, a avaliação de potencial é colocada em prática?&&&c) Já definimos quais serão os KPIs a serem analisados, porém, isso ainda não acontece com efetividade&&&Avaliação de Resultados&&&2@@@17&&&15: Existe uma escala de avaliação?&&&b) Estamos em fase de implementação da avaliação de potencial&&&Avaliação de Potencial&&&8@@@18&&&16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?&&&b) Estamos estudando quais escalas de avaliação utilizar&&&Critérios e Régua&&&4@@@19&&&17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?&&&c) Os líderes realizam o acompanhamento, porém, não acontecem de forma periódica e acaba sendo ineficaz&&&Rotina de acompanhamento&&&6@@@20&&&18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?&&&b) Estamos implementando essa cultura com os líderes&&&Rotina de acompanhamento&&&8@@@21&&&19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?&&&c) Apesar de aplicarmos o reconhecimento diferenciado para os profissionais com melhor performance, nem todos os colaboradores sabem sobre o assunto&&&Pipeline&&&4@@@22&&&Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?&&&b) Estamos implementando o feedback contínuo em nosso cotidiano de trabalho&&&Feedback&&&12@@@23&&&20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?&&&15996125413&&&&&&@@@24&&&21: O avaliado registra sobre o processo de feedback e feedforward?&&&b) Estamos implementando ambas as ações em nosso cotidiano&&&Feedback&&&12@@@25&&&22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?&&&b) Estamos implementando o processo de feedback feedforward&&&Feedback&&&8@@@26&&&23: Sua empresa tem visibilidade do Pipeline de Liderança?&&&b) Estamos implementando a gestão de desempenho&&&Gestão&&&0@@@27&&&24: O PDI é algo obrigatório para todos os níveis da organização?&&&b) Estamos implementando o Pipeline de Liderança&&&Pipeline&&&4@@@28&&&Chegou a hora de gerar o diagnóstico de maturidade de gestão de desenvolvimento da sua empresa. Veja!Finalizar&&&a) Não usamos PDI&&&PDI&&&12@@@

 */