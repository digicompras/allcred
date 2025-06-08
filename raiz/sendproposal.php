<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require(ROOT."/conect/conect.php");
	$email = mysql_query("SELECT * FROM operadores where nome = 'Diogo Luiz Pelizaro' limit 1");
	while ( $user = mysql_fetch_row($email) ) {
		$administrador = $user[20];
	}
	$email_from = "sac@allcredpromotora.com.br";

	if(isset($_POST['proposal_email'])) {
		$email_to = "roberto.dinaweb@gmail.com; sac@allcredpromotora.com.br";  	// E-mail que receberá os dados do formulário - 
		$res_email_to = "robertodias@dinaweb.com.br";

		function catch_error($error) {
			echo "Foi encontrado um problema ao enviar o formulário. <br />";
			echo $error."<br /><br />";
			die();
		}

		// validação dos dados do formulário
		if( !isset($_POST['proposal_email']) ) {
			died('Não foi preenchido o e-mail no formulário. Por favor envie novamente');
		}

		$digitacao = "A Digitar";
		$status = "A VERIFICAR";
		$chars = array(".", "-");
		$proposal_date = date('Y-m-d');
		$proposal_data = date('d-m-Y');
		$nome_operador = "";
		$proposal_product = "";
		$proposal_secretaria = "";

		if( isset($_POST['proposal_page']) ) 		 {	$proposal_page 			=	$_POST['proposal_page']; }									// URL da página de envio
		if( isset($_POST['proposal_product']) )		 {	$proposal_product 		=	utf8_decode($_POST['proposal_product']); } 					// Nome do produto
		if( isset($_POST['proposal_value']) ) 		 {	$proposal_value			=	$_POST['proposal_value']; } else { $proposal_value = 0; }	// Valor
		if( isset($_POST['proposal_name']) ) 		 {	$proposal_name			=	utf8_decode($_POST['proposal_name']); }						// Nome
		if( isset($_POST['proposal_cpf']) ) 		 {	$proposal_cpf			=	str_replace($chars, "", $_POST['proposal_cpf']); }			// CPF
		if( isset($_POST['proposal_celwhats']) ) 	 {	$proposal_celwhats		=	$_POST['proposal_celwhats']; }								// Celular
		if( isset($_POST['proposal_address']) )		 {	$proposal_endereco		=	$_POST['proposal_address']; }								// Endereço
		if( isset($_POST['proposal_zipcode']) )		 {	$proposal_cep			=	$_POST['proposal_zipcode']; }								// CEP
		if( isset($_POST['proposal_rg']) )			 {	$proposal_rg			=	$_POST['proposal_rg']; }									// RG
		if( isset($_POST['proposal_namemom']) ) 	 {	$proposal_namemom		=	utf8_decode($_POST['proposal_namemom']); }					// Nome da Mãe
		if( isset($_POST['proposal_namedad']) ) 	 {	$proposal_namedad		=	utf8_decode($_POST['proposal_namedad']); }					// Nome do Pai
		if( isset($_POST['proposal_secretaria']) )	 {	$proposal_secretaria	=	$_POST['proposal_secretaria']; }							// Nome da Secretaria
		if( isset($_POST['proposal_matricula']) )	 {	$proposal_matricula		=	$_POST['proposal_matricula'];	}							// Número de matrícula
		if( isset($_POST['proposal_bankname']) ) 	 {	$proposal_bankname		=	utf8_decode($_POST['proposal_bankname']); }					// Nome do banco
		if( isset($_POST['proposal_bankag']) ) 		 {	$proposal_bankag		=	$_POST['proposal_bankag']; }								// Nº da Agência
		if( isset($_POST['proposal_bankcc']) ) 		 {	$proposal_bankcc		=	$_POST['proposal_bankcc']; }								// Nº da Conta
		if( isset($_POST['proposal_portalpass']) ) 	 {	$proposal_portalpass	=	$_POST['proposal_portalpass']; }							// Senha do Portal
		// if( isset($_POST['proposal_margin']) ) 		 {	$proposal_margin		=	$_POST['proposal_margin']; }								// Possui Margem?
		// if( isset($_POST['proposal_empr_dayco']) ) 	{	$proposal_empr_dayco	=	$_POST['proposal_empr_dayco']; }						// Possui Empréstimo Daycoval?
		// if( isset($_POST['proposal_empr_pan']) ) 	{	$proposal_empr_pan		=	$_POST['proposal_empr_pan']; }							// Possui Empréstimo Pan?
		if( isset($_POST['proposal_email']) ) 		 {	$proposal_email			=	$_POST['proposal_email']; }									// E-Mail
		if( isset($_POST['proposal_birth']) ) 		 {	$proposal_birth			=	explode('/', $_POST['proposal_birth']); }					// Data de Nascimento
		// if( isset($_POST['proposal_new_contract']) ) {	$proposal_new_contract	=	$_POST['proposal_new_contract']; }							// Fazer um contrato novo?
		// if( isset($_POST['proposal_refin']) ) 		 {	$proposal_refin			=	$_POST['proposal_refin']; }									// Deseja refinanciar Seus Contratos da Daycoval?
		// if( isset($_POST['proposal_cc_consig']) ) 	 {	$proposal_cc_consig		=	$_POST['proposal_cc_consig']; }								// Deseja fazer um Cartão de Crédito Consignado?
		if(!empty($_POST['proposal_service'])) 		 {	
			$services_count = count($_POST['proposal_service']);
			$proposal_service = "";
			foreach($_POST['proposal_service'] as $selected) {
				$proposal_service .= $selected .", ";
			}
		}
		// if( isset($_POST['proposal_phone']) ) 		{	$proposal_phone		=	$_POST['proposal_phone']; }									// Telefone
		// if( isset($_POST['proposal_gender']) ) 		{	$proposal_sexo		=	$_POST['proposal_gender']; }								// Sexo
		// if( isset($_POST['proposal_operadora']) ) 	{	$proposal_operadora	=	$_POST['proposal_operadora']; }								// Operadora Celular
		// if( isset($_POST['proposal_convenio']) ) 	{	$proposal_convenio	=	$_POST['proposal_convenio']; }								// Convênio
		// if( isset($_POST['proposal_imovel']) )		{	$proposal_imovel	=	$_POST['proposal_imovel'];	}								// Valor do Imóvel
		// if( isset($_POST['proposal_prof']) )		{	$proposal_prof		=	$_POST['proposal_prof']; }										// Profissão
		// $proposal_estado		=	'SP';																									
		// if( isset($_POST['proposal_district']) )	{	$proposal_bairro	=	$_POST['proposal_district']; }									// Bairro
		// if( isset($_POST['proposal_estado']) )		{	$proposal_estado	=	$_POST['proposal_estado']; }								// Estado
		// if( isset($_POST['proposal_cidade']) )		{	$proposal_cidade	=	$_POST['proposal_cidade']; }								// Cidade
		// if( isset($_POST['proposal_option']) ) { 
		// 	$proposal_option	=	$_POST['proposal_option'];																					// Se quiser receber emails...
		// } else { 
		// 			$proposal_option	=	0;																																			// Se não quiser. 
		// }
		// if ( $proposal_option ) { $receberemail = "Sim"; } else { $receberemail = "Nao"; }
		// if( isset($_POST['proposal_educ_saude']) )		{	$proposal_educ_saude	=	$_POST['proposal_educ_saude']; }					// Caso Educação ou Saúde
		// if( isset($_POST['proposal_cartao']) )			{	$proposal_cartao		=	$_POST['proposal_cartao']; }						// Tem interesse no cartão
		// if( isset($_POST['proposal_port_refin']) )		{	$proposal_port_refin	=	$_POST['proposal_port_refin']; }					// Interesse em Portabilidade e Refianciamento
		// if( isset($_POST['proposal_unid_pg']) )			{	$proposal_unid_pg		=	$_POST['proposal_unid_pg']; }						// Unidade Pagadora
		// if( isset($_POST['proposal_cargo_sit']) )		{	$proposal_cargo_sit		=	$_POST['proposal_cargo_sit']; }						// Cargo/Situação
		// if( isset($_POST['proposal_plano']) ) 			{	$proposal_plano			=	$_POST['proposal_plano']; }							// Plano de Seguro ABS
		// if( isset($_POST['proposal_plano_odonto']) ) 	{	$proposal_plano_odonto	=	$_POST['proposal_plano_odonto']; }					// Plano de Seguro ABS
		
		// $tem_emprestimo = "Não";
		// if ( $proposal_empr_dayco == "Sim") {
		//	$tem_emprestimo = "Emprestimo Daycoval";
		//	if ( $proposal_empr_pan == "Sim" ) {
		//		$tem_emprestimo .= "e PAN";
		//  }
		// } else {
		//	if ( $proposal_empr_pan == "Sim" ) {
		//		$tem_emprestimo = "Emprestimo PAN";
		//	}
		// }

		/*Testar variáveis
		echo $proposal_page . "<br>";
		echo $proposal_product . "<br>";
		echo $proposal_value . "<br>";
		echo $proposal_name . "<br>";
		echo $proposal_cpf . "<br>";
		echo $proposal_celwhats . "<br>";
		echo $proposal_endereco . "<br>";
		echo $proposal_cep . "<br>";
		echo $proposal_rg . "<br>";
		echo $proposal_namemom . "<br>";
		echo $proposal_namedad . "<br>";
		echo $proposal_secretaria . "<br>";
		echo $proposal_matricula . "<br>";
		echo $proposal_bankname . "<br>";
		echo $proposal_bankag . "<br>";
		echo $proposal_bankcc . "<br>";
		echo $proposal_portalpass . "<br>";
		echo $proposal_margin . "<br>";
		echo $proposal_email . "<br>";
		*/

		if( isset($_POST['g-recaptcha-response']) ) 	{	$captcha_data	=	$_POST['g-recaptcha-response']; }					// RECAPTCHA

		if(!$captcha_data) {
			$previous = "javascript:history.go(-1)";
			if(isset($_SERVER['HTTP_REFERER'])) { $previous = $_SERVER['HTTP_REFERER']; }
			echo  "<script>alert('Captcha Invalido.Volte e verifique novamente');history.go(-1);</script>";
			//echo 'Captcha Invalido. <a href="' . $previous . '">Volte</a> e verifique novamente';

		} else {
			// $captcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcMVWYaAAAAANId7nkafHtQ0p1knITMCfwdemns&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
			// if ($captcha_response.success) {
			$secretKey = "6LcMVWYaAAAAANId7nkafHtQ0p1knITMCfwdemns";
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => array(
					'secret' => $secretKey,
        			'response' => $captcha_data,
        			'remoteip' => $_SERVER['REMOTE_ADDR']
        		)	
        	));
        	$output = curl_exec($ch);
        	curl_close($ch);

			if(strpos($output, '"success": true') !== FALSE) {
				// Grava dados no banco

				// Dados completos do Banco
				/*
				$comando = "insert into propostas(status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano,recebido,status_pagto_cliente,dia,mes,ano,tabela,valor_total,valor_liquido_cliente,status_fisico,num_bordero,tipo_contrato,termo_de_responsabilidade,termo,data_proposta,prazo_final,digitacao,tipo_conta,resposta,bco_quitacao,nome_ref1,fone_ref1,grau_relacionamento1,nome_ref2,fone_ref2,grau_relacionamento2,resposta1,resposta2,resposta3,pagto_beneficio,valorrenda,dia_niver,mes_niver,ano_niver,secretaria,categoria,tipovenda,senha_portalpass,tem_margem,tem_emprestimo) values ... 

				/*
				if ($proposal_product == "sorteio") {
					$comando = "INSERT INTO cupons( nome, telefone, email, obs) values('$proposal_nome','$proposal_phone','$proposal_email','Matrícula: $proposal_matricula')";
					mysql_query($comando,$conexao) or die("Erro ao gravar cupom!...Tente novamente!");
				} else {
				*/	

					$comando = "INSERT INTO propostas( status, tipo_proposta, dataproposta, nome, cpf, num_beneficio, rg, pai, mae, endereco, cep, celular, email, banco_pagto, agencia, conta, servicos, valor_total, tipo_contrato, data_proposta, digitacao, dia_niver, mes_niver, ano_niver, secretaria, senha_portalpass ) 
						values(	'$status', 'SITE', '$proposal_data', '$proposal_name', '$proposal_cpf', '$proposal_matricula', '$proposal_rg', '$proposal_namedad', '$proposal_namemom', '$proposal_endereco', '$proposal_cep', '$proposal_celwhats', '$proposal_email', '$proposal_bankname', '$proposal_bankag', '$proposal_bankcc', 'Serviços: $proposal_service', '$proposal_value', 'SITE', '$proposal_date', '$digitacao', '$proposal_birth[0]', '$proposal_birth[1]', '$proposal_birth[2]', '$proposal_secretaria', '$proposal_portalpass' )";
					mysql_query($comando,$conexao) or die("Erro ao gravar proposta");

					// Obtem número da proposta
					$sql = "SELECT * FROM propostas where cpf = '$proposal_cpf' order by num_proposta desc limit 1";
					$res = mysql_query($sql);
					while( $linha = mysql_fetch_row($res) ) {
						$num_proposta = $linha[0];
					}
					
					// E-Mail para a AllCred com a proposta do Cliente
					$email_subject = "Proposta nº " . $num_proposta ." - ". $proposal_product."";
					$message = "Proposta de " . $proposal_product." - Site AllCred\r\n\r\n-----------------------------\r\n";
					$message .= "Proposta Nº: " . $num_proposta ."\r\n-----------------------------\r\n\r\n";
					$message .= "URL de envio: " . $proposal_page ."\r\n";
					$message .= "Produto: " . $proposal_product."\r\n";
					if( isset($_POST['proposal_value']) ) { $message .= "Valor: " . $proposal_value."\r\n"; }
					$message .= "Nome: " . $proposal_name."\r\n";
					$message .= "C.P.F.: " . $_POST['proposal_cpf']."\r\n";
					$message .= "Data de Nascimento: " . $_POST['proposal_birth'] ."\r\n";
					$message .= "Celular/WhatsApp: " . $proposal_celwhats."\r\n";
					$message .= "Endereço: " . $proposal_endereco."\r\n";
					$message .= "C.E.P.: " . $proposal_cep."\r\n";
					$message .= "R.G.: " . $proposal_rg."\r\n";
					$message .= "Nome da Mãe: " . $proposal_namemom."\r\n";
					$message .= "Nome do Pai: " . $proposal_namedad."\r\n";
					if( isset($_POST['proposal_secretaria']) ) { $message .= "Secretaria: " . $proposal_secretaria."\r\n"; }
					if( isset($_POST['proposal_matricula']) ) { $message .= "Nº de Matrícula: " . $proposal_matricula."\r\n"; }
					$message .= "Banco: " . $proposal_bankname."\r\n";
					$message .= "Agência: " . $proposal_bankag."\r\n";
					$message .= "Conta: " . $proposal_bankcc."\r\n";
					if( isset($_POST['proposal_portalpass']) ) { $message .= "Senha do Portal: " . $proposal_portalpass."\r\n"; }
					if(!empty($_POST['proposal_service'])) { $message .= "Serviços desejados: " . $proposal_service . "\r\n"; }
					// $message .= "Possui Margem?: " . $proposal_margin."\r\n";
					// $message .= "Deseja Fazer um contrato novo?: " . $proposal_new_contract."\r\n";
					// $message .= "Deseja refinanciar Seus Contratos da Daycoval?: " . $proposal_refin."\r\n";
					// $message .= "Deseja fazer um Cartão de Crédito Consignado?: " . $proposal_cc_consig."\r\n";
					// $message .= "Empréstimo no Daycoval?: " . $proposal_empr_dayco."\r\n";
					// $message .= "Empréstimo no Pan?: " . $proposal_empr_pan."\r\n";
					// $message .= "E-mail: " . $proposal_email."\r\n";
					// if( isset($_POST['proposal_convenio']) ) { $message .= "Convênio: " . $proposal_convenio."\r\n";; }
					// if( isset($_POST['proposal_prof']) ) { $message .= "Profissão: " . $proposal_prof."\r\n"; }
					// $message .= "Estado: " . $proposal_estado."\r\n";
					// $message .= "Cidade: " . $proposal_cidade."\r\n";
					// if( isset($_POST['proposal_educ_saude']) ) { $message .= "No caso de Educação ou Saúde: " . $proposal_educ_saude."\r\n"; }
					// if( isset($_POST['proposal_cartao']) ) { $message .= "Interesse no Cartão: " . $proposal_cartao."\r\n"; }
					// if( isset($_POST['proposal_port_refin']) ) { $message .= "Interesse em Portabilidade e Refinanciamento: " . $proposal_port_refin."\r\n"; }
					// if( isset($_POST['proposal_unid_pg']) ) { $message .= "Unidade Pagadora: " . $proposal_unid_pg."\r\n"; }
					// if( isset($_POST['proposal_cargo_sit']) ) { $message .= "Cargo/Situação: " . $proposal_cargo_sit."\r\n"; }
					// if( isset($_POST['proposal_plano']) ) { $message .= "Plano ABS Seguro Premiável: " . $proposal_plano."\r\n"; }
					// if( isset($_POST['proposal_plano_odonto']) ) { $message .= "PPlano Odontológico Bradesco Dental : " . $proposal_plano_odonto."\r\n"; }
					// $message .= "Receber E-mail: " . ($proposal_option?'Sim':'Não') . "-------------------";
					// if( isset($_POST['proposal_imovel']) ) { $message .= "Valor do Imóvel: " . $proposal_imovel."\r\n"; }
					// $message .= "Sexo: " . $proposal_sexo."\r\n";
					// $message .= "Bairro: " . $proposal_bairro."\r\n";
					// if( isset($_POST['$proposal_phone']) ) { $message .= "Telefone: " . $proposal_phone."\r\n";; }
					
					$message = '=?UTF-8?B?'.base64_encode($message).'?=';

					$headers = "Content-type: text/html; charset=utf-8";
					$headers .= "From: " . $email_from . "\r\n";
					$headers .= "Bcc: " . $email_to . "\r\n";
					
					// Envia e-mail para o remetente 
					$rem_message = "Proposta de " . $proposal_product." - Site AllCred\r\n\r\n-----------------------------\r\n";
					$rem_message .= "Proposta Nº: " . $num_proposta ."\r\n-----------------------------\r\n\r\n";
					$rem_message .= "URL de envio: " . $proposal_page ."\r\n";
					$rem_message .= "Produto: " . $proposal_product."\r\n";
					if( isset($_POST['proposal_value']) ) { $rem_message .= "Valor: " . $proposal_value."\r\n"; }
					$rem_message .= "Nome: " . $proposal_name."\r\n";
					$rem_message .= "C.P.F.: " . $_POST['proposal_cpf']."\r\n";
					$rem_message .= "Data de Nascimento: " . $_POST['proposal_birth'] ."\r\n";
					$rem_message .= "Celular/WhatsApp: " . $proposal_celwhats."\r\n";
					$rem_message .= "Endereço: " . $proposal_endereco."\r\n";
					$rem_message .= "C.E.P.: " . $proposal_cep."\r\n";
					$rem_message .= "R.G.: " . $proposal_rg."\r\n";
					$rem_message .= "Nome da Mãe: " . $proposal_namemom."\r\n";
					$rem_message .= "Nome do Pai: " . $proposal_namedad."\r\n";
					if( isset($_POST['proposal_secretaria']) ) { $rem_message .= "Secretaria: " . $proposal_secretaria."\r\n"; }
					if( isset($_POST['proposal_matricula']) ) { $rem_message .= "Nº de Matrícula: " . $proposal_matricula."\r\n"; }
					$rem_message .= "Banco: " . $proposal_bankname."\r\n";
					$rem_message .= "Agência: " . $proposal_bankag."\r\n";
					$rem_message .= "Conta: " . $proposal_bankcc."\r\n";
					// $rem_message .= "Senha do Portal: " . $proposal_portalpass."\r\n";
					if(!empty($_POST['proposal_service'])) { $rem_message .= "Serviços desejados: " . $proposal_service . "\r\n"; }
					
					$rem_message = utf8_decode($rem_message);
					
					$rem_headers = "Content-type: text/html; charset=utf-8";
					$rem_headers .= "From: " . $email_from . "\r\n";
					$rem_headers .= "Bcc: " . $res_email_to . "\r\n";
					
					$email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';
					
					$success = mail($email_to, $email_subject, $message, $headers);
					$success2 = mail($proposal_email, $email_subject, $rem_message, $rem_headers);
					if ($success) {
						if ($success2) {
							if (($proposal_product == "Empréstimo para Servidores Públicos de São Paulo") || ($proposal_product == "Cartão de Crédito Servidor")) {
								header("Location: obrigado-servidor.php?proposta=".$num_proposta);    
							} elseif ($proposal_product == "sorteio") {
								header("Location: obrigado-sorteio.php");
							} else {
								header("Location: obrigado.php?proposta=".$num_proposta);
							}
							exit;
						}
					} else {
						header("Location: obrigado.php?proposta=".$num_proposta);
						/*
						echo "<p>Erro no envio do e-mail</p>";
						var_dump($success);
						echo "Email: " . $email_to . "<br>";
						echo "Assunto: " . $email_subject . "<br>";
						echo "Mensagem: " . $message . "<br>";
						echo "Headers: " . $headers . "<br>";
						phpinfo();
						*/
					}
				//}
			}
		}
	} else {
		echo "nenhum e-mail";
	}
?>