<?php

//session_start(); //inicia sessão...

//if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

//echo ""; //se for emite mensagem positiva.

//if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

//echo ""; //se for emite mensagem positiva.

//else //se não for...

//header("Location: alerta.php");



?>

<html>

<head>

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?


require '../../conect/conect.php';


?>





<body>



<?

$status = "AGUARDANDO ATIVACAO"; 
$proposal_page = $_POST['proposal_page']; //URL de onde o formulário foi enviado
$proposal_product = $_POST['proposal_product']; //Produto de interesse do usuário
$proposal_value = $_POST['proposal_value']; //Valor desejado
$proposal_name = $_POST['proposal_name']; //Nome
$proposal_cpf = $_POST['proposal_cpf']; //cpf
$proposal_phone = $_POST['proposal_phone']; //Telefone
$proposal_email = $_POST['proposal_email']; //Email de contato
$proposal_convenio = $_POST['proposal_convenio']; //Convênio
$proposal_option = $_POST['proposal_option']; //(1 ou 0 - Sim/Não) Receber email
$proposal_digitacao = "A Digitar";
$proposal_date = date('Y-m-d');
$proposal_data = date('d-m-Y');
$proposal_unidadepagadora = $_POST['proposal_unidadepagadora']; //(1 ou 0 - Sim/Não) Receber email
$proposal_cargosituacao = $_POST['proposal_cargosituacao']; //(1 ou 0 - Sim/Não) Receber email


if($proposal_option == "1"){
	
$receberemail = "Sim";

}
else{
	
$receberemail = "Nao";
	
}

$digitacao = "A Digitar";

$comando = "insert into propostas(status,url,tipo_contrato,tipo_proposta,valor_total,nome,cpf,telefone,email,tipo,receberemail,obs,digitacao,data_proposta,dataproposta,unidadepagadora,cargosituacao) values('$status','$proposal_page','SITE','SITE','$proposal_value','$proposal_name','$proposal_cpf','$proposal_phone','$proposal_email','$proposal_convenio','$receberemail','$proposal_product','$proposal_digitacao','$proposal_date','$proposal_data','$proposal_unidadepagadora','$proposal_cargosituacao')";



mysql_query($comando,$conexao);



$sql = "SELECT * FROM propostas where cpf = '$proposal_cpf' order by num_proposta desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$nome_cli = $linha[4];
$email_cli = $linha[23];

}


//DISPARA O EMAIL PARA O OPERADOR
	
	//PREPARA O PEDIDO

	$mens   =  "Olá $nome_cli! \n";
	$mens  .=  "$mensagem_do_email \n";
	
$mens  .=  $to = "$email_op_atribuir";
$from = "$email_op_atribuir";
$subject = "Olá $nome_cli! $texto2";
$html = "
<html>
<body>
Olá $nome_cli! $mensagem_do_email<b>!<br><br>

Nº de sua proposta: $proposta_atualizar<br>
Operador(a) que lhe irá atender: $nome_op_atribuir<br><br>

Para podermos dar andamento nela precisamos:<br><br>

RG frente e verso<br>
Comprovante de endereco<br>
Comprovante de renda<br>
Uma foto tipo selfie<br>

Caso prefira, fique a vontade em ligar para a pessoa que lhe irá atender!<br>
Agencia: $estabelecimento_atribuir<br>
Cidade: $cidade_estab_pertence<br>
Telefone: $tel_estab_pertence<br>
Celular: $fax<br>
</body>
</html>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (@mail($to, $subject, $html, $headers)) {
echo "Email enviado com sucesso para $email_op_atribuir!";
} else {
echo "Ocorreu um erro durante o envio do email para $email_op_atribuir.";
}

?>







<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>