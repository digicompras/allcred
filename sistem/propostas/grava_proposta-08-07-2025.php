

<?php

session_start(); //inicia sessÃ£o...

if ($_SESSION["usuario"] == true) //verifica se a variÃ¡vel "usuario" Ã© verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variÃ¡vel "senha" Ã© verdadeira...

echo ""; //se for emite mensagem positiva.

else //se nÃ£o for...

header("Location: alerta.php");


require '../../conect/conect.php';

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}

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
	background-repeat: no-repeat;
	background-attachment: fixed;

}

-->
</style>
</head>



<?

//require("conexao.php"); or die("erro na requisiÃ§Ã£o");




$resposta1 = $_POST['resposta1'];
$resposta2 = $_POST['resposta2'];
$resposta3 = $_POST['resposta3'];


$nome_ref1 = $_POST['nome_ref1'];
$fone_ref1 = $_POST['fone_ref1'];
$grau_relacionamento1 = $_POST['grau_relacionamento1'];
$nome_ref2 = $_POST['nome_ref2'];
$fone_ref2 = $_POST['fone_ref2'];
$grau_relacionamento2 = $_POST['grau_relacionamento2'];


?>

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">

<?

//DeclaraÃ§Ã£o de uma variÃ¡vel com uma data
$dia = date('d');
$mes = date('m');
$ano = date('Y');

$data_limite_envio_proposta_fisica = "$dia-$mes-$ano";



echo "Data da efetivaÃ§Ã£o da proposta " . $data_limite_envio_proposta_fisica . "<br />";

 
//SeparaÃ§Ã£o dos valores (dia, mÃªs e ano)
$arr = explode("-", $data_limite_envio_proposta_fisica);
 
$dialimite = $arr[0];
$meslimite = $arr[1];
$anolimite = $arr[2];


 
//PerÃ­odo (Qtd. de dias para somar ou subtrair)
$sql = "SELECT * FROM prazo_entrega_fisico limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$periodo = $linha[1];

}
 
//Somar Data
$data_inc = date('d-m-Y', mktime(0, 0, 0, $meslimite, $dialimite + $periodo, $anolimite));



echo "Data limite para entrega do fÃ­sico na matriz: " . $data_inc . "<br />";

$data_inc_inversa = date('Y-m-d', mktime(0, 0, 0, $meslimite, $dialimite + $periodo, $anolimite));


$prazo_final = $data_inc_inversa;




 
//Subtrair Data
//$data_dec = date('d-m-Y', mktime(0, 0, 0, $mes, $dia - $periodo, $ano));
//echo "Data decrementada: " . $data_dec . "<br />";
 
//Somar Ano
//$ano_inc = date('d-m-Y', mktime(0, 0, 0, $mes, $dia, $ano + $periodo));
//echo "Ano incrementado: " . $ano_inc . "<br />";
 
//Subtrair MÃªs
//$mes_dec = date('d-m-Y', mktime(0, 0, 0, $mes - $periodo, $dia, $ano));
//echo "MÃªs decrementado: " . $mes_dec;


echo "<script>



alert('ATENÃ‡ÃƒO!!!... VOCÃŠ TEM ATÃ‰ $data_inc PARA ENVIAR O CONTRATO FISICO PARA MATRIZ!');

</script>";


?>


<?

// dados da proposta
	
$tipovenda = $_POST['tipovenda'];

$status = $_POST['status'];

$status_pagto_cliente = $_POST['status_pagto_cliente'];

$nome_operador = $_POST['nome_operador'];

$tipo_proposta = $_POST['tipo_proposta'];

$tipo_contrato = $_POST['tipo_contrato'];

$tabela = $_POST['tabela'];

$tipo = $_POST['tipo'];

$dataproposta = $_POST['dataproposta'];

$horaproposta = $_POST['horaproposta'];

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$nome = $_POST['nome'];

$resposta = $_POST['resposta'];

$cpf = $_POST['cpf'];

$num_beneficio = $_POST['num_beneficio'];

$num_beneficio2 = $_POST['num_beneficio2'];

$num_beneficio3 = $_POST['num_beneficio3'];

$num_beneficio4 = $_POST['num_beneficio4'];

$dia_niver = $_POST['dia_niver'];

$mes_niver = $_POST['mes_niver'];

$ano_niver = $_POST['ano_niver'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$orientacaosexual = $_POST['orientacaosexual'];

$estadocivil = $_POST['estadocivil'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$email = $_POST['email'];

$valor_credito = $_POST['valor_credito'];

$valor_total = $_POST['valor_total'];

$valor_liquido_cliente = $_POST['valor_liquido_cliente'];

$valor_liberado = $_POST['valor_liberado'];

$quant_parc = $_POST['quant_parc'];

$parcela = $_POST['parcela'];

$banco_pagto = $_POST['banco_pagto'];

$bco_operacao = $_POST['bco_operacao'];

$num_banco = $_POST['num_banco'];

$agencia = $_POST['agencia'];

$conta = $_POST['conta'];

$bco_quitacao = $_POST['bco_quitacao'];

$obs = $_POST['obs'];
	
$audio = $_POST['audio'];

$recebido = $_POST['recebido'];

$termo_de_responsabilidade = $_POST['termo_de_responsabilidade'];

$termo = $_POST['termo'];

$data_proposta = $_POST['data_proposta'];

$tipo_conta = $_POST['tipo_conta'];

$pagto_beneficio = $_POST['pagto_beneficio'];

$valorrenda = $_POST['valorrenda'];

$secretaria = $_POST['secretaria'];

$categoria = $_POST['categoria'];
	
	

	
$parc1 = $_POST['parc1'];

$banco1 = $_POST['banco1'];

$vencto1 = $_POST['vencto1'];

$parcelaspagas1 = $_POST['parcelaspagas1'];
	
$taxajuros1 = $_POST['taxajuros1'];

$valorliberado1 = $_POST['valorliberado1'];
	
$bancodigitacao1 = $_POST['bancodigitacao1'];

$tipooperacao1 = $_POST['tipooperacao1'];
	
	
$parc2 = $_POST['parc2'];

$banco2 = $_POST['banco2'];

$vencto2 = $_POST['vencto2'];

$parcelaspagas2 = $_POST['parcelaspagas2'];
	
$taxajuros2 = $_POST['taxajuros2'];

$valorliberado2 = $_POST['valorliberado2'];
	
$bancodigitacao2 = $_POST['bancodigitacao2'];

$tipooperacao2 = $_POST['tipooperacao2'];
	
	
$parc3 = $_POST['parc3'];

$banco3 = $_POST['banco3'];

$vencto3 = $_POST['vencto3'];

$parcelaspagas3 = $_POST['parcelaspagas3'];
	
$taxajuros3 = $_POST['taxajuros3'];

$valorliberado3 = $_POST['valorliberado3'];
	
$bancodigitacao3 = $_POST['bancodigitacao3'];

$tipooperacao3 = $_POST['tipooperacao3'];
	
	
$parc4 = $_POST['parc4'];

$banco4 = $_POST['banco4'];

$vencto4 = $_POST['vencto4'];

$parcelaspagas4 = $_POST['parcelaspagas4'];
	
$taxajuros4 = $_POST['taxajuros4'];

$valorliberado4 = $_POST['valorliberado4'];
	
$bancodigitacao4 = $_POST['bancodigitacao4'];

$tipooperacao4 = $_POST['tipooperacao4'];
	
	
$parc5 = $_POST['parc5'];

$banco5 = $_POST['banco5'];

$vencto5 = $_POST['vencto5'];

$parcelaspagas5 = $_POST['parcelaspagas5'];
	
$taxajuros5 = $_POST['taxajuros5'];

$valorliberado5 = $_POST['valorliberado5'];
	
$bancodigitacao5 = $_POST['bancodigitacao5'];

$tipooperacao5 = $_POST['tipooperacao5'];
	
	
$parc6 = $_POST['parc6'];

$banco6 = $_POST['banco6'];

$vencto6 = $_POST['vencto6'];

$parcelaspagas6 = $_POST['parcelaspagas6'];
	
$taxajuros6 = $_POST['taxajuros6'];

$valorliberado6 = $_POST['valorliberado6'];
	
$bancodigitacao6 = $_POST['bancodigitacao6'];

$tipooperacao6 = $_POST['tipooperacao6'];
	
	
$parc7 = $_POST['parc7'];

$banco7 = $_POST['banco7'];

$vencto7 = $_POST['vencto7'];

$parcelaspagas7 = $_POST['parcelaspagas7'];
	
$taxajuros7 = $_POST['taxajuros7'];

$valorliberado7 = $_POST['valorliberado7'];
	
$bancodigitacao7 = $_POST['bancodigitacao7'];

$tipooperacao7 = $_POST['tipooperacao7'];
	
	
$parc8 = $_POST['parc8'];

$banco8 = $_POST['banco8'];

$vencto8 = $_POST['vencto8'];

$parcelaspagas8 = $_POST['parcelaspagas8'];
	
$taxajuros8 = $_POST['taxajuros8'];

$valorliberado8 = $_POST['valorliberado8'];
	
$bancodigitacao8 = $_POST['bancodigitacao8'];

$tipooperacao8 = $_POST['tipooperacao8'];
	
	
$parc9 = $_POST['parc9'];

$banco9 = $_POST['banco9'];

$vencto9 = $_POST['vencto9'];

$parcelaspagas9 = $_POST['parcelaspagas9'];
	
$taxajuros9 = $_POST['taxajuros9'];

$valorliberado9 = $_POST['valorliberado9'];
	
$bancodigitacao9 = $_POST['bancodigitacao9'];

$tipooperacao9 = $_POST['tipooperacao9'];
	
	
$parc10 = $_POST['parc10'];

$banco10 = $_POST['banco10'];

$vencto10 = $_POST['vencto10'];

$parcelaspagas10 = $_POST['parcelaspagas10'];
	
$taxajuros10 = $_POST['taxajuros10'];

$valorliberado10 = $_POST['valorliberado10'];
	
$bancodigitacao10 = $_POST['bancodigitacao10'];

$tipooperacao10 = $_POST['tipooperacao10'];

	
$senha_servidor = $_POST['senha_servidor'];
	
	
$margememprestimo = $_POST['margememprestimo'];
$margememprestimo_parcela = $_POST['margememprestimo_parcela'];
$margememprestimo_valorliberado = $_POST['margememprestimo_valorliberado'];
$margememprestimo_bancodigitacao = $_POST['margememprestimo_bancodigitacao'];
	
	
$margemcartao = $_POST['margemcartao'];
$margemcartao_parcela = $_POST['margemcartao_parcela'];
$margemcartao_valorliberado = $_POST['margemcartao_valorliberado'];
$margemcartao_bancodigitacao = $_POST['margemcartao_bancodigitacao'];
	
$debitoemconta = $_POST['debitoemconta'];
$debitoemconta_parcela = $_POST['debitoemconta_parcela'];
$debitoemconta_valorliberado = $_POST['debitoemconta_valorliberado'];
$debitoemconta_bancodigitacao = $_POST['debitoemconta_bancodigitacao'];
	
	
$creditocarne = $_POST['creditocarne'];
$creditocarne_parcela = $_POST['creditocarne_parcela'];
$creditocarne_valorliberado = $_POST['creditocarne_valorliberado'];
$creditocarne_bancodigitacao = $_POST['creditocarne_bancodigitacao'];
	
	
$creditocontaenergia = $_POST['creditocontaenergia'];
$creditocontaenergia_parcela = $_POST['creditocontaenergia_parcela'];
$creditocontaenergia_valorliberado = $_POST['creditocontaenergia_valorliberado'];
$creditocontaenergia_bancodigitacao = $_POST['creditocontaenergia_bancodigitacao'];
	
	


$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];



$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento



$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$estabelecimento_alterou = $_POST['estabelecimento_alterou'];

$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];

$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];

$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];



$status = $_POST['status'];

$mes_ano = $_POST['mes_ano'];



$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];



$status_fisico = $_POST['status_fisico'];

$digitacao = "A Digitar";
	
	

$numcontrato1 = $_POST['numcontrato1'];
	$numcontrato2 = $_POST['numcontrato2'];
	$numcontrato3 = $_POST['numcontrato3'];
	$numcontrato4 = $_POST['numcontrato4'];
	$numcontrato5 = $_POST['numcontrato5'];
	$numcontrato6 = $_POST['numcontrato6'];
	$numcontrato7 = $_POST['numcontrato7'];
	$numcontrato8 = $_POST['numcontrato8'];
	$numcontrato9 = $_POST['numcontrato9'];
	$numcontrato10 = $_POST['numcontrato10'];
	







$sql = "SELECT * FROM clientes where cpf = '$cpf'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cod_cli = $linha[0];
	
$nomesocial = $linha[140];

$telefone_cli = $linha[18];

$celular_cli = $linha[19];

$email_cli = $linha[20];

$senha_servidor_cli = $linha[125];
	
$valorrenda_cli = $linha[136];

}



//Aqui comeÃ§a a verificaÃ§Ã£o do telefone do cliente



if($telefone<>$telefone_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$telefone'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$telefone')";

mysql_query($comando,$conexao);





}



// Aqui comeÃ§a a verificaÃ§Ã£o do celular do cliente

}





if($celular<>$celular_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$celular'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$celular')";

mysql_query($comando,$conexao);





}





}


if($email<>$email_cli){

$comando = "update `$db`.`clientes` set `email` = '$email' where `clientes`. `codigo` = '$cod_cli' limit 1 ";
mysql_query($comando,$conexao);

}
	
if($senha_servidor<>$senha_servidor_cli){

$comando = "update `$db`.`clientes` set `senha_servidor` = '$senha_servidor' where `clientes`. `codigo` = '$cod_cli' limit 1 ";
mysql_query($comando,$conexao);

}
	
if($valorrenda<>$valorrenda_cli){

$comando = "update `$db`.`clientes` set `valorrenda` = '$valorrenda' where `clientes`. `codigo` = '$cod_cli' limit 1 ";
mysql_query($comando,$conexao);

}



$comando = "insert into propostas(status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,audio,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano,recebido,status_pagto_cliente,dia,mes,ano,tabela,valor_total,valor_liquido_cliente,status_fisico,num_bordero,tipo_contrato,termo_de_responsabilidade,termo,data_proposta,prazo_final,digitacao,tipo_conta,resposta,bco_quitacao,nome_ref1,fone_ref1,grau_relacionamento1,nome_ref2,fone_ref2,grau_relacionamento2,resposta1,resposta2,resposta3,pagto_beneficio,valorrenda,dia_niver,mes_niver,ano_niver,secretaria,categoria,tipovenda,senha_portalpass,tem_margem,tem_emprestimo,numcontrato1,numcontrato2,numcontrato3,numcontrato4,numcontrato5,numcontrato6,numcontrato7,numcontrato8,numcontrato9,numcontrato10,nomesocial,parc2,parc3,parc4,parc5,parc6,parc7,parc8,parc9,parc10) values('$status','$nome_operador','$tipo','$tipo_proposta','$dataproposta','$horaproposta','$estabelecimento_proposta','$nome','$cpf','$num_beneficio','$rg','$orgao','$emissao','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$orientacaosexual','$estadocivil','$telefone','$celular','$email','$valor_credito','$valor_liberado','$quant_parc','$parcela','$banco_pagto','$bco_operacao','$num_banco','$agencia','$conta','$parc1','$banco1','$vencto1','$compra1','$obs','$audio','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_beneficio2','$num_beneficio3','$num_beneficio4','$mes_ano','$recebido','$status_pagto_cliente','$dia','$mes','$ano','$tabela','$valor_total','$valor_liquido_cliente','$status_fisico','','$tipo_contrato','$termo_de_responsabilidade','$termo','$data_proposta','$prazo_final','$digitacao','$tipo_conta','$resposta','$bco_quitacao','$nome_ref1','$fone_ref1','$grau_relacionamento1','$nome_ref2','$fone_ref2','$grau_relacionamento2','$resposta1','$resposta2','$resposta3','$pagto_beneficio','$valorrenda','$dia_niver','$mes_niver','$ano_niver','$secretaria','$categoria','$tipovenda','$senha_portalpass','$tem_margem','$tem_emprestimo','$numcontrato1','$numcontrato2','$numcontrato3','$numcontrato4','$numcontrato5','$numcontrato6','$numcontrato7','$numcontrato8','$numcontrato9','$numcontrato10','$nomesocial','$parc2','$parc3','$parc4','$parc5','$parc6','$parc7','$parc8','$parc9','$parc10')";

mysql_query($comando,$conexao);

echo "Proposta efetuada com sucesso!<br><br>";
	
	
	


?>





<?

$sql = "SELECT * FROM propostas order by num_proposta desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$nome = $linha[4];

$cpf = $linha[7];

$tipo_proposta = $linha[83];

$tipo = $linha[2];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$status = $linha[51];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$bco_operacao = $linha[86];

$valor_total = $linha[113];

$tipo_contrato = $linha[136];

$resposta = $linha[160];


}
	
	
//------------------------
	
	
	include 'grava_proposta_automatico_analise_credito.php';

	

	//----------------------------
	
include 'propostasanaliseportabilidade.php';
	
?>






<?


printf("O nÃºmero da proposta Ã©: $num_proposta");


?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {




$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];


}

	

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	
$sql = "SELECT * FROM tipo_contrato where tipo_contrato = '$tipo_contrato' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


//$tipocontrato = $linha[1];
$email_mesa = $linha[2];

}
	
$email_dest = $email_mesa;


	// FIM DO SCRIPT DO EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO


	

	//PREPARA O PEDIDO

	$mens   =  "OlÃ¡! Sua proposta foi efetiva com sucesso na $nfantasia!   \n";

	$mens  .=  "Visite-nos $site \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";
	
	$mens  .=  "Como Conheceu a Empresa: ".$resposta."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Perfil do cliente: ".$tipo."                                                    \n";

	$mens  .=  "Tipo de Proposta: ".$tipo_proposta."                                                    \n";
	
	$mens  .=  "Tipo de Contrato: ".$tipo_contrato."                                                    \n";
	
	$mens  .=  "Banco de OperaÃ§Ã£o: ".$bco_operacao."                                                    \n";
	
	$mens  .=  "Valor Bruto da operaÃ§Ã£o: ".$valor_total."                                                    \n";
	
	$mens  .=  "Valor LÃ­quido da operaÃ§Ã£o: ".$valor_liquido_cliente."                                                    \n";
	
	$mens  .=  "Prazo: ".$quant_parc."                                                    \n";
	
	$mens  .=  "Parcela: ".$parcela."                                                    \n";
	
	$mens  .=  "Tabela da OperaÃ§Ã£o: ".$tabela."                                                    \n";

	$mens  .=  "Data da proposta: ".$dataproposta."                                                    \n";

	$mens  .=  "Hora da proposta: ".$horaproposta."                                                    \n";

	$mens  .=  "NÃºmero da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Status: ".$status."                                                    \n";

	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Proposta NÂº ".$num_proposta." efetuada no sistema em ".$dataproposta, $mens,"From:".$email_dest."\r\nBcc:".$email);

	//$envia  =  mail($email_operador, "Proposta NÂº ".$num_proposta.", ".$operador."! Efetue ativaÃ§Ã£o no sistema",$mens,"From:".$email_dest);



?>









<p>&nbsp;</p>

<form action="imprimir_proposta.php" method="post" name="form1" target="_blank">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?

  echo "<input class='class01' type='submit' name='Submit3' value='Imprimir Proposta'>";
  ?>

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

</form>

<form name="form1" method="post" action="../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class='class01' type="submit" name="Submit2" value="Voltar ao menu principal">

</form>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>