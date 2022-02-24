<?php 

$perguntas = [

    "perguntas" => [
        /*0------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => "Olá, sou a Lilian, assistente virtual da <b>Actio Software</b>. Me conte mais sobre você! Qual é o seu nome?",
            "tema" => "",
            "input_name" => "nome",
            "alternativas" => FALSE,
        ],
        /*1------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => "Certo! Em qual empresa você trabalha?",
            "tema" => "",
            "input_name" => "empresa",
            "alternativas" => FALSE,
        ],
        /*2------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => "Que legal! É um prazer te conhecer. Agora vamos dar início ao diagnóstico de maturidade do RH da sua empresa. Para isso, responda as perguntas com a opção que melhor se enquadra com a sua realidade, ok? Todas as informações serão protegidas de acordo com as regras da LGPD e você pode acompanhar nossa <a target='_blank' href='https://actiosoftware.com/privacidade/'>Política de Privacidade</a>",
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
        /*3------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '1: Sua empresa tem um processo estruturado/estabelecido de gestão de desempenho (independente de tempo, formato e periodicidade, etc.)?',
            "tema" => "Processo",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente ",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 2.64,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.32,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*4------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '2: O processo de gestão de desempenho gera o valor esperado as pessoas e negócio?',
            "tema" => "Processo",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 10.50,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 6.93,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 3.47,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*5------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '3: É feito o uso de tecnologia para apoiar e facilitar a execução do processo de gestão de desempenho da sua empresa?',
            "tema" => "Processo",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*6------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '4: O processo de gestão de desempenho da sua empresa possui conexão com a estratégia/metas do negócio?',
            "tema" => "Diretrizes",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 2.64,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.32,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*7------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '5: O processo de gestão de desempenho da sua empresa reflete (espelha) o jeito de ser da mesma (caracteristicas culturais, valores)?',
            "tema" => "Diretrizes",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*8------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '6: A empresa tem definido as competências (soft skills/mentalidades) necessárias para o futuro, traduzida na gestão de desempenho?',
            "tema" => "Diretrizes",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 2.64,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.32,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*9------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '7: O modelo de gestão de desempenho é tratado em todos os momentos da jornada do colaborar (onboarding, AVD, desenvolvimento)?',
            "tema" => "Pessoas",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 10.50,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 6.93,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 3.47,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*10------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '8: A liderança demonstra preparo e participa ativamente do processo de gestão de desempenho (acredita, promove, ensina, acompanha e mensura)?',
            "tema" => "Pessoas",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*11------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '9: As pessoas assumem um papel de protagonistas do seu próprio desempenho, desenvolvimento e carreira (se responsabilizam, com proatividade e engajamento)?',
            "tema" => "Pessoas",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*12------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '10: A sua empresa mapeia e retroalimenta o pipeline de sucessão das posições mais criticas para o negócio, considerando o curto, médio e longo prazo?',
            "tema" => "Decisão",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 10.50,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 6.93,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 3.47,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*13------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => "Agora que conheço melhor o seu processo de gestão de desempenho, você pode me passar o seu e-mail para seguirmos com o diagnóstico?",
            "tema" => "",
            "input_name" => "email",
            "alternativas" => FALSE,
        ],
        /*14------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '11: O processo de gestão de desempenho gera saídas/outputs suficientes e consistentes para auxiliar as lideranças na tomada de decisão (méritos, movimentações, bônus...)?',
            "tema" => "Decisão",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*15------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '12: No processo de gestão de desempenho, sua empresa utiliza a prática de people analytics (algoritmo para cruzamento de dados e geração de hipóteses)?',
            "tema" => "Decisão",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 10.50,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 6.93,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 3.47,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*16------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '13: O processo de GD é bem comunicado e entendido em todas a sua amplitude/abrangência (dimensões avaliados, critérios, regras, etapas...)',
            "tema" => "Comunicação",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 4,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 2.64,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.32,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*17------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => "Para finalizar as perguntas, preciso do seu telefone. Você pode me passar incluindo o DDD, por favor?",
            "tema" => "",
            "input_name" => "telefone",
            "alternativas" => FALSE,
        ],
        /*18------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '14: Existem conversas transparentes e contínuas entre lideres/liderados/equipes com foco no desenvolvimento?',
            "tema" => "Comunicação",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*19------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '15: O processo de gestão de desempenho proporciona a visibilidade do status (steps, prazos, etc.) e dos resultados (tangíveis e qualitativos) obtidos?',
            "tema" => "Comunicação",
            "alternativas" => [
                "a" => [
                    "texto" => "Concordo totalmente",
                    "peso" => 6,
                    "resposta" => ""
                ],
                "b" => [
                    "texto" => "Concordo parcialmente",
                    "peso" => 3.96,
                    "resposta" => ""
                ],
                "c" => [
                    "texto" => "Discordo parcialmente",
                    "peso" => 1.98,
                    "resposta" => ""
                ],
                "d" => [
                    "texto" => "Discordo totalmente",
                    "peso" => 0,
                    "resposta" => ""
                ],
            ],
        ],
        /*20------------------------------------------------------------------------------------*/
        [
            "id" => "",
            "texto" => '<div class="pergunta-finish">Chegou a hora de gerar o diagnóstico de maturidade de gestão de desenvolvimento da sua empresa. Veja!</div><button type="submit" class="message-finish" >Finalizar</button>',
            "tema" => "",
            "input_name" => "",
            "alternativas" => FALSE,
        ], ]
];