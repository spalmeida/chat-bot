<?php

add_action('wp_ajax_tratamento', 'ajax_tratamento');
add_action('wp_ajax_nopriv_tratamento', 'ajax_tratamento');

function ajax_tratamento()
{

    date_default_timezone_set('America/Sao_Paulo');
    require_once 'perguntas.php';

    isset($_POST['time']) ? $time = sanitize_text_field($_POST["time"]) : $time = NULL;
    isset($_POST['json_gerado']) ? $json_gerado = sanitize_text_field($_POST["json_gerado"]) : $json_gerado = NULL;
    isset($_POST['reinicia_chat']) ? $reinicia_chat = sanitize_text_field($_POST["reinicia_chat"]) : $reinicia_chat = NULL;

    if (isset($reinicia_chat)) {
        unset($_COOKIE['chat_iniciado']);
        unset($_COOKIE['chatbot_status']);
        unset($_COOKIE['chatbot_useremail']);
        $_COOKIE['reinicia_chat'] = 1;
        $output = 'true';
    }

    if (isset($_POST["msg"]) && isset($_POST["step"])) {

        $output = [
            "msg" => strip_tags($_POST["msg"]),
            "json_gerado" => monta_json($_POST["step"], $_POST["msg"], $perguntas, $json_gerado)
        ];
    } else if (!empty($time)) {

        $output = date('H:i');
    } else if (isset($_POST["step"])) {

        $output =  resposta($perguntas, $_POST["step"]);
    } else if (isset($_POST["finalizar_chat"])) {

        $array = explode('@@@', $_POST["finalizar_chat"]);
        $json_gerado = [];

        foreach ($array as $key => $value) {
            $json_gerado[] .= json_encode(explode('&&&', $value), JSON_UNESCAPED_UNICODE);
        }

        if (isset($_POST["finalizar_chat"])) {
            $array = explode('@@@', sanitize_text_field($_POST["finalizar_chat"]));
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

            if (isset($_COOKIE['chatbot_useremail'])) {

                if (insert_db(gerar_relatorio($json_envia, $perguntas), $_COOKIE['chatbot_useremail'])) {
                    $output = insert_db(gerar_relatorio($json_envia, $perguntas), $_COOKIE['chatbot_useremail']);
                } else {
                    $output = 'error';
                }
            }
        }
    } else if(isset($_POST['monta_resultados']) && isset($_POST['consulta'])){

        global $wpdb;
        $table_name = $wpdb->prefix . "chat_bot";
        $result = $wpdb->get_results("SELECT * FROM $table_name WHERE email_usuario = '$_POST[consulta]' ")[0];
        $output = $result;

    } else {
        $output = 'error';
    }

    wp_send_json($output);
}

function insert_db($results, $email)
{

    global $wpdb;
    $table_name = $wpdb->prefix . "chat_bot";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $email_usuario = $email;
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE email_usuario = '$email_usuario' ");

    if ($rowcount <= 0) {
        $data = array(
            'time' => current_time('mysql'),
            'nome_usuario'      => $results['nome_usuario'],
            'email_usuario'     => $results['email_usuario'],
            'empresa_usuario'   => $results['empresa_usuario'],
            'telefone_usuario'  => $results['telefone_usuario'],
            'json_respostas'    => json_encode($results),
        );
        $retorno = $wpdb->insert($table_name, $data);
    } else {
        $retorno = $wpdb->get_results("SELECT * FROM $table_name WHERE email_usuario = '$email_usuario' ")[0];
    }
    return $retorno;
}


function monta_json($step, $msg, $perguntas, $json_gerado = '')
{

    $step_atual = $step - 1;
    $texto_pergunta = strip_tags($perguntas['perguntas'][$step]['texto']);
    $mensagem = $msg;
    $tema = $perguntas['perguntas'][$step - 1]['tema'];
    if (empty($perguntas['perguntas'][$step - 1]['alternativas'])) {
        $peso = '';
    } else {
        $peso = $perguntas['perguntas'][$step - 1]['alternativas'][$msg[0]]['peso'];
    }

    /*
        step id
        pergunta texto
        mensagem usuario
        tema
        peso
    */

        if (empty($json_gerado)) {
            $json_gerado = "$step_atual&&&$texto_pergunta&&&$mensagem&&&$tema&&&$peso@@@";
        } else {
            $json_gerado .= "$step_atual&&&$texto_pergunta&&&$mensagem&&&$tema&&&$peso@@@";
        }

        return strip_tags($json_gerado);
    }

    function monta_chat($perguntas, $step)
    {

        $processo = [];
        foreach ($perguntas as $key => $pergunta) {

            /* ITENS */
            $texto          = $pergunta['texto'];
            $tema           = $pergunta['tema'];
            $input_name     = $pergunta['input_name'] ?? NULL;
            $alternativas   = $pergunta['alternativas'] ? carrega_alternativas($pergunta['alternativas'], $key) : NULL;

            /* PERGUNTA TEXTO */
            $pergunta_texto  = '<div class="txt-pergunta">';
            $pergunta_texto .= $texto;
            $pergunta_texto .= '</div>';

            /* MAKE */
            $make  = $pergunta_texto;
            $make .= $alternativas;
            $make .= $input_name && $tema == "" ? carrega_inputs($input_name) : '';

            $processo[] .= $make;
        }

        return $processo[$_POST["step"]];
    }

    function carrega_alternativas($alternativas, $posicao_pergunta)
    {
        $coluna = '<div class="questions" id="questions-' . $posicao_pergunta . '">';
        foreach ($alternativas as $key => $alternativa) {
            if (!empty($alternativa['texto'])) {

                /* COLUNAS */
                $posicao    = $key . ') ' ?? NULL;
                $texto      = $alternativa['texto'] ?? NULL;
                $peso       = $alternativa['peso'] ?? NULL;
                $resposta   = $alternativa['resposta'] ?? NULL;

                $coluna .= '<div class="question">';
                $coluna .= '<input type="radio" name="question-' . $posicao_pergunta . '" id="' . $posicao_pergunta . '-' . $key . '">';
                $coluna .= '<label for="' . $posicao_pergunta . '-' . $key . '">' . $posicao . $texto . '</label>';
                $coluna .= '</div>';
            }
        }
        $coluna .= '<button type="submit" class="message-submit hide">Enviar</button>';
        $coluna .= '</div>';

        return $coluna;
    }

    function carrega_inputs($name)
    {
        $coluna  = '<div class="message-box">';
        $coluna .= '<textarea name="' . $name . '" type="text" class="message-input" placeholder="Escrever..."></textarea>';
        $coluna .= '<button type="submit" class="message-submit" >Enviar</button>';
        $coluna .= '</div>';

        return $coluna;
    }

    function resposta($perguntas, $step)
    {

        if (monta_chat($perguntas['perguntas'], $step)) {

            return array(
                'next_step' => $step + 1,
                'previus_step' => ($step < 0) ? 0 : $step,
                'count_steps' => count($perguntas['perguntas']),
                'data' => monta_chat($perguntas['perguntas'], $step)
            );
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

    //gestao

        foreach ($resultados as $resultado) {

            foreach ($perguntas['perguntas'] as $key => $pergunta) {

                if ($pergunta['tema'] == $tema && $resultado['tema'] == $tema && $resultado['step_id'] == $key) {
                    $alternativa = $resultado['mensagem_usuario'][0];

                    $pergunta_alternativa_peso += $pergunta['alternativas'][$alternativa]['peso'];
                }
            }
        }

        return $pergunta_alternativa_peso;
    }

    function get_resultados($porcentagem)
    {

        switch (true) {

            case ($porcentagem >= 90):
            $nivel = "Consolidada";
            $classificacao = "A";
            break;

            case ($porcentagem >= 70 && $porcentagem < 90):
            $nivel = "Satisfatória";
            $classificacao = "B";
            break;

            case ($porcentagem >= 50 && $porcentagem < 70):
            $nivel = "Parcial";
            $classificacao = "C";
            break;

            case ($porcentagem < 50):
            $nivel = "Baixa";
            $classificacao = "D";
            break;
        }


        return [
            "nivel" => $nivel,
            "classificacao" => $classificacao
        ];
    }

    function gerar_relatorio($resultados, $perguntas)
    {

        $json_envia = [];
        $peso_total = 0;
        $pergunta_alternativa_peso = 0;
        $make_json = [];
        $get_temas = [];
        $usuario_resultado_geral = 0;
        $total_resultado_geral = 0;

        /* get personal_info */
        foreach ($resultados as $personal_info) {
            if (empty($personal_info['tema']) && empty($personal_info['peso'])) {
                $personal_info['step_id'] == '0'  ? $make_json['nome_usuario'] = $personal_info['mensagem_usuario'] : '';
                $personal_info['step_id'] == '1'  ? $make_json['empresa_usuario'] = $personal_info['mensagem_usuario'] : '';
                $personal_info['step_id'] == '13' ? $make_json['email_usuario'] = $personal_info['mensagem_usuario'] : '';
                $personal_info['step_id'] == '17' ? $make_json['telefone_usuario'] = $personal_info['mensagem_usuario'] : '';
            }
        }

        foreach ($resultados as $resultado) {
            if ($resultado['tema'] != 'lgpd' && $resultado['tema']) {
                $get_temas[] = $resultado['tema'];
            }
        }

        $temas = array_unique($get_temas);

        foreach ($temas as $tema) {

            $peso_total = get_peso_total($perguntas, $tema);
            $pergunta_alternativa_peso = get_alternativas_usuario($perguntas, $tema, $resultados);
            $porcentagem = intval($pergunta_alternativa_peso / $peso_total * 100);


            $usuario_resultado_geral += $pergunta_alternativa_peso;
            $total_resultado_geral += $peso_total;

        //nivel e classificação se de tanto a tanto geral
        //nivel e classificação se de tanto a tanto por tema

            $make_json['resultados'][] = [
                "tema" => $tema,
                "nivel" => get_resultados($porcentagem)['nivel'],
                "classificacao" => get_resultados($porcentagem)['classificacao'],
                "porcentagem" =>  $porcentagem . "%"
            ];
        }

        $porcentagem_geral = intval($usuario_resultado_geral / $total_resultado_geral * 100);

        $make_json['resultados'][] = [
            "tema" => 'Resultado Geral',
            "nivel" => get_resultados($porcentagem_geral)['nivel'],
            "classificacao" => get_resultados($porcentagem_geral)['classificacao'],
            "porcentagem" =>  $porcentagem_geral . "%"
        ];

        return $make_json;
    }
