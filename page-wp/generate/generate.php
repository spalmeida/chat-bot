<?php 

 /*
 |--------------------------------------------------------------------------
 | chama a biblioteca
 |--------------------------------------------------------------------------
 */

 require 'vendor/autoload.php';
 use PhpOffice\PhpSpreadsheet\Helper\Sample;
 use PhpOffice\PhpSpreadsheet\IOFactory;
 use PhpOffice\PhpSpreadsheet\Spreadsheet;

 if (isset($_POST['results'])) {

 	generate($_POST['results']);
 }

 function generate($json){

 	$resultados = json_decode($json, true);
 	$helper = new Sample();
 	if ($helper->isCli()) {return;}
 	$spreadsheet = new Spreadsheet();

	/*
	|--------------------------------------------------------------------------
	| define o header do arquivo
	|--------------------------------------------------------------------------
	*/
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'nome')
	->setCellValue('B1', 'Email')
	->setCellValue('C1', 'Empresa')
	->setCellValue('D1', 'Telefone')
	->setCellValue('E1', '1: Para começar, quero entender como funciona o RH da sua empresa atualmente. Existe um processo estruturado e periódico de gestão de desempenho em sua empresa (bimestral, trimestral, semestral, anual...)? O processo atual funciona conforme esperado?')
	->setCellValue('F1', '2: Atualmente, é feito o uso de alguma plataforma ou sistema de gestão de desempenho para facilitar e/ou automatizar o processo de gestão de desempenho na sua empresa? ')
	->setCellValue('G1', '3: Legal. Agora quero entender mais sobre as estratégias usadas. No processo de gestão de desenvolvimento, sua empresa utiliza a prática de people analytics?')
	->setCellValue('H1', '4: Na sua empresa, os líderes e cargos estratégicos são elegíveis ao processo de gestão de desempenho?')
	->setCellValue('I1', '5: E os demais níveis hierárquicos (não líderes)? Eles são elegíveis por meio de práticas de gestão de desenvolvimento?')
	->setCellValue('J1', '6: Na sua empresa, acontecem autoavaliações com atribuição de pesos?')
	->setCellValue('K1', '7: Além disso, acontecem avaliações de líderes com atribuição de pesos?')
	->setCellValue('L1', '8: E sobre as avaliações de liderados, elas acontecem com atribuição de pesos?')
	->setCellValue('M1', '9: Ainda sobre as avaliações, na sua empresa, os pares são avaliados com atribuição de pesos?')
	->setCellValue('N1', '10: Pensando no processo de gestão de desempenho, é realizada a contratação de desempenho/metas?')
	->setCellValue('O1', '11: A equipe de RH utiliza um modelo definido de competências (funcional, técnica, comportamental, liderança, organizacional, entre outros)?')
	->setCellValue('P1', '12: Na sua empresa, existe o desdobramento de metas individuais e/ou coletivas?')
	->setCellValue('Q1', '13: Vamos falar um pouco sobre resultados. As metas (KPIs) obtidas por meio da avaliação de resultados são acompanhadas de forma periódica?')
	->setCellValue('R1', '14: Na sua empresa, a avaliação de potencial é colocada em prática?')
	->setCellValue('S1', '15: Existe uma escala de avaliação?')
	->setCellValue('T1', '16: Os líderes possuem uma rotina para realizar o acompanhamento com o liderado ao longo do ciclo?')
	->setCellValue('U1', '17: No dia a dia, os líderes possuem a prática de registro de evidências ou deixam isso apenas para o final do ciclo?')
	->setCellValue('V1', '18: Os colaboradores possuem clareza de que os profissionais com melhor performance serão reconhecidos de forma diferencial?')
	->setCellValue('W1', '19: Na sua empresa, acontece um processo de feedback contínuo na rotina de trabalho como forma constante de direcionamento do desempenho?')
	->setCellValue('X1', '20: As ações de desenvolvimento (PDI) e carreira (mérito e promoção) são tratadas em momentos distintos?')
	->setCellValue('Y1', '21: O avaliado registra sobre o processo de feedback e feedfoward?')
	->setCellValue('Z1', '22: Para ser mais assertivo, o líder precisa ter acesso aos resultados da gestão de desempenho on time. Isso acontece em sua empresa?')
	->setCellValue('AA1', '23: Sua empresa tem visibilidade do Pipeline de Liderança?')
	->setCellValue('AB1', '24: O PDI é algo obrigatório para todos os níveis da organização?');

	foreach ($resultados as $key => $value) {

		$indice = $key+2;
		$resposta = json_decode($value['json_respostas'],true);

	/*
	|--------------------------------------------------------------------------
	| gera as rows
	|--------------------------------------------------------------------------
	*/

	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$indice, $value['nome_usuario'])
	->setCellValue('B'.$indice, $value['email_usuario'])
	->setCellValue('C'.$indice, $value['empresa_usuario'])
	->setCellValue('D'.$indice, $value['telefone_usuario'])
	->setCellValue('E'.$indice, $resposta['resposta_1'])
	->setCellValue('F'.$indice, $resposta['resposta_2'])
	->setCellValue('G'.$indice, $resposta['resposta_3'])
	->setCellValue('H'.$indice, $resposta['resposta_4'])
	->setCellValue('I'.$indice, $resposta['resposta_5'])
	->setCellValue('J'.$indice, $resposta['resposta_6'])
	->setCellValue('K'.$indice, $resposta['resposta_7'])
	->setCellValue('L'.$indice, $resposta['resposta_8'])
	->setCellValue('M'.$indice, $resposta['resposta_9'])
	->setCellValue('N'.$indice, $resposta['resposta_10'])
	->setCellValue('O'.$indice, $resposta['resposta_11'])
	->setCellValue('P'.$indice, $resposta['resposta_12'])
	->setCellValue('Q'.$indice, $resposta['resposta_13'])
	->setCellValue('R'.$indice, $resposta['resposta_14'])
	->setCellValue('S'.$indice, $resposta['resposta_15'])
	->setCellValue('T'.$indice, $resposta['resposta_16'])
	->setCellValue('U'.$indice, $resposta['resposta_17'])
	->setCellValue('V'.$indice, $resposta['resposta_18'])
	->setCellValue('W'.$indice, $resposta['resposta_19'])
	->setCellValue('X'.$indice, $resposta['resposta_20'])
	->setCellValue('Y'.$indice, $resposta['resposta_21'])
	->setCellValue('Z'.$indice, $resposta['resposta_22'])
	->setCellValue('AA'.$indice, $resposta['resposta_23'])
	->setCellValue('AB'.$indice, $resposta['resposta_24']);
}

	/*
	|--------------------------------------------------------------------------
	| gerar download
	|--------------------------------------------------------------------------
	*/
	$spreadsheet->getActiveSheet()->setTitle('chat_relatorio');
	$spreadsheet->setActiveSheetIndex(0);
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="chat_relatorio.xls"');
	header('Cache-Control: max-age=0');
	header('Cache-Control: max-age=1');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: cache, must-revalidate');
	header('Pragma: public');

	$writer = IOFactory::createWriter($spreadsheet, 'Xls');
	$writer->save('php://output');
	exit;
}