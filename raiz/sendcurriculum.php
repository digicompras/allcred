<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
	require(ROOT."/conect/conect.php");
	$email = mysql_query("SELECT * FROM operadores where nome = 'Diogo Luiz Pelizaro' limit 1");
	while ( $user = mysql_fetch_row($email) ) {
		$administrador = $user[20];
	}
	$email_from = "alessandro.mendes@allcredpromotora.com.br"; //$administrador;

	if(isset($_POST['workwithus_email'])) {
		$email_to = "roberto.dinaweb@gmail.com";"alessandro.mendes@allcredpromotora.com.br" ;  	// E-mail que receberá os dados do formulário
		$email_subject = "Interesse em ser Promotora";   // Assunto do E-mail

		function catch_error($error) {
			echo "Foi encontrado um problema ao enviar o formulário. <br />";
			echo $error."<br /><br />";
			die();
		}

		// validação dos dados do formulário
		if( !isset($_POST['workwithus_email']) ) {
			died('Não foi preenchido o e-mail no formulário. Por favor envie novamente');
		}

		
		$workwithus_name = $_POST['workwithus_name'];
		$workwithus_phone = $_POST['workwithus_phone'];
		$workwithus_email = $_POST['workwithus_email'];
		$workwithus_birthdate = $_POST['workwithus_birthdate_day']."/".$_POST['workwithus_birthdate_month']."/".$_POST['workwithus_birthdate_year'];
		$workwithus_address = $_POST['workwithus_address'].", ".$_POST['workwithus_addressnumber'];
		$workwithus_bairro = $_POST['workwithus_bairro'];
		$workwithus_city = $_POST['workwithus_city'];
		$workwithus_graduation = $_POST['workwithus_graduation'];
		$workwithus_course = $_POST['workwithus_course'];
		$workwithus_profexperience = $_POST['workwithus_profexperience'];
		$workwithus_companies = $_POST['workwithus_companies'];
		$workwithus_whyallcred = $_POST['workwithus_whyallcred'];

		$error_message = "";
		//Validação do e-mail
		$email_verfiy = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_verfiy,$workwithus_email)) {
			$error_message .= 'O e-mail digitado não é válido.<br />';
		}
		
		if(strlen($error_message) > 0) {
			catch_error($error_message);
		}

		// Non HTML Message
		$message = "

		Seja uma Promotora - Tenho Interesse - Site AllCred

		-------------------
		Nome: " . $workwithus_name . "
		Telefone: " . $workwithus_phone . "
		E-mail: R$ " . $workwithus_email . "
		Data de Nascimento: " . $workwithus_birthdate . "
		Endereço: " . $workwithus_address . "
		Bairro: " . $workwithus_bairro . "
		Cidade: " . $workwithus_city . "
		Graduação: " . $workwithus_graduation . "
		Curso: " . $workwithus_course . "
		Experências Profissionais: 
		" . $workwithus_profexperience . "
		Empresas e Atividades: 
		" . $workwithus_companies . "
		Porquê a AllCred:
		" . $workwithus_whyallcred . "
		-------------------

		";

		$headers = "From: " . $email_from . "\r\n";
		$headers .= "Bcc: " . $email_to . "\r\n";

		$success = mail($email_from, $email_subject, $message, $headers);
		if ($success) { ?>
			<script language="javaScript">
				<!--
				alert("PARABÉNS!!\n\n A Sua mensagem foi enviada com sucesso! Em breve lhe retornaremos sobre o assunto.");
				window.location.href = "index.php";
				//-->
			</script>
			<?php
 			exit;
    	} else {
    		echo "<p>Erro no envio do e-mail</p>";
    	}
	} else {
		echo "nenhum e-mail";
	}
?>