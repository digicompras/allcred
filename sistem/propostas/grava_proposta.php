

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
	
	
	//include 'grava_proposta_automatico_analise_credito.php';

	

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
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="28%"><form name="form1" method="post" action="../index.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class='class01' type="submit" name="Submit2" value="Voltar ao menu principal">
      </form></td>
      <td width="41%"><form action="imprimir_proposta.php" method="post" name="form1" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

  echo "<input class='class01' type='submit' name='Submit3' value='Imprimir Proposta'>";
  ?>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
      </form></td>
      <td width="31%"><form action="gera_proposta_filha.php" method="post" name="form1" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <strong><font color="#0000FF">
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
        <input name="tipovenda" type="hidden" id="tipovenda" value="<? echo $tipovenda; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_proposta; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="tabela" type="hidden" id="tabela" value="<? echo $tabela; ?>">
        </font></strong>
        <input name="dataproposta" type="hidden" id="dataproposta3" value="<? echo date('d-m-Y'); ?>">
        <input name="data_proposta" type="hidden" id="dataproposta4" value="<? echo $date; ?>">
        <input name="horaproposta" type="hidden" id="horaproposta3" value="<? echo $hora_atual; ?>">
        <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">
        <input name="dia" type="hidden" id="dataproposta" value="<? echo date('d'); ?>">
        <input name="mes" type="hidden" id="dataproposta2" value="<? echo date('m'); ?>">
        <input name="ano" type="hidden" id="ano" value="<? echo date('Y'); ?>">
        <strong><font color="#0000FF"></font></strong><strong><font color="#0000FF">
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $operador; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="status" type="hidden" id="status" value="<? echo "AGUARDANDO ATIVACAO"; ?>">
        <input name="status_pagto_cliente" type="hidden" id="status_pagto_cliente" value="<?  echo "Aguardando_Pagto"; ?>">
        <input name="status_fisico" type="hidden" id="status_fisico" value="<? echo "PENDENTE DE ENVIO"; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo $tipo_contrato; ?>">
        </font></strong>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        <input name="categoria" type="hidden" id="categoria" value="<? echo $categoria; ?>">
        <input name="rg" type="hidden" id="rg" value="<? echo $rg_cli; ?>">
        <strong>
        <input name="orgao" type="hidden" id="orgao" value="<? echo $orgao_cli; ?>">
        </strong>
        <input name="emissao" type="hidden" id="emissao" value="<? echo $emissao_cli; ?>">
        <input name="secretaria" type="hidden" id="secretaria" value="<? echo $secretaria; ?>">
        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
        <input name="orientacaosexual" type="hidden" id="orientacaosexual" value="<? echo $orientacaosexual; ?>">
        <input name="dia_niver" type="hidden" id="dia_niver" value="<? echo $dia_niver; ?>">
        <input name="mes_niver" type="hidden" id="mes_niver" value="<? echo $mes_niver; ?>">
        <input name="ano_niver" type="hidden" id="ano_niver" value="<? echo $ano_niver; ?>">
        <input name="pai" type="hidden" id="pai2" value="<? echo $pai_cli; ?>">
        <input name="mae" type="hidden" id="mae" value="<? echo $mae_cli; ?>">
        <input name="estadocivil" type="hidden" id="estadocivil" value="<? echo $estadocivil_cli; ?>">
        <input name="resposta" type="hidden" id="resposta" value="<? echo $resposta; ?>">
        <input class='class02' name="valorrenda" type="hidden" id="valorrenda" value="<? echo $valorrenda; ?>">
        <input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
        <input name="num_beneficio2" type="hidden" id="num_beneficio22" value="<? echo $num_beneficio2; ?>">
        <input name="num_beneficio3" type="hidden" id="num_beneficio32" value="<? echo $num_beneficio3; ?>">
        <input name="num_beneficio4" type="hidden" id="num_beneficio42" value="<? echo $num_beneficio4; ?>">
        <input name="endereco" type="hidden" id="endereco2" value="<? echo $endereco_cli; ?>">
        <input name="numero" type="hidden" id="numero" value="<? echo $numero_cli; ?>">
        <input name="complemento" type="hidden" id="complemento" value="<? echo $complemento_cli; ?>">
        <input name="bairro" type="hidden" id="bairro2" value="<? echo $bairro_cli; ?>">
        <input name="cep" type="hidden" id="cep2" value="<? echo $cep_cli; ?>">
        <input name="cidade" type="hidden" id="cidade2" value="<? echo $cidade_cli; ?>">
        <strong><font color="#0000FF">
        <input name="estado" type="hidden" id="estado" value="<? echo $estado_cli; ?>">
        </font></strong>
        <input name="pagto_beneficio" type="hidden" id="email2" value="<? echo $pagto_beneficio; ?>">
        <input class='class02' name="telefone" type="hidden" id="telefone3" value="<? echo $telefone_cli; ?>" size="15" maxlength="14">
        <input class='class02' name="celular" type="hidden" id="celular" value="<? echo $celular_cli; ?>" size="15" maxlength="14">
        <font color="#0000FF">
        <input class='class02' name="valor_total" type="hidden" id="valor_total" size="15">
        </font>
        <input class='class02' name="valor_liquido_cliente" type="hidden" id="valor_liquido_cliente" size="15">
        <font color="#0000FF">
        <input name="valor_credito" type="hidden" id="valor_credito" value="">
        <input name="valor_liberado" type="hidden" id="valor_liberado2" value="<? echo $valor_liberado; ?>">
        <input class='class02' name="quant_parc" type="hidden" id="quant_parc" size="15">
        </font>
        <input class='class02' name="parcela" type="hidden" id="parcela2" size="15">
        <strong><font color="#0000FF">
        <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo "$bco_operacao"; ?>">
        </font></strong>
        <input name="banco_pagto" type="hidden" id="banco_pagto" value="<? echo "$banco_pagto"; ?>">
        <strong><font color="#0000FF">
        <input class='class02' name="agencia" type="hidden" id="agencia" value="<? echo $agencia; ?>" size="15">
        </font></strong>
        <input class='class02' name="conta" type="hidden" id="conta2" value="<? echo $conta; ?>" size="15">
        <strong><font color="#0000FF">
        <input name="tipo_conta" type="hidden" id="tipo_conta" value="<? echo "$tipo_conta"; ?>">
        </font></strong><strong><font color="#0000FF">
        <input name="bco_quitacao" type="hidden" id="bco_quitacao" value="<? echo "$banco_pagto";
			 ?>">
        </font></strong>
        <input class='class02' name="nome_ref1" type="hidden" id="nome_ref1" size="50">
        <input class='class02' type="hidden" name="fone_ref1" id="fone_ref1">
        <input name="grau_relacionamento1" type="hidden" id="grau_relacionamento1" value="<?  echo "$grau_relacionamento1"; ?>">
        <input class='class02' name="nome_ref2" type="hidden" id="nome_ref2" size="50">
        <input class='class02' type="hidden" name="fone_ref2" id="fone_ref2">
        <input name="grau_relacionamento2" type="hidden" id="grau_relacionamento2" value="<?  echo "$grau_relacionamento2"; ?>">
        <input name="parc1" type="hidden" class='class02' id="parc1" size="5">
        <strong><font color="#0000FF">
        <input name="banco1" type="hidden" id="banco1" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto1" type="hidden" class='class02' id="vencto1" size="5">
        <input name="parcelaspagas1" type="hidden" class='class02' id="parcelaspagas1" size="5">
        <input name="taxajuros1" type="hidden" class='class02' id="taxajuros1" size="5">
        <input name="numcontrato1" type="hidden" class='class02' id="numcontrato1" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao1" type="hidden" class='class02' id="bancodigitacao1" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao1" type="hidden" class='class02' id="tipooperacao1" size="5" readonly="readonly">
        </font></strong>
        <input name="parc2" type="hidden" class='class02' id="parc2" size="5">
        <strong><font color="#0000FF">
        <input name="banco2" type="hidden" id="banco2" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto2" type="hidden" class='class02' id="vencto2" size="5">
        <input name="parcelaspagas2" type="hidden" class='class02' id="parcelaspagas2" size="5">
        <input name="taxajuros2" type="hidden" class='class02' id="taxajuros2" size="5">
        <input name="numcontrato2" type="hidden" class='class02' id="numcontrato2" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao2" type="hidden" class='class02' id="bancodigitacao2" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao2" type="hidden" class='class02' id="tipooperacao2" size="5" readonly="readonly">
        </font></strong>
        <input name="parc3" type="hidden" class='class02' id="parc3" size="5">
        <strong><font color="#0000FF">
        <input name="banco3" type="hidden" id="banco3" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto3" type="hidden" class='class02' id="vencto3" size="5">
        <input name="parcelaspagas3" type="hidden" class='class02' id="parcelaspagas3" size="5">
        <input name="taxajuros3" type="hidden" class='class02' id="taxajuros3" size="5">
        <input name="numcontrato3" type="hidden" class='class02' id="numcontrato3" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao3" type="hidden" class='class02' id="bancodigitacao3" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao3" type="hidden" class='class02' id="tipooperacao3" size="5" readonly="readonly">
        </font></strong>
        <input name="parc4" type="hidden" class='class02' id="parc4" size="5">
        <strong><font color="#0000FF">
        <input name="banco4" type="hidden" id="banco4" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto4" type="hidden" class='class02' id="vencto4" size="5">
        <input name="parcelaspagas4" type="hidden" class='class02' id="parcelaspagas4" size="5">
        <input name="taxajuros4" type="hidden" class='class02' id="taxajuros4" size="5">
        <input name="numcontrato4" type="hidden" class='class02' id="numcontrato4" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao4" type="hidden" class='class02' id="bancodigitacao4" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao4" type="hidden" class='class02' id="tipooperacao4" size="5" readonly="readonly">
        </font></strong>
        <input name="parc5" type="hidden" class='class02' id="parc5" size="5">
        <strong><font color="#0000FF">
        <input name="banco5" type="hidden" id="banco5" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto5" type="hidden" class='class02' id="vencto5" size="5">
        <input name="parcelaspagas5" type="hidden" class='class02' id="parcelaspagas5" size="5">
        <input name="taxajuros5" type="hidden" class='class02' id="taxajuros5" size="5">
        <input name="numcontrato5" type="hidden" class='class02' id="numcontrato5" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao5" type="hidden" class='class02' id="bancodigitacao5" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao5" type="hidden" class='class02' id="tipooperacao5" size="5" readonly="readonly">
        </font></strong>
        <input name="parc6" type="hidden" class='class02' id="parc6" size="5">
        <strong><font color="#0000FF">
        <input name="banco6" type="hidden" id="banco6" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto6" type="hidden" class='class02' id="vencto6" size="5">
        <input name="parcelaspagas6" type="hidden" class='class02' id="parcelaspagas6" size="5">
        <input name="taxajuros6" type="hidden" class='class02' id="taxajuros6" size="5">
        <input name="numcontrato6" type="hidden" class='class02' id="numcontrato6" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao6" type="hidden" class='class02' id="bancodigitacao6" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao6" type="hidden" class='class02' id="tipooperacao6" size="5" readonly="readonly">
        </font></strong>
        <input name="parc7" type="hidden" class='class02' id="parc7" size="5">
        <strong><font color="#0000FF">
        <input name="banco7" type="hidden" id="banco7" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto7" type="hidden" class='class02' id="vencto7" size="5">
        <input name="parcelaspagas7" type="hidden" class='class02' id="parcelaspagas7" size="5">
        <input name="taxajuros7" type="hidden" class='class02' id="taxajuros7" size="5">
        <input name="numcontrato7" type="hidden" class='class02' id="numcontrato7" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao7" type="hidden" class='class02' id="bancodigitacao7" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao7" type="hidden" class='class02' id="tipooperacao7" size="5" readonly="readonly">
        <input name="parc8" type="hidden" class='class02' id="parc8" size="5">
        <input name="banco8" type="hidden" id="banco8" value="<? echo "$banco_pagto"; ?>">
        <input name="vencto8" type="hidden" class='class02' id="vencto8" size="5">
        <input name="parcelaspagas8" type="hidden" class='class02' id="parcelaspagas8" size="5">
        <input name="taxajuros8" type="hidden" class='class02' id="taxajuros8" size="5">
        <input name="numcontrato8" type="hidden" class='class02' id="numcontrato8" size="10">
        <input name="bancodigitacao8" type="hidden" class='class02' id="bancodigitacao8" size="5" readonly="readonly">
        <input name="tipooperacao8" type="hidden" class='class02' id="tipooperacao8" size="5" readonly="readonly">
        <input name="parc9" type="hidden" class='class02' id="parc9" size="5">
        <input name="banco9" type="hidden" id="banco9" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto9" type="hidden" class='class02' id="vencto9" size="5">
        <input name="parcelaspagas9" type="hidden" class='class02' id="parcelaspagas9" size="5">
        <input name="taxajuros9" type="hidden" class='class02' id="taxajuros9" size="5">
        <input name="numcontrato9" type="hidden" class='class02' id="numcontrato9" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao9" type="hidden" class='class02' id="bancodigitacao9" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao9" type="hidden" class='class02' id="tipooperacao9" size="5" readonly="readonly">
        </font></strong>
        <input name="parc10" type="hidden" class='class02' id="parc10" size="5">
        <strong><font color="#0000FF">
        <input name="banco10" type="hidden" id="banco10" value="<? echo "$banco_pagto"; ?>">
        </font></strong>
        <input name="vencto10" type="hidden" class='class02' id="vencto10" size="5">
        <input name="parcelaspagas10" type="hidden" class='class02' id="parcelaspagas10" size="5">
        <input name="taxajuros10" type="hidden" class='class02' id="taxajuros10" size="5">
        <input name="numcontrato10" type="hidden" class='class02' id="numcontrato10" size="10">
        <strong><font color="#0000FF">
        <input name="bancodigitacao10" type="hidden" class='class02' id="bancodigitacao10" size="5" readonly="readonly">
        </font></strong><strong><font color="#0000FF">
        <input name="tipooperacao10" type="hidden" class='class02' id="tipooperacao10" size="5" readonly="readonly">
        </font></strong><strong>
        <input name="senha_servidor" type="hidden" class='class02' id="senha_servidor" size="5">
        </strong>
        <input name="email" type="hidden" class='class02' id="email" value="<? echo $email_cli; ?>" size="50">
        <strong>
        <input name="margememprestimo" type="hidden" class='class02' id="margememprestimo" size="5">
        </strong><strong>
        <input name="margememprestimo_parcela" type="hidden" class='class02' id="margememprestimo_parcela" size="5">
        </strong><strong>
        <input name="margememprestimo_valorliberado" type="hidden" class='class02' id="margememprestimo_valorliberado" size="5">
        </strong><strong>
        <input name="margememprestimo_bancodigitacao" type="hidden" class='class02' id="margememprestimo_bancodigitacao" size="5">
        </strong><strong>
        <input name="margemcartao" type="hidden" class='class02' id="margemcartao" size="5">
        </strong><strong>
        <input name="margemcartao_parcela" type="hidden" class='class02' id="margemcartao_parcela" size="5">
        </strong><strong>
        <input name="margemcartao_valorliberado" type="hidden" class='class02' id="margemcartao_valorliberado" size="5">
        </strong><strong>
        <input name="margemcartao_bancodigitacao" type="hidden" class='class02' id="margemcartao_bancodigitacao" size="5">
        </strong><strong>
        <input name="debitoemconta" type="hidden" class='class02' id="debitoemconta" size="5">
        </strong><strong>
        <input name="debitoemconta_parcela" type="hidden" class='class02' id="debitoemconta_parcela" size="5">
        </strong><strong>
        <input name="debitoemconta_valorliberado" type="hidden" class='class02' id="debitoemconta_valorliberado" size="5">
        </strong><strong>
        <input name="debitoemconta_bancodigitacao" type="hidden" class='class02' id="debitoemconta_bancodigitacao" size="5">
        </strong><strong>
        <input name="creditocarne" type="hidden" class='class02' id="creditocarne" size="5">
        </strong><strong>
        <input name="creditocarne_parcela" type="hidden" class='class02' id="creditocarne_parcela" size="5">
        </strong><strong>
        <input name="creditocarne_valorliberado" type="hidden" class='class02' id="creditocarne_valorliberado" size="5">
        </strong><strong>
        <input name="creditocarne_bancodigitacao" type="hidden" class='class02' id="creditocarne_bancodigitacao" size="5">
        </strong><strong>
        <input name="creditocontaenergia" type="hidden" class='class02' id="creditocontaenergia" size="5">
        </strong><strong>
        <input name="creditocontaenergia_parcela" type="hidden" class='class02' id="creditocontaenergia_parcela" size="5">
        </strong><strong>
        <input name="creditocontaenergia_valorliberado" type="hidden" class='class02' id="creditocontaenergia_valorliberado" size="5">
        </strong><strong>
        <input name="creditocontaenergia_bancodigitacao" type="hidden" class='class02' id="creditocontaenergia_bancodigitacao" size="5">
        </strong>
        <input type="hidden" name="obs" id="obs" <? echo $obs_cli; ?>>
        <strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento; ?>">
        <input name="operador_alterou" type="hidden" id="operador_alterou">
        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou">
        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou">
        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou">
        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou">
        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou">
        <input name="recebido" type="hidden" id="recebido" value="<? echo "NAO"; ?>">
        <input name="resposta1" type="hidden" id="resposta1" value="<? echo "NAO"; ?>">
        <input name="resposta2" type="hidden" id="resposta2" value="<? echo "NAO"; ?>">
        <input name="resposta3" type="hidden" id="resposta3" value="<? echo "NAO"; ?>">
        <input name="termo" type="hidden" id="termo" value="<? echo $termo;  ?>">
        </font></strong> <strong>
        <input name="termo_de_responsabilidade" type="hidden" id="termo_de_responsabilidade" value="<? echo $termo_de_responsabilidade;  ?>">
        </strong>
<select class='class02' name="tipo_contrato_para_gerar_proposta_filha" id="tipo_contrato_para_gerar_proposta_filha">
  <?
$sql = "select * from tipo_contrato where tipo_contrato <> 'COMPRA' and status = 'Ativo' and proposta_automatica = 'SIM' order by tipo_contrato asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_contrato']."</option>";
    }
?>
</select>
<input class='class01' type="submit" name="Submit" value="Gerar proposta filha">
      </form></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>