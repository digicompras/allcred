<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>

<html>
<head>
<title>TELA DE IMPRESS&Atilde;O DE PROPOSTAS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body,td,th {
	font-size: 10px;
}
</style>
</head>
</head>
<?

require '../../conect/conect.php';


$sql = "SELECT * FROM permissoesdetela";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$referencias = $linha[1];

}

?>

<?

//$digitacao = $_POST['digitacao'];
//$num_proposta = $_POST['num_proposta'];

$digitacao = $_GET['digitacao'];
$num_da_proposta = $_GET['num_da_proposta'];
$operadorqueabriu = $_GET['operadorqueabriu'];
$tipo_contrato = $_GET['tipo_contrato'];




$dia = date('d');
$mes = date('m');
$ano = date('Y');

$datadigitacao = "$dia-$mes-$ano";
$horadigitacao = date('H:i:s');


if(empty($digitacao)){
}
else{
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `digitacao` = '$digitacao',`datadigitacao` = '$datadigitacao',`horadigitacao` = '$horadigitacao' where `propostas`. `num_proposta` = '$num_da_proposta' limit 1 ";
}

mysql_query($comando,$conexao);

}

?>


<?
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  
  
<? } ?>
<?


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM propostas where num_proposta = '$num_da_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_proposta = $linha[0];

$nome_operador = $linha[1];

$tipo = $linha[2];

$estabelecimento_proposta = $linha[3];

$nome = $linha[4];

$sexo = $linha[5];

$estadocivil = $linha[6];

$cpf = $linha[7];

$rg = $linha[8];

$orgao = $linha[9];

$emissao = $linha[10];

$data_nasc = $linha[11];

$pai = $linha[12];

$mae = $linha[13];

$endereco = $linha[14];

$numero = $linha[15];

$bairro = $linha[16];

$complemento = $linha[17];

$cidade = $linha[18];

$estado = $linha[19];

$cep = $linha[20];

$telefone = $linha[21];

$celular = $linha[22];

$email = $linha[23];
	$email_cli = $linha[23];

$num_beneficio = $linha[24];
	
$valor_credito = $linha[25];

$quant_parc_gravado = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];

$valor_credito = $linha[25];

$quant_parc = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc1 = $linha[52];

$banco1 = $linha[53];

$vencto1 = $linha[54];

$compra1 = $linha[55];



$parc2 = $linha[56];

$banco2 = $linha[57];

$vencto2 = $linha[58];

$compra2 = $linha[59];



$parc3 = $linha[60];

$banco3 = $linha[61];

$vencto3 = $linha[62];

$compra3 = $linha[63];



$parc4 = $linha[64];

$banco4 = $linha[65];

$vencto4 = $linha[66];

$compra4 = $linha[67];



$parc5 = $linha[68];

$banco5 = $linha[69];

$vencto5 = $linha[70];

$compra5 = $linha[71];



$parc6 = $linha[72];

$banco6 = $linha[73];

$vencto6 = $linha[74];

$compra6 = $linha[75];



$parc7 = $linha[76];

$banco7 = $linha[77];

$vencto7 = $linha[78];

$compra7 = $linha[79];
	
$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];

$tipo_proposta = $linha[83];

$bco_operacao = $linha[86];
	
$valor_a_receber = $linha[87];

$recebido = $linha[88];

$data_recebimento = $linha[89];

$valor_liberado = $linha[97];

$tipo_capital = $linha[98];

$percentual_op = $linha[100];

$comissao_op = $linha[101];
	
$obs2 = $linha[102];
	$obs3 = $linha[102];

$tabela = $linha[109];
	
$dia_alteracao_status = $linha[110];

$mes_alteracao_status = $linha[111];

$ano_alteracao_status = $linha[112];

$valor_total = $linha[113];
	
$campanha_gravada = $linha[114];

$valor_liquido_cliente = $linha[115];

$status_fisico = $linha[120];

$num_bordero = $linha[121];

//$dia_niver = $linha[138];
//$mes_niver = $linha[88];
//$ano_niver = $linha[139];

$termo_de_responsabilidade = $linha[149];

$termo = $linha[150];

$data_proposta = $linha[152];

$prazo_final = $linha[153];

$tipo_conta = $linha[159];

$resposta = $linha[160];

$bco_quitacao = $linha[161];
$nome_ref1 = $linha[162];
$fone_ref1 = $linha[163];
$grau_relacionamento1 = $linha[164];
$nome_ref2 = $linha[165];
$fone_ref2 = $linha[166];
$grau_relacionamento2 = $linha[167];
$resposta1 = $linha[168];
$resposta2 = $linha[169];
$resposta3 = $linha[170];

$pagto_beneficio = $linha[176];
	
$num_contrato_bco = $linha[177];
$valorrenda = $linha[183];
$custo_operacao = $linha[187];


$dia_parc = $linha[188];

$mes_parc = $linha[189];

$ano_parc = $linha[190];


$iniciocontrato = $linha[192];
$venctocontrato = $linha[193];
$percentual_comissao_avista = $linha[197];
$percentual_comissao_avista_decimal = $linha[198];
$percentual_comissao_diferido = $linha[200];
$percentual_comissao_diferido_decimal = $linha[201];
$valor_a_receber_diferido = $linha[202];
$vinculo = $linha[203];
$vinculo_anterior = $linha[204];

$dia_niver = $linha[211];
$mes_niver = $linha[212];
$ano_niver = $linha[213];
$secretaria = $linha[214];
$categoria = $linha[215];
	
	$tipovenda = $linha[219];
	
	$senha_portalpass = $linha[249];
	$tem_margem = $linha[250];
	$tem_emprestimo = $linha[251];
	
	$fazer_contarto_novo = $linha[252];
	$refinanciar_daycoval = $linha[253];
	$fazer_cc_consignado = $linha[254];
	$promotora = $linha[255];
	
	$numcontrato1 = $linha[257];
	$numcontrato2 = $linha[258];
	$numcontrato3 = $linha[259];
	$numcontrato4 = $linha[260];
	$numcontrato5 = $linha[261];
	$numcontrato6 = $linha[262];
	$numcontrato7 = $linha[263];
	$numcontrato8 = $linha[264];
	$numcontrato9 = $linha[265];
	$numcontrato10 = $linha[266];
	
	$servicos = $linha[267];

}

?>


<?

$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$matricula = $linha[0];
$naturalidade = $linha[115];


}
	
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '1' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc1 = $linha[4];
$banco1 = $linha[5];
$vencto1 = $linha[6];
$parcelaspagas1 = $linha[7];
$taxajuros1 = $linha[8];
$valorliberado1 = $linha[9];
$bancodigitacao1 = $linha[10];
$tipooperacao1 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '2' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc2 = $linha[4];
$banco2 = $linha[5];
$vencto2 = $linha[6];
$parcelaspagas2 = $linha[7];
$taxajuros2 = $linha[8];
$valorliberado2 = $linha[9];
$bancodigitacao2 = $linha[10];
$tipooperacao2 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '3' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc3 = $linha[4];
$banco3 = $linha[5];
$vencto3 = $linha[6];
$parcelaspagas3 = $linha[7];
$taxajuros3 = $linha[8];
$valorliberado3 = $linha[9];
$bancodigitacao3 = $linha[10];
$tipooperacao3 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '4' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc4 = $linha[4];
$banco4 = $linha[5];
$vencto4 = $linha[6];
$parcelaspagas4 = $linha[7];
$taxajuros4 = $linha[8];
$valorliberado4 = $linha[9];
$bancodigitacao4 = $linha[10];
$tipooperacao4 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '5' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc5 = $linha[4];
$banco5 = $linha[5];
$vencto5 = $linha[6];
$parcelaspagas5 = $linha[7];
$taxajuros5 = $linha[8];
$valorliberado5 = $linha[9];
$bancodigitacao5 = $linha[10];
$tipooperacao5 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '6' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc6 = $linha[4];
$banco6 = $linha[5];
$vencto6 = $linha[6];
$parcelaspagas6 = $linha[7];
$taxajuros6 = $linha[8];
$valorliberado6 = $linha[9];
$bancodigitacao6 = $linha[10];
$tipooperacao6 = $linha[11];

}

$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '7' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc7 = $linha[4];
$banco7 = $linha[5];
$vencto7 = $linha[6];
$parcelaspagas7 = $linha[7];
$taxajuros7 = $linha[8];
$valorliberado7 = $linha[9];
$bancodigitacao7 = $linha[10];
$tipooperacao7 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '8' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc8 = $linha[4];
$banco8 = $linha[5];
$vencto8 = $linha[6];
$parcelaspagas8 = $linha[7];
$taxajuros8 = $linha[8];
$valorliberado8 = $linha[9];
$bancodigitacao8 = $linha[10];
$tipooperacao8 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '9' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc9 = $linha[4];
$banco9 = $linha[5];
$vencto9 = $linha[6];
$parcelaspagas9 = $linha[7];
$taxajuros9 = $linha[8];
$valorliberado9 = $linha[9];
$bancodigitacao9 = $linha[10];
$tipooperacao9 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$num_proposta' and linha = '10' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$parc10 = $linha[4];
$banco10 = $linha[5];
$vencto10 = $linha[6];
$parcelaspagas10 = $linha[7];
$taxajuros10 = $linha[8];
$valorliberado10 = $linha[9];
$bancodigitacao10 = $linha[10];
$tipooperacao10 = $linha[11];

}
	
$sql = "SELECT * FROM propostasanalisecreditonovo where num_proposta = '$num_proposta' and cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$senha_servidor = $linha[5];
$margememprestimo = $linha[6];
$margemcartao = $linha[10];

}



?>



<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[1];
$cel_operador_alterou = $linha[19];
$email_operador_alterou = $linha[20];
$estabelecimento_alterou = $linha[24];
$cidade_estabelecimento_alterou = $linha[25];
$tel_estabelecimento_alterou = $linha[26];
$email_estabelecimento_alterou = $linha[27];

?>
<? } ?>
<form name="form1" method="post" action="propostas_a_digitar.php">
  <table width="100%" border="1">
    <tr>
      <td colspan="5" align="center" bgcolor="#ffffff"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type='hidden' name='tipo_do_contrato' id='tipo_do_contrato' value='<?  echo "$tipo_contrato"; ?>'>
        <input type='hidden' name='tipo_contrato' id='tipo_contrato' value='<?  echo "$tipo_contrato"; ?>'>
<input type='hidden' name='solicitacao' id='solicitacao' value='responderanalisedeproposta'>
<input class="class01" type="submit" name="Submit" value="Salvar"></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#ffffff"><div align="center"><strong><font color="#000000" size="2"> IMPRESS&Atilde;O DE PROPOSTA N&ordm;
        <?
	
//require_once('../../sistem/propostas/barcode.inc.php'); 
    //new barCodeGenrator("$num_proposta",1,"$num_proposta.gif", 70, 60, true);
	//echo '<img src="'.$num_proposta.'.gif" />';
		  echo "$num_proposta $tipovenda";
?>
      </font></strong>
          <input type='hidden' name='num_proposta' id='num_proposta' value='<? echo "$num_proposta"; ?>'>
      </div>
        <div align="right"></div></td>
      <td bgcolor="#ffffff"><div align="center"><strong>BORDER&Ocirc;</strong></div></td>
      <td bgcolor="#ffffff"><div align="left"><strong><font color="#0000FF"><? echo $num_bordero; ?></font></strong></div></td>
      <td bgcolor="#ffffff"><div align="center"><strong><font size="5"><font color="#000000" size="2">MATRICULA </font><font color="#0000FF"><? echo $matricula; ?></font></font></strong></div></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Status da proposta</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $status; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Status do fisico</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $status_fisico; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Tipo da proposta</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $tipo_proposta; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Data Limite para entrega do f&iacute;sico</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $prazo_final_formatado; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Tabela</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $tabela; ?> </font></strong></td>
      <td bgcolor="#ffffff"><strong>Data da Proposta </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $dataproposta; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Operador</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $nome_operador; ?> </font></strong></td>
      <td bgcolor="#ffffff"><strong>Hora proposta</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $horaproposta; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Estabelecimento</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Perfil do cliente </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $tipo; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Nome</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $nome; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>CPF</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $cpf; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Secretaria</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $secretaria; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Categoria</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $categoria; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>N&ordm; Benef&iacute;cio </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $num_beneficio; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>N&ordm; Benef&iacute;cio 2 </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $num_beneficio2; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>N&ordm; Benef&iacute;cio 3 </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $num_beneficio3; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>N&ordm; Benef&iacute;cio 4 </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $num_beneficio4; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Data Nasc</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo "$dia_niver/$mes_niver/$ano_niver"; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>RG</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $rg; ?></font></strong></td>
    </tr>
    <tr>
      <td width="14%" bgcolor="#ffffff"><strong>&Oacute;rg&atilde;o</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $orgao; ?></font></strong></td>
      <td width="18%" bgcolor="#ffffff"><strong>Emiss&atilde;o</strong></td>
      <td width="33%" bgcolor="#ffffff"><strong></font><font color="#0000FF"><? echo $emissao; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Pai</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $pai; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>M&atilde;e</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $mae; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Endere&ccedil;o</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $endereco; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>N&uacute;mero</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $numero; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Bairro</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $bairro; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Complemento</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $complemento; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Cidade</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $cidade; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Estado</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $estado; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Cep</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $cep; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Sexo</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $sexo; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Estado Civil </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $estadocivil; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Telefone</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $telefone; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Como Conheceu a Empresa</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $resposta; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Naturalidade</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $naturalidade; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Celular</strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $celular; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>E-Mail</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $email; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Valor bruto da opera&ccedil;&atilde;o </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><font color="#0000FF"><? echo "R$ ".$valor_total; ?></font></font></strong></td>
      <td bgcolor="#ffffff"><strong>Valor Lid cliente </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo "R$ ". $valor_liquido_cliente; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Banco Opera&ccedil;&atilde;o </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#000000"><? echo $bco_operacao; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>Banco a ser Portado</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#000000"><? echo $bco_quitacao; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Quant de parcelas </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><font color="#0000FF"><? echo $quant_parc_gravado; ?></font></font></strong></td>
      <td bgcolor="#ffffff"><strong>Valor parcela </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $parcela; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Banco Pgto </strong></td>
      <td colspan="2" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $banco_pagto; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong>N&ordm; Banco </strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $num_banco; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Ag&ecirc;ncia</strong></td>
      <td width="23%" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $agencia; ?></font></strong></td>
      <td width="12%" bgcolor="#ffffff"><div align="left"><strong>N&ordm; Conta <font color="#0000FF"><? echo $conta; ?><? echo " - $tipo_conta"; ?></font></strong></div></td>
      <td bgcolor="#ffffff"><strong>Tipo de pagto do Benef&iacute;cio</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $pagto_beneficio; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">Senha Portal Pass</td>
      <td bgcolor="#ffffff">Tem Margem?</td>
      <td bgcolor="#ffffff">Tem Empr&eacute;stimo em qual banco?</td>
      <td bgcolor="#ffffff"><strong>Valor Renda</strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $valorrenda; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $senha_portalpass; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $tem_margem; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $tem_emprestimo; ?></font></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">Quer Fazer um Contrato Novo?</td>
      <td bgcolor="#ffffff">Refinanciar Daycoval?</td>
      <td bgcolor="#ffffff">Fazer CC Consignado?</td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $fazer_contarto_novo; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $refinanciar_daycoval; ?></font></strong></td>
      <td bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $fazer_cc_consignado; ?></font></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
	<?
	  if($referencias=="sim"){
	  ?>
    <tr>
      <td colspan="3" bgcolor="#ffffff"><strong>Refer&ecirc;ncias</strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Nome</strong></td>
      <td colspan="4" bgcolor="#ffffff"><strong><font color="#000000"><? echo $nome_ref1; ?> Telefone <? echo $fone_ref1; ?> Grau de relacionamento <? echo $grau_relacionamento1; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Nome</strong></td>
      <td colspan="4" bgcolor="#ffffff"><strong><font color="#000000"><? echo $nome_ref2; ?> Telefone <? echo $fone_ref2; ?> Grau de relacionamento <? echo $grau_relacionamento2; ?></font></strong></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td colspan="2" bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td colspan="2" bgcolor="#ffffff"><strong>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '1' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta1 = $linha[2];

}


 ?>
        <? echo $pergunta1; ?></strong></td>
      <td bgcolor="#ffffff"><strong><? echo $resposta1; ?></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td colspan="2" bgcolor="#ffffff"><strong>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '2' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta2 = $linha[2];

}


 ?>
        <? echo $pergunta2; ?></strong></td>
      <td bgcolor="#ffffff"><strong><? echo $resposta2; ?></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td colspan="2" bgcolor="#ffffff"><strong>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '3' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta3 = $linha[2];

}


 ?>
        <? echo $pergunta3; ?></strong></td>
      <td bgcolor="#ffffff"><strong><? echo $resposta3; ?></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><div align="center"><strong>Valor Parcela </strong></div></td>
      <td colspan="2" bgcolor="#ffffff"><div align="center"><strong>Banco</strong></div></td>
      <td bgcolor="#ffffff"><div align="center"><strong>Vencimento do contrato </strong></div></td>
      <td bgcolor="#ffffff"><div align="center"><strong>Previs&atilde;o de compra em </strong></div></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><div align="center"> <strong><font color="#0000FF"><? echo $parc1; ?></font></strong></div></td>
      <td colspan="2" bgcolor="#ffffff"><div align="center"><strong><font color="#0000FF"><? echo $banco1; ?></font></strong></div></td>
      <td bgcolor="#ffffff"><div align="center"> <strong><font color="#0000FF"><? echo $vencto1; ?></font></strong></div></td>
      <td bgcolor="#ffffff"><div align="center"><strong><font color="#0000FF"><? echo $compra1; ?></font></strong></div></td>
    </tr>
	<? } ?>
    <tr>
      <td colspan="5" align="center" bgcolor="#ffffff"><table width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="9" align="center" background="../../imagens/fundocelulas1.png"><strong>ANALISE DE PORTABILIDADE</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="7" align="center"><table width="100%" border="0" cellspacing="4">
              <tr>
                <td colspan="4"><div align="center"><font color="#0000FF" size="4">
                  <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
                  EDITANDO PROPOSTA N&ordm; <strong><? echo $num_proposta; ?>
                    <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
                  </strong></font></div></td>
              </tr>
              <tr>
                <td width="24%">Data ultima altera&ccedil;&atilde;o de Status</td>
                <td width="22%"><select name="dia_alteracao_status" id="dia_alteracao_status">
                  <option selected><? echo $dia_alteracao_status; ?></option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>
                </select>
                  <select name="mes_alteracao_status" id="mes_alteracao_status">
                    <option selected><? echo $mes_alteracao_status; ?></option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                  <select name="ano_alteracao_status" id="ano_alteracao_status">
                    <?
		if(empty($ano_alteracao_status)){
		 $ano_atual = date('Y'); 
		 }
		 else{
		 $ano_atual = $ano_alteracao_status;
		 }
		 
		 ?>
                    <option>
                      <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
                      </option>
                    <option selected><? echo $ano_atual; ?></option>
                    <option>
                      <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
                      </option>
                  </select>
                  <? echo " - $horaalteracao"; ?></td>
                <td width="21%">Cliente</td>
                <td width="33%"><p><strong><font color="#0000FF"><? echo $nome; ?></font></strong><strong><font color="#0000FF">
                  <input name="campanha" type="hidden" id="campanha" value="<? if($campanha_gravada==""){echo "selecione"; } else{echo $campanha_gravada; } ?>">
                  </font></strong><strong><font color="#0000FF">
                    <? //echo "Ser&aacute; calculado"; ?>
                    <input name="retorno" type="hidden" id="retorno2" value="<? $calculo = bcmul($valor_credito, $spread, 2)/14400.00; $calculo_spread = bcmul($calculo,100,2); echo $calculo_spread; ?>">
                    <? //$calculo2 = bcmul($valor_credito, $spread, 2)/14400.00; $calculo_spread2 = bcmul($calculo2,100,2); echo $calculo_spread2;?>
                  </font></strong></p></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><strong><font color="#0000FF">
                  <select name="status" id="select11">
                    <option selected><? echo $status; ?></option>
                    <?

    $sql = "select * from status where condicao = 'ativo'  group by status order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }

?>
                  </select>
                  <input name="mes_ano_status" type="hidden" id="mes_ano_status" value="<? echo date('m-Y'); ?>">
                </font></strong></td>
                <td>CPF do cliente </td>
                <td><strong><font color="#0000FF"><? echo $cpf; ?>
                  <input name="cpf" type="hidden" id="cpf2" value="<? echo $cpf; ?>">
                </font></strong><strong><font color="#0000FF"> </font></strong><strong><font color="#0000FF"> </font></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">Observa&ccedil;&otilde;es</div></td>
                <td><strong><font color="#0000FF"><? echo "$mes_parc23 - $mes_parc24"; ?></font></strong></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><textarea name="obs2" cols="45" rows="7" id="obs2"><? echo $obs3; ?></textarea></td>
                <td colspan="2"><textarea name="parecer_credito" cols="45" rows="7" readonly="readonly" id="parecer_credito"><?  

$sql = "SELECT * FROM observacoes_parecer_credito where num_proposta = '$num_proposta' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$num_proposta_cli = $linha[1];

$cpf = $linha[2];

$data = $linha[3];

$hora = $linha[4];

$parecer_de_credito = $linha[5];

$operador = $linha[6];





echo "$data - "."$parecer_de_credito - "."$operador";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>

            </textarea></td>
              </tr>
              </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="6%"><strong>Parcela</strong></td>
            <td width="6%"><strong>Banco</strong></td>
            <td width="10%"><strong>Prazo contrato</strong></td>
            <td width="14%"><strong>Parcelas pagas</strong></td>
            <td width="13%"><strong>Taxa de Juros</strong></td>
            <td width="14%" align="center"><strong>Num Contrato</strong></td>
            <td width="14%"><strong>Valor Liberado</strong></td>
            <td width="19%"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td width="18%"><strong>Tipo Opera&ccedil;&atilde;o</strong></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato1; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado1" type="text" class='class02' id="valorliberado1" size="5">
              <input name="linha1" type="hidden" class='class02' id="linha1" value="1" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao1" id="bancodigitacao1">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
            </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao1" id="tipooperacao1">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato2; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado2" type="text" class='class02' id="valorliberado2" size="5">
              <input name="linha2" type="hidden" class='class02' id="linha2" value="2" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao2" id="bancodigitacao2">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao2" id="tipooperacao2">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato3; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado3" type="text" class='class02' id="valorliberado3" size="5">
              <input name="linha3" type="hidden" class='class02' id="linha3" value="3" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao3" id="bancodigitacao3">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao3" id="tipooperacao3">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato4; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado4" type="text" class='class02' id="valorliberado4" size="5">
              <input name="linha4" type="hidden" class='class02' id="linha4" value="4" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao4" id="bancodigitacao4">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao4" id="tipooperacao4">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato5; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado5" type="text" class='class02' id="valorliberado5" size="5">
              <input name="linha5" type="hidden" class='class02' id="linha5" value="5" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao5" id="bancodigitacao5">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao5" id="tipooperacao5">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato6; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado6" type="text" class='class02' id="valorliberado6" size="5">
              <input name="linha6" type="hidden" class='class02' id="linha6" value="6" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao6" id="bancodigitacao6">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao6" id="tipooperacao6">
              <option selected>
               
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato7; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado7" type="text" class='class02' id="valorliberado7" size="5">
              <input name="linha7" type="hidden" class='class02' id="linha7" value="7" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao7" id="bancodigitacao7">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao7" id="tipooperacao7">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato8; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado8" type="text" class='class02' id="valorliberado8" size="5">
              <input name="linha8" type="hidden" class='class02' id="linha8" value="8" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao8" id="bancodigitacao8">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao8" id="tipooperacao8">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato9; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado9" type="text" class='class02' id="valorliberado9" size="5">
              <input name="linha9" type="hidden" class='class02' id="linha9" value="9" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao9" id="bancodigitacao9">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao9" id="tipooperacao9">
              <option selected>
                
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato10; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado10" type="text" class='class02' id="valorliberado10" size="5">
              <input name="linha10" type="hidden" class='class02' id="linha10" value="10" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao10" id="bancodigitacao10">
                <option selected></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao10" id="tipooperacao10">
              <option selected>
               
                </option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>
          <tr>
            <td colspan="9" align="center"><table width="100%">
              <tr>
                <td colspan="6" align="center"><strong>ANALISE DE CREDITO NOVO</strong></td>
                </tr>
              <tr>
                <td width="4%" align="center">&nbsp;</td>
                <td width="29%" align="center"><strong>Senha</strong></td>
                <td width="11%" align="center">&nbsp;</td>
                <td colspan="2" align="center"><strong>E-Mail</strong></td>
                <td width="3%" align="center">&nbsp;</td>
                </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong><font color="#0000FF"><? echo $senha_servidor; ?></font></strong></td>
                <td align="center">&nbsp;</td>
                <td colspan="2" align="center"><input name="email" type="text" class='class02' id="email" value="<? echo $email_cli; ?>" size="50"></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Margem Empr&eacute;stimo</strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td width="22%" align="center"><strong>Valor Liberado</strong></td>
                <td width="31%" align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong><font color="#0000FF"><? echo $margememprestimo; ?></font></strong></td>
                <td align="center"><strong>
                  <input name="margememprestimo_parcela" type="text" class='class02' id="margememprestimo_parcela" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="margememprestimo_valorliberado" type="text" class='class02' id="margememprestimo_valorliberado" size="5">
                  </strong></td>
                <td align="center"><strong><font color="#0000FF"> </font><font color="#0000FF">
                  <select class='class02' name="margememprestimo_bancodigitacao" id="margememprestimo_bancodigitacao">
                    <option selected></option>
                    <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
                    </select>
                  </font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Margem Cart&atilde;o</strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong><font color="#0000FF"><? echo $margemcartao; ?></font></strong></td>
                <td align="center"><strong>
                  <input name="margemcartao_parcela" type="text" class='class02' id="margemcartao_parcela" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="margemcartao_valorliberado" type="text" class='class02' id="margemcartao_valorliberado" size="5">
                  </strong></td>
                <td align="center"><strong><font color="#0000FF"> </font><font color="#0000FF">
                  <select class='class02' name="margemcartao_bancodigitacao" id="margemcartao_bancodigitacao">
                    <option selected></option>
                    <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
                    </select>
                  </font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>D&eacute;bito em Conta</strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>
                  <input name="debitoemconta" type="text" class='class02' id="debitoemconta" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="debitoemconta_parcela" type="text" class='class02' id="debitoemconta_parcela" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="debitoemconta_valorliberado" type="text" class='class02' id="debitoemconta_valorliberado" size="5">
                  </strong></td>
                <td align="center"><strong><font color="#0000FF"> </font><font color="#0000FF">
                  <select class='class02' name="debitoemconta_bancodigitacao" id="debitoemconta_bancodigitacao">
                    <option selected></option>
                    <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
                    </select>
                  </font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Cr&eacute;dito Carn&ecirc;</strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>
                  <input name="creditocarne" type="text" class='class02' id="creditocarne" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="creditocarne_parcela" type="text" class='class02' id="creditocarne_parcela" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="creditocarne_valorliberado" type="text" class='class02' id="creditocarne_valorliberado" size="5">
                  </strong></td>
                <td align="center"><strong><font color="#0000FF"> </font><font color="#0000FF">
                  <select class='class02' name="creditocarne_bancodigitacao" id="creditocarne_bancodigitacao">
                    <option selected></option>
                    <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
                    </select>
                  </font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Cr&eacute;dito Conta Energia</strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>
                  <input name="creditocontaenergia" type="text" class='class02' id="creditocontaenergia" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="creditocontaenergia_parcela" type="text" class='class02' id="creditocontaenergia_parcela" size="5">
                  </strong></td>
                <td align="center"><strong>
                  <input name="creditocontaenergia_valorliberado" type="text" class='class02' id="creditocontaenergia_valorliberado" size="5">
                  </strong></td>
                <td align="center"><strong><font color="#0000FF"> </font><font color="#0000FF">
                  <select class='class02' name="creditocontaenergia_bancodigitacao" id="creditocontaenergia_bancodigitacao">
                    <option selected></option>
                    <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
                  </select>
                  </font></strong></td>
                <td align="center">&nbsp;</td>
                </tr>
              <tr>
                <td colspan="6" align="center">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Obs</strong></td>
      <td colspan="3" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $obs; ?></font></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Parecer de Cr&eacute;dito</strong></td>
      <td colspan="3" bgcolor="#ffffff"><strong><font color="#0000FF"><? echo $obs2; ?></font></strong></td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Parecer Fisico</strong></td>
      <td colspan="4" bgcolor="#ffffff"><strong>
        <?  
$sql = "SELECT * FROM historico_fisico where num_proposta = '$num_proposta' order by codigo desc limit 1";
$res = mysql_query($sql);
$reg = 0;
//echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$num_proposta = $linha[1];
$obs_fisico = $linha[2];
$data = $linha[3];
$hora = $linha[7];
$operador_informante = $linha[8];
$estabelecimento = $linha[9];


echo "$data - "." $hora - "." $obs_fisico ";


if($reg==1){
//echo "</tr>";
$reg=0;
}


}
	  
?>
      </strong></td>
    </tr>
  </table>
</form>
</body>
</html>
strong> </div></td>

    </tr>

    <tr>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $parc6; ?></font></strong> </div></td>

      <td colspan="2"><div align="center">

        <strong><font color="#0000FF"><? echo $banco6; ?></font></strong> </div></td>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $vencto6; ?></font></strong> </div></td>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $compra6; ?></font></strong> </div></td>

    </tr>

    <tr>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $parc7; ?></font></strong> </div></td>

      <td colspan="2"><div align="center">

        <strong><font color="#0000FF"><? echo $banco7; ?></font></strong> </div></td>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $vencto7; ?></font></strong> </div></td>

      <td><div align="center">

        <strong><font color="#0000FF"><? echo $compra7; ?></font></strong> </div></td>

    </tr>

    <tr>

      <td>Obs</td>

      <td colspan="3"><strong><font color="#0000FF"><? echo $obs; ?></font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Parecer de Cr&eacute;dito</td>

      <td colspan="3"><strong><font color="#0000FF"><? echo $obs2; ?></font></strong></td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

</body>

</html>

