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
</head>
<?

require '../../conect/conect.php';
	
	
	
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$operadorquevisualizou_p = $_POST['operadorqueabriu'];

$operadorquevisualizou_g = $_GET['operadorqueabriu'];
	
if(empty($operadorquevisualizou_p)){
$operadorqueabriu = $operadorquevisualizou_g;
}
else{
$operadorqueabriu = $operadorquevisualizou_p;
	}

//$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha'";
//$res = mysql_query($sql);
//while($linha=mysql_fetch_row($res)) {

//$operadorqueabriu = $linha[1];

//}
	
?>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 
body,td,th{
	font-size: 10px;
	color: #000000;
	font-weight: bold;
}
-->
</style>


<?
	
$tipo_contrato_p = $_POST['tipo_contrato'];
$tipo_contrato_g = $_GET['tipo_contrato'];
	if(empty($tipo_contrato_p)){
	$tipo_contrato = $tipo_contrato_g;
	}else{
	$tipo_contrato = $tipo_contrato_p;
	}

$solicitacao_p = $_POST['solicitacao'];
$solicitacao_g = $_GET['solicitacao'];
	if(empty($solicitacao_p)){
	$solicitacao = $solicitacao_g;
	}else{
	$solicitacao = $solicitacao_p;
	}


$digitacao_p = $_POST['digitacao'];
$digitacao_g = $_GET['digitacao'];
	if(empty($digitacao_p)){
	$digitacao = $digitacao_g;
	}
	else{
	$digitacao = $digitacao_p;
	}
	
$num_proposta_p = $_POST['num_da_proposta'];
$num_proposta_g = $_GET['num_da_proposta'];
	if(empty($num_proposta_p)){
	$num_proposta = $num_proposta_g;
	}
	else{
	$num_proposta = $num_proposta_p;
	}

$dia = date('d');
$mes = date('m');
$ano = date('Y');

$datadigitacao = "$dia-$mes-$ano";
$data_digitacao = "$ano-$mes-$dia";
$horadigitacao = date('H:i:s');


if(empty($digitacao)){
}
else{
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `digitacao` = '$digitacao',`datadigitacao` = '$datadigitacao',`data_digitacao` = '$data_digitacao',`horadigitacao` = '$horadigitacao',`operadorqueabriu` = '$operadorqueabriu' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";
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


<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>

<?

$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

//printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>


          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>



<form name="form1" method="post" action="propostas_a_digitar.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <span class="style3">
  <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo "$tipo_contrato"; ?>">
  </span>
<input class='class01' type="submit" name="Submit3" value="FILA DE ESPERA DE PROPOSTAS A DIGITAR">
</form>
<?


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
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
$num_beneficio = $linha[24];
$num_beneficio2 = $linha[80];
$num_beneficio3 = $linha[81];
$num_beneficio4 = $linha[82];
$tipo_proposta = $linha[83];
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
$bco_operacao = $linha[86];

$valor_liberado = $linha[97];
$obs2 = $linha[102];
$tabela = $linha[109];
$valor_total = $linha[113];
$valor_liquido_cliente = $linha[115];
	
$status_fisico = $linha[120];

$num_bordero = $linha[121];
	
$data_alteracao_status_fisico = $linha[123];
	
$termo_de_responsabilidade = $linha[149];

$termo = $linha[150];

$data_proposta = $linha[152];

$prazo_final = $linha[153];
	
$datadigitacao = $linha[155];
$horadigitacao = $linha[156];

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
	
$valorrenda = $linha[183];

$dia_niver = $linha[211];
$mes_niver = $linha[212];
$ano_niver = $linha[213];
$secretaria = $linha[214];
$categoria = $linha[215];
$proposal_celwhats = $linha[216];

$operadorquedigitou = $linha[217];
	
$tipovenda = $linha[219];
	
$senha_portalpass = $linha[249];
	$tem_margem = $linha[250];
	$tem_emprestimo = $linha[251];
	
	$fazer_contarto_novo = $linha[252];
	$refinanciar_daycoval = $linha[253];
	$fazer_cc_consignado = $linha[254];
	
}

?>
<?







?>
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[1];
$cel_operador_alterou = $linha[19];
$email_operador_alterou = $linha[20];
$estabelecimento_alterou = $linha[44];
$cidade_estabelecimento_alterou = $linha[45];
$tel_estabelecimento_alterou = $linha[46];
$email_estabelecimento_alterou = $linha[47];

}



?>

<?






$sql5 = "SELECT * FROM cad_empresa limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];

$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];


$endereco_empresa = $linha[5];

$numero_empresa = $linha[6];

$bairro_empresa = $linha[7];

$cep_empresa = $linha[9];

$cidade_empresa = $linha[10];

$estado_empresa = $linha[11];

$telefone_empresa = $linha[12];

$fax_empresa = $linha[13];

$email_empresa = $linha[14];

$site_empresa = $linha[15];

}



?>
<form name="form1" method="post" action="propostas_a_digitar.php">

<table width="100%" border="1" cellspacing="0">
    <tr>
      <td colspan="3"><div align="center"><strong><font color="#0000FF" size="4">PROPOSTA N&ordm;
        <?
	
//require_once('../../sistem/propostas/barcode.inc.php'); 
    //new barCodeGenrator("$num_proposta",1,"$num_proposta.gif", 70, 60, true);
	//echo '<img src="'.$num_proposta.'.gif" />';
		  echo "$num_proposta $tipovenda";
?>
      </font></strong></div></td>
      <td align="center"><strong><font color="#0000FF" size="2">
        <? if(empty($num_bordero)){} else{ echo "Border&ocirc; N&ordm; $num_bordero"; } ?>
      </font></strong></td>
      <td align="center"><strong><font color="#0000FF" size="2"><? echo "MATRICULA $matricula"; ?></font></strong></td>
    </tr>
    <tr>
      <td>Status Proposta</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $status; ?></font></strong></td>
      <td>Status do fisico</td>
      <td><strong><font color="#0000FF"><? echo $status_fisico; ?><? echo " $data_alteracao_status_fisico"; ?></font></strong></td>
    </tr>
    <tr>
      <td>Tipo da proposta </td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $tipo_proposta; ?></font></strong></td>
      <td>Data Limite para entrega do f&iacute;sico</td>
      <td><strong><font color="#0000FF"><? echo $prazo_final_formatado; ?></font></strong></td>
    </tr>
    <tr>
      <td>Margem Cart&atilde;o</td>
      <td colspan="2"><input class='class02' type="text" name="margemcartao" id="margemcartao"></td>
      <td>Margem Emprestimo</td>
      <td><input class='class02' type="text" name="margememprestimo" id="margememprestimo">
        <strong><font color="#0000FF">
        <input class='class01' type="submit" name="button" id="button" value="Atualizar">
      </font></strong></td>
    </tr>
    <tr>
      <td>Tabela</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $tabela; ?></font></strong></td>
      <td>Data da Proposta </td>
      <td><strong><font color="#0000FF"><? echo $dataproposta; ?></font></strong></td>
    </tr>
    <tr>
      <td>Operador</td>
      <td colspan="2"><strong><font color="#0000FF">
		  <? 
		  if($tipo_contrato=="SITE"){
			  ?>
        <select class='class02' name="nome_operador_a_atribuir" id="nome_operador_a_atribuir">
          <option selected><? echo $nome_operador; ?></option>
          <?

    $sql = "select * from operadores where status = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
        </select>
		  <?
		  }
		  else{
			  echo "$nome_operador";
		  }
		  ?>
      </font></strong></td>
      <td>Hora proposta</td>
      <td><strong><font color="#0000FF"><? echo $horaproposta; ?></font></strong></td>
    </tr>
    <tr>
      <td>Estabelecimento</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?></font></strong></td>
      <td>Perfil do cliente </td>
      <td><strong><font color="#0000FF"><? echo $tipo; ?></font></strong></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $nome; ?></font></strong></td>
      <td>CPF</td>
      <td>      <strong><font color="#0000FF"><? echo $cpf; ?></font></strong></td>
    </tr>
    <tr>
      <td>Secretaria</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $secretaria; ?></font></strong></td>
      <td>Categoria</td>
      <td><strong><font color="#0000FF"><? echo $categoria; ?></font></strong></td>
    </tr>
    <tr> 
      <td>N&ordm; Benef&iacute;cio </td>
      <td colspan="2">      <strong><font color="#0000FF"><? echo $num_beneficio; ?></font></strong></td>
      <td>N&ordm; Benef&iacute;cio 2 </td>
      <td><strong><font color="#0000FF"><? echo $num_beneficio2; ?></font> </strong>        </td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio 3 </td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $num_beneficio3; ?></font></strong></td>
      <td>N&ordm; Benef&iacute;cio 4 </td>
      <td><strong><font color="#0000FF"><? echo $num_beneficio4; ?></font></strong></td>
    </tr>
    <tr>
      <td>Data Nasc</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo "$dia_niver/$mes_niver/$ano_niver"; ?></font></strong></td>
      <td>RG</td>
      <td><strong><font color="#0000FF"><? echo $rg; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="14%">&Oacute;rg&atilde;o</td>
      <td colspan="2">      <strong><font color="#0000FF"><? echo $orgao; ?></font></strong></td>
      <td width="21%">Emiss&atilde;o</td>
      <td width="33%">        </font><strong><font color="#0000FF"><? echo $emissao; ?></font></strong></td>
    </tr>
    <tr>
      <td>Pai</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $pai; ?></font></strong></td>
      <td>M&atilde;e</td>
      <td><strong><font color="#0000FF"><? echo $mae; ?></font></strong></td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $endereco; ?></font></strong></td>
      <td>N&uacute;mero</td>
      <td><strong><font color="#0000FF"><? echo $numero; ?></font></strong></td>
    </tr>
    <tr>
      <td>Bairro</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $bairro; ?></font></strong></td>
      <td>Complemento</td>
      <td><strong><font color="#0000FF"><? echo $complemento; ?></font></strong></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $cidade; ?></font></strong></td>
      <td>Estado</td>
      <td>      <strong><font color="#0000FF"><? echo $estado; ?></font></strong></td>
    </tr>
    <tr>
      <td>Cep</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $cep; ?></font></strong></td>
      <td>Sexo</td>
      <td><strong><font color="#0000FF"><? echo $sexo; ?></font></strong></td>
    </tr>
    <tr>
      <td>Estado Civil </td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $estadocivil; ?></font></strong></td>
      <td>Telefone</td>
      <td><strong><font color="#0000FF"><? echo $telefone; ?></font></strong></td>
    </tr>
    <tr>
      <td>Como Conheceu a Empresa</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $resposta; ?></font></strong></td>
      <td>Naturalidade</td>
      <td><strong><font color="#0000FF"><? echo $naturalidade; ?></font></strong></td>
    </tr>
    <tr>
      <td>Celular/CelWhats</td>
      <td colspan="2"><strong><font color="#0000FF"><? echo "$celular - Cel/Whats $proposal_celwhats"; ?></font></strong></td>
      <td>E-Mail</td>
      <td><strong><font color="#0000FF"><? echo $email; ?></font></strong></td>
    </tr>
    <tr>
      <td><strong>Valor bruto da opera&ccedil;&atilde;o </strong></td>
      <td colspan="2"><font color="#0000FF"><strong><font color="#0000FF"><? echo "R$ ".$valor_total; ?></font></strong></font></td>
      <td><strong>Valor Lid cliente </strong></td>
      <td><strong><font color="#0000FF"><? echo "R$ ". $valor_liquido_cliente; ?></font></strong></td>
    </tr>
    <tr>
      <td>Banco Opera&ccedil;&atilde;o </td>
      <td colspan="2"><strong><font color="#000000"><? echo $bco_operacao; ?></font></strong></td>
      <td>Banco a ser Portado</td>
      <td><strong><font color="#000000"><? echo $bco_quitacao; ?></font></strong></td>
    </tr>
    <tr>
      <td>Quant de parcelas </td>
      <td colspan="2"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $quant_parc; ?></font></strong></font></strong></td>
      <td>Valor parcela </td>
      <td><strong><font color="#0000FF"><? echo $parcela; ?></font></strong></td>
    </tr>
    <tr>
      <td>Banco Pgto </td>
      <td colspan="2"><strong><font color="#0000FF"><? echo $banco_pagto; ?></font></strong></td>
      <td>N&ordm; Banco </td>
      <td><strong><font color="#0000FF"><? echo $num_banco; ?></font></strong></td>
    </tr>
    <tr>
      <td>Ag&ecirc;ncia</td>
      <td width="13%"><strong><font color="#0000FF"><? echo $agencia; ?></font></strong></td>
      <td width="19%"><div align="left">N&ordm; Conta <strong><font color="#0000FF"><? echo $conta; ?></font></strong><strong><font color="#0000FF"><? echo " - $tipo_conta"; ?></font></strong></div></td>
      <td>Tipo de pagto do Benef&iacute;cio</td>
      <td><strong><font color="#0000FF"><? echo $pagto_beneficio; ?></font></strong></td>
    </tr>
    <tr>
      <td>Senha Portal Pass</td>
      <td>Tem Margem?</td>
      <td>Tem Empr&eacute;stimo em qual banco?</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"><? echo $senha_portalpass; ?></font></strong></td>
      <td><strong><font color="#0000FF"><? echo $tem_margem; ?></font></strong></td>
      <td><strong><font color="#0000FF"><? echo $tem_emprestimo; ?></font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Quer Fazer um Contrato Novo?</td>
      <td>Refinanciar Daycoval?</td>
      <td>Fazer CC Consignado?</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"><? echo $fazer_contarto_novo; ?></font></strong></td>
      <td><strong><font color="#0000FF"><? echo $refinanciar_daycoval; ?></font></strong></td>
      <td><strong><font color="#0000FF"><? echo $fazer_cc_consignado; ?></font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="5" align="center"><strong>Refer&ecirc;ncias</strong></td>
    </tr>
    <tr>
      <td><strong>Nome</strong></td>
      <td colspan="4"><strong><font color="#000000"><? echo $nome_ref1; ?> Telefone <? echo $fone_ref1; ?> Grau de relacionamento <? echo $grau_relacionamento1; ?></font></strong></td>
    </tr>
    <tr>
      <td><strong>Nome</strong></td>
      <td colspan="4"><strong><font color="#000000"><? echo $nome_ref2; ?> Telefone <? echo $fone_ref2; ?> Grau de relacionamento <? echo $grau_relacionamento2; ?></font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '1' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta1 = $linha[2];

}


 ?>
          <? echo $pergunta1; ?></td>
      <td><? echo $resposta1; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '2' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta2 = $linha[2];

}


 ?>
          <? echo $pergunta2; ?></td>
      <td><? echo $resposta2; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '3' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta3 = $linha[2];

}


 ?>
          <? echo $pergunta3; ?></td>
      <td><? echo $resposta3; ?></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td><div align="center">Valor Parcela </div></td>
      <td colspan="2"><div align="center">Banco</div></td>
      <td><div align="center">Vencimento do contrato </div></td>
      <td><div align="center">Previs&atilde;o de compra em </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <strong><font color="#0000FF"><? echo $parc1; ?></font></strong> </div></td>
      <td colspan="2">
      <div align="center"><strong><font color="#0000FF"><? echo $banco1; ?></font></strong> </div></td>
      <td><div align="center">
      <strong><font color="#0000FF"><? echo $vencto1; ?></font></strong> </div></td>
      <td>
      <div align="center"><strong><font color="#0000FF"><? echo $compra1; ?></font></strong> </div></td>
    </tr>
    <tr>
      <td>Obs</td>
      <td colspan="3"><strong><font color="#0000FF"><? echo $obs; ?></font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Parecer de Cr&eacute;dito</td>
      <td colspan="3"><strong><font color="#0000FF">
        <?
	  
$sql = "SELECT * FROM observacoes_parecer_credito where num_proposta = '$num_proposta' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$data_parecer = $linha[3];

$hora_parecer = $linha[4];

$parecer_de_credito = $linha[5];


}
	  
	  
	  
	  
	  
	  
	  
	  
	   echo "$data_parecer - $hora_parecer $parecer_de_credito "; ?>
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Parecer Fisico</td>
      <td colspan="4"><?  
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
	  
?></td>
    </tr>
    <tr>
      <td colspan="5"><strong>Termo de Responsabilidade</strong></td>
    </tr>
    <tr>
      <td colspan="5"><strong><font color="#0000FF"><? echo $termo; ?></font></strong></td>
    </tr>
    <tr>
      <td><strong><? echo "Eu, $nome_operador CPF $cpf_op $termo_de_responsabilidade";  ?></strong></td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" align="center"><strong>Assinatura Operador_________________________________________</strong></td>
    </tr>
    <tr>
      <td colspan="5"><strong><font color="#0000FF" size="4"><? echo "Digitado: $operadorquedigitou em  $datadigitacao as $horadigitacao"; ?></font></strong></td>
    </tr>
  </table>
</form>
<p></p>
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

