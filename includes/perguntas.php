<?php 

$perguntas = [

    "perguntas" => [
        [
            "id" => "",
            "texto" => "Olá, sou a Lilian, assistente virtual da <b>Actio Software</b>. Me conte mais sobre você! Qual é o seu nome?",
            "tema" => "",
            "input_name" => "nome",
            "alternativas" => FALSE,
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => "Certo! Em qual empresa você trabalha?",
            "tema" => "",
            "input_name" => "empresa",
            "alternativas" => FALSE,
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => "Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade da Gestão de Desempenho da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa <a target='_blank' href='https://actiosoftware.com/privacidade/'>Política de Privacidade</a>",
            "tema" => "lgpd",
            "input_name" => "lgpd",
            "alternativas" => [
                "a" => [
                    "texto" => "Ok, vamos lá! Eu concordo com as Políticas de Privacidade da Actio Software.",
                    "peso" => "",
                    "resposta" => ""
                ]
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?',
            "tema" => "Processo",
            "alternativas" => [
                "a" => [
                    "texto" => "Ainda não aplicamos processos de gestão de desempenho",
                    "peso" => 63,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos dando início ao processo de gestão de desempenho",
                    "peso" => 42,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já aplicamos o processo estruturado e periódico de gestão de desempenho, mas sabemos que ainda existem pontos de melhoria",
                    "peso" => 21,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "O processo de gestão de desempenho acontece de forma estruturada e periódica na minha empresa",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa?',
            "tema" => "Recursos",
            "alternativas" => [
                "a" => [
                    "texto" => "Ainda não usamos nenhuma ferramenta para auxiliar o processo",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos em fase de implementação da ferramenta",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Até usamos, mas não oferece todas as funcionalidades necessárias",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já usamos e atende todas as necessidades da empresa",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],


        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?',
            "tema" => "Recursos",
            "alternativas" => [
                "a" => [
                    "texto" => "Não utilizamos essa prática",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "A prática está sendo implementada nos processos",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "A empresa usa people analytics, mas precisa evoluir",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já implementamos a prática do people analytics em nossa gestão de desempenho e funciona perfeitamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?',
            "tema" => "Cargos Elegíveis",
            "alternativas" => [
                "a" => [
                    "texto" => "Não elegemos líderes e cargos estratégicos com a ajuda da gestão de desempenho",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando essa opção para tornar cargos estratégicos elegíveis ao processo de gestão de desempenho",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Alguns cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho. Sabemos que precisamos evoluir neste ponto",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Sim, os cargos estratégicos e líderes são elegíveis ao processo de gestão de desempenho e a prática já demonstra resultados positivos",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?',
            "tema" => "Cargos Elegíveis",
            "alternativas" => [
                "a" => [
                    "texto" => "Nenhum cargo é elegível por meio de práticas de gestão de desempenho",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando práticas de gestão de desempenho em nossa organização",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já usamos a gestão de desempenho para eleger níveis hierárquicos (não líderes) em nossa empresa, mas precisamos evoluir no processo",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Os demais cargos e níveis hierárquicos (não líderes) são elegíveis por meio de práticas de gestão de desenvolvimento e isso já apresenta resultados positivos para a organização",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '6: Na sua empresa, acontecem autoavaliações com atribuição de pesos?',
            "tema" => "Modelo de Avaliação",
            "alternativas" => [
                "a" => [
                    "texto" => "Não usamos autoavaliações em nossa empresa",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando as autoavaliações com atribuição de pesos",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Realizamos autoavaliações, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já trabalhamos com a autoavaliação com atribuição de pesos e o processo flui perfeitamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '7: Além disso, acontecem avaliações de líderes com atribuição de pesos?',
            "tema" => "Modelo de Avaliação",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos avaliações de líderes",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando as avaliações de líderes com atribuição de pesos",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Realizamos avaliações de líderes, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já trabalhamos com avaliações de líderes com atribuição de pesos e o processo flui perfeitamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?',
            "tema" => "Modelo de Avaliação",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos avaliações de liderados",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando as avaliações de liderados com atribuição de pesos",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Realizamos avaliações de liderados, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já trabalhamos com avaliações de liderados com atribuição de pesos e o processo flui perfeitamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?',
            "tema" => "Modelo de Avaliação",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos avaliações de pares",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando as avaliações de pares com atribuição de pesos",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Realizamos avaliações de pares, mas não trabalhamos com atribuição de pesos e/ou sabemos que existem pontos a evoluir",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já trabalhamos com avaliações de pares com atribuição de pesos e o processo flui perfeitamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?',
            "tema" => "Contratação de Desempenho",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos a contratação de desempenho/metas",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos dando início ao processo de gestão de desempenho, iniciando assim, a contratação de desempenho/metas",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já realizamos a contratação de desempenho/metas, porém, temos muito a evoluir",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Atualmente, usamos a contratação de desempenho/metas e o processo acontece com muita eficiência",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => "Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?",
            "tema" => "",
            "input_name" => "email",
            "alternativas" => FALSE,
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '11: Vamos lá, faltam algumas perguntas para concluirmos o diagnóstico. A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?',
            "tema" => "Avaliação Competências",
            "alternativas" => [
                "a" => [
                    "texto" => "Não usamos um modelo definido de competências",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos no estágio de definição das competências",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Utilizamos/analisamos as competências, porém, não temos um modelo definido",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já colocamos em prática um modelo definido de competências e ele funciona muito bem",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?',
            "tema" => "Avaliação de Resultados",
            "alternativas" => [
                "a" => [
                    "texto" => "O desdobramento de metas não existe em minha empresa",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos desenvolvendo o desdobramento de metas individuais e/ou coletivas em minha empresa",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já possuímos os desdobramentos de metas individuais e/ou coletivas, mas precisamos melhorar sua aplicação",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Em minha empresa, contamos com o desdobramento de metas individuais e/ou coletivas e elas atendem as expectativas",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?',
            "tema" => "Avaliação de Resultados",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos a análise dos KPIs",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos estabelecendo quais serão os KPIs para análise",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já definimos quais serão os KPIs a serem analisados, porém, isso ainda não acontece com efetividade",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Acompanhamos periodicamente os KPIs colhidos por meio da avaliação de resultados, que acontece periodicamente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '14: Na sua empresa, a avaliação de potencial é colocada em prática?',
            "tema" => "Avaliação de Potencial",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos a avaliação de potencial",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos em fase de implementação da avaliação de potencial",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já temos uma avaliação de potencial, mas existem pontos a serem melhorados para a sua aplicação",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Realizamos a análise de potencial e ela acontece com eficiência",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '15: Existe uma escala de avaliação?',
            "tema" => "Critérios e Régua",
            "alternativas" => [
                "a" => [
                    "texto" => "Não contamos com nenhuma escala de avaliação",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos estudando quais escalas de avaliação utilizar",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Já temos uma escala de avaliação, porém, existem pontos a melhorar",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Usamos uma escala de avaliação para analisar os resultados obtidos e isso funciona muito bem",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?',
            "tema" => "Rotina de acompanhamento",
            "alternativas" => [
                "a" => [
                    "texto" => "Os líderes não possuem essa rotina",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos estruturando a rotina de acompanhamento entre o líder e os liderados",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Os líderes realizam o acompanhamento, porém, não acontecem de forma periódica e acaba sendo ineficaz",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "O acompanhamento entre o líder e o liderado acontece periodicamente ao longo do ciclo",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?',
            "tema" => "Rotina de acompanhamento",
            "alternativas" => [
                "a" => [
                    "texto" => "Os líderes não possuem a prática de registrar as evidências durante o dia a dia",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando essa cultura com os líderes",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Os líderes anotam as evidências, mas o processo ainda é ineficiente e precisa ser aprimorado",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Os líderes fazem as anotações das evidências no dia a dia e não deixam tudo para o final do ciclo",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?',
            "tema" => "Pipeline",
            "alternativas" => [
                "a" => [
                    "texto" => "Não, pois ainda não aplicamos reconhecimento diferenciado para os profissionais com melhor performance",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos começando a divulgar essa informação de maneira mais estruturada",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Apesar de aplicarmos o reconhecimento diferenciado para os profissionais com melhor performance, nem todos os colaboradores sabem sobre o assunto",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Nossos colaboradores já sabem sobre o reconhecimento diferenciado para profissionais com melhor performance. Isso até os deixou mais engajados e produtivos",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?',
            "tema" => "Feedback",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos feedback contínuo",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando o feedback contínuo em nosso cotidiano de trabalho",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "O feedback contínuo já é uma realidade em nossa empresa, porém, precisamos aperfeiçoar o processo",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Já realizamos o feedback contínuo no dia a dia de trabalho. Isso está sendo muito importante para direcionar o desempenho dos colaboradores",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => "Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?",
            "tema" => "",
            "input_name" => "telefone",
            "alternativas" => FALSE,
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?',
            "tema" => "Feedback",
            "alternativas" => [
                "a" => [
                    "texto" => "Essas ações não são tratadas em nossa empresa",
                    "peso" => 18,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando ambas as ações em nosso cotidiano",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "As ações ainda não acontecem em momentos distintos em nossa empresa",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "As ações de PDI e carreira acontecem em momentos distintos em nossa organização",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '21: O avaliado registra sobre o processo de feedback e feedforward?',
            "tema" => "Feedback",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos feedback e feedforward",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando o processo de feedback feedforward",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Apesar do feedback e feedforward acontecerem, o avaliado não registra sobre",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "O avaliado registra sobre o processo de feedback e feedforward",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?',
            "tema" => "Gestão",
            "alternativas" => [
                "a" => [
                    "texto" => "Não realizamos gestão de desempenho",
                    "peso" => 0,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando a gestão de desempenho",
                    "peso" => 0,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "O líder só tem acesso aos resultados no final do processo de gestão de desempenho",
                    "peso" => 0,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "O líder acompanha os resultados da gestão de desempenho on time",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '23: Sua empresa tem visibilidade do Pipeline de Liderança?',
            "tema" => "Pipeline",
            "alternativas" => [
                "a" => [
                    "texto" => "Não temos Pipeline de Liderança",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando o Pipeline de Liderança",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "O Pipeline de Liderança é uma realidade em nossa empresa, mas precisa ser aprimorado",
                    "peso" => 2,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "A nossa empresa tem total visibilidade do Pipeline de Liderança",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],

        /*------------------------------------------------------------------------------------*/

        [
            "id" => "",
            "texto" => '24: O PDI é algo obrigatório para todos os níveis da organização?',
            "tema" => "PDI",
            "alternativas" => [
                "a" => [
                    "texto" => "Não usamos PDI",
                    "peso" => 12,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Estamos implementando o PDI em nossa empresa",
                    "peso" => 8,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "O PDI é uma realidade em nossa organização, mas ainda não acontece em todos os níveis",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Todos os níveis da organização usam o PDI",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        [
            "id" => "",
            "texto" => '<div class="pergunta-finish">Chegou a hora de gerar o diagnóstico de maturidade de gestão de desenvolvimento da sua empresa. Veja!</div><button type="submit" class="message-finish" >Finalizar</button>',
            "tema" => "",
            "input_name" => "",
            "alternativas" => FALSE,
        ],

        /*------------------------------------------------------------------------------------*/
    ]
];
