<?php
	
	// if($_GET['acao'] == 'agendar'){

	// 	if($_GET['dados']['nome'] != '' AND $_GET['dados']['email'] != '' AND $_GET['dados']['telefone'] != '' AND $_GET['dados']['data'] != '' AND $_GET['dados']['horario'] != '0' AND $_GET['dados']['quantidade'] != '0'){

	// 		$arrayPost = array(
	// 			'data'			=> ,
	// 			'horario'		=> 
	// 		);

	// 		$arrayPost = array(
	// 			'data'			=> datato2($_GET['dados']['data']),
	// 			'horario'		=> $_GET['dados']['horario'],
	// 			'nome'			=> $_GET['dados']['nome'],
	// 			'email'			=> $_GET['dados']['email'],
	// 			'telefone'		=> $_GET['dados']['telefone'],
	// 			'visitantes'	=> $_GET['dados']['quantidade']
	// 		);

	// 		$ch = curl_init();
	// 		$headers = array(
	// 		   "Token: n1ya6l9acltyuf2qsz8at1p6i5ga43dcy5tcs8mgdcxzg5he4mvg78dfhke5ilwsi8lcnmbs9qovgswdmbv6bzsgl57hxqnr5fj2"
	// 		);
	// 		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
	// 		curl_setopt($ch, CURLOPT_POST, 1);
	// 		curl_setopt($ch, CURLOPT_URL, "http://177.54.52.98:33501/api/cervejariasc-site/verifica-agendamento");
	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPost);	
	// 		$contents = curl_exec($ch);
	// 		$contents = json_decode($contents, true);
		
	// 		if($contents['status'] == "true"){
	// 			exit('true');
	// 		} else {
	// 			if($contents['status'] == "reservado"){
	// 				exit('reservado');
	// 			} else {
	// 				exit('false');
	// 			}				
	// 		}
	// 	} else {
	// 		exit('false');
	// 	}
	// }


	$array = array(
		'url'		=> $url
	);

	echo setPage($array, './views/home.html');

	// function enviaEmailAgendamento($dados){

	// 	$horarioInicio = substr($dados['horario'], 0, 2);
	// 	$horarioFinal = substr($dados['horario'], 2, 2);

	// 	$hora = $horarioInicio.':'.$horarioFinal;

	// 	$mensagem .= 'Novo agendamento de visita via site - Saint Experience<br>';
	// 	$mensagem .= '<br>Nome: '.$dados['nome'];
	// 	$mensagem .= '<br>E-mail: '.$dados['email'];
	// 	$mensagem .= '<br>Telefone: '.$dados['telefone'];
	// 	$mensagem .= '<br>Data: '.$dados['data'];
	// 	$mensagem .= '<br>Horario: '.$hora;
	// 	$mensagem .= '<br>Quantidade de pessoas: '.$dados['quantidade'];
	// 	$mensagem .= '<br><br>Este é um e-mail automático, favor não responder.';

	// 	$enviaEmail = enviaEmail("Saint Experience - Cervejaria Santa Catarina", "nao.responder@cervejariasc.com.br", 'visitacao@cervejariasc.com.br', $mensagem, "Saint Experience - Cervejaria Santa Catarina");

	// 	return $enviaEmail;
	// }

?>