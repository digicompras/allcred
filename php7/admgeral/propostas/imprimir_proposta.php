<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");



?>
<?

require '../../conect/conect.php';

?>


<html>

<head>

<title>TELA DE IMPRESS&Atilde;O DE PROPOSTAS</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<link href="../../css_menus/impressao.css" rel="stylesheet" type="text/css">
	
	
</head>

<?



//require '../../conect/conect.php';





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$fundo_navegacao = $linha[1];
	
	
}

?>





<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  
<form name="form1" method="post" action="javascript:window.close()">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Fechar">

</form>

<?

$num_proposta = $_POST['num_proposta'];

$num_propostaget = $_GET['num_proposta'];



if(empty($num_proposta)){

$num_proposta_retorno = $num_propostaget;

}

else{

$num_proposta_retorno = $num_proposta;

}




$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta_retorno'";
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

$num_beneficio = $linha[24];

$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];

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

$tipo_proposta = $linha[83];

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

	$vinculo = $linha[203];
	
$margemcartao = $linha[209];
$margememprestimo = $linha[210];

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
	
	$audio = $linha[269];
}
	
if(empty($vinculo)){
	
$analise_credito_buscar = $num_proposta;
	
}
else{
	
$analise_credito_buscar = $vinculo;
	
}

//Separa��o dos valores (dia, m�s e ano)
$arr = explode("-", $prazo_final);
 
$dialimite = $arr[2];
$meslimite = $arr[1];
$anolimite = $arr[0];

$prazo_final_formatado = "$dialimite-$meslimite-$anolimite";
?>

<?

$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$matricula = $linha[0];
$naturalidade = $linha[115];

$nomesocial = $linha[140];
$orientacaosexual = $linha[2];
}



$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '1' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '2' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '3' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '4' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '5' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '6' limit 1";
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

$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '7' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '8' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '9' limit 1";
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
	
$sql = "SELECT * FROM propostasanaliseportabilidade where num_proposta = '$analise_credito_buscar' and linha = '10' limit 1";
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
	
$sql = "SELECT * FROM propostasanalisecreditonovo where num_proposta = '$analise_credito_buscar' and cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$senha_servidor = $linha[5];
$margememprestimo = $linha[6];
$margememprestimo_parcela = $linha[7];
$margememprestimo_valorliberado = $linha[8];
$margememprestimo_bancodigitacao = $linha[9];
$margemcartao = $linha[10];
$margemcartao_parcela = $linha[11];
$margemcartao_valorliberado = $linha[12];
$margemcartao_bancodigitacao = $linha[13];
$debitoemconta = $linha[14];
$debitoemconta_parcela = $linha[15];
$debitoemconta_valorliberado = $linha[16];
$debitoemconta_bancodigitacao = $linha[17];
$creditocarne = $linha[18];
$creditocarne_parcela = $linha[19];
$creditocarne_valorliberado = $linha[20];
$creditocarne_bancodigitacao = $linha[21];
$creditocontaenergia = $linha[22];
$creditocontaenergia_parcela = $linha[23];
$creditocontaenergia_valorliberado = $linha[24];
$creditocontaenergia_bancodigitacao = $linha[25];

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

$cpf_op = $linha[4];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];



?>

<? } ?>

<form name="form1" method="post" action="">



<table width="100%" border="1" cellpadding="0" cellspacing="0">

    <tr>

      <td colspan="3"><div align="center"><strong><font  size="2"> 
        <? if(empty($vinculo)){ }else{ echo "Vinculo / Proposta Originaria: $vinculo"; } ?>
      </font></strong></div>        <div align="right"><strong></strong></div></td>

      <td colspan="2"><div align="center"><strong><font  size="2"> PROPOSTA N&ordm;
        <? echo " $num_proposta $tipovenda "; ?></font></strong></div></td>
      <td><div align="center"><strong><font  size="2"><? echo "MATRICULA $matricula"; ?></font></strong></div></td>
    </tr>

    <tr>
      <td>Status da proposta</td>
      <td colspan="3"><strong><font ><? echo $status; ?></font></strong></td>
      <td>Status do fisico</td>
      <td><strong><font ><? echo $status_fisico; ?><? echo " $data_alteracao_status_fisico"; ?></font></strong></td>
    </tr>
    <tr>

      <td>Tipo da proposta </td>

      <td colspan="3"><strong><font ><? echo $tipo_proposta; ?></font></strong></td>

      <td>Data Limite para entrega do f&iacute;sico</td>

      <td><strong><font ><? echo $prazo_final_formatado; ?></font></strong></td>
    </tr>

    <tr>
      <td>Margem Cart&atilde;o</td>
      <td colspan="3"><strong><font ><? echo $margemcartao; ?></font></strong></td>
      <td>Margem Empr&eacute;stimo</td>
      <td><strong><font ><? echo $margememprestimo; ?></font></strong></td>
    </tr>
    <tr> 

      <td>Tabela</td>

      <td colspan="3"><strong><font ><? echo $tabela; ?>

      </font></strong></td>

      <td>Data da Proposta </td>

      <td>      <strong><font ><? echo $dataproposta; ?></font></strong></td>
    </tr>

    <tr>

      <td>Operador</td>

      <td colspan="3"><strong><font ><? echo $nome_operador; ?>

      </font></strong></td>

      <td> Hora proposta</td>

      <td><strong><font ><? echo $horaproposta; ?></font></strong></td>
    </tr>

    <tr>

      <td>Estabelecimento</td>

      <td colspan="3"><strong><font ><? echo $estabelecimento_proposta; ?> </font></strong> </td>

      <td>Perfil do cliente </td>

      <td><strong><font ><? echo $tipo; ?></font></strong></td>
    </tr>

    <tr>

      <td>Nome</td>

      <td width="10%"><strong><font ><? echo $nome; ?></font></strong></td>
      <td width="6%">Nome Social</td>
      <td><strong><font ><? echo $nomesocial; ?></font></strong></td>

      <td>CPF</td>

      <td>      <strong><font ><? echo $cpf; ?></font></strong></td>
    </tr>

    <tr>
      <td>Secretaria</td>
      <td colspan="3"><strong><font ><? echo $secretaria; ?></font></strong></td>
      <td>Categoria</td>
      <td><strong><font ><? echo $categoria; ?></font></strong></td>
    </tr>
    <tr> 

      <td>N&ordm; Benef&iacute;cio </td>

      <td colspan="3">      <strong><font ><? echo $num_beneficio; ?></font></strong></td>

      <td>N&ordm; Benef&iacute;cio 2 </td>

      <td><strong><font ><? echo $num_beneficio2; ?></font> </strong>        </td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio 3 </td>

      <td colspan="3"><strong><font ><? echo $num_beneficio3; ?></font></strong></td>

      <td>N&ordm; Benef&iacute;cio 4 </td>

      <td><strong><font ><? echo $num_beneficio4; ?></font></strong></td>
    </tr>

    <tr>

      <td>Data Nasc</td>

      <td colspan="3"><strong><font ><? echo "$dia_niver/$mes_niver/$ano_niver"; ?></font></strong></td>

      <td>RG</td>

      <td><strong><font ><? echo $rg; ?></font></strong></td>
    </tr>

    <tr> 

      <td width="14%">&Oacute;rg&atilde;o</td>

      <td colspan="3">      <strong><font ><? echo $orgao; ?></font></strong></td>

      <td width="18%">Emiss&atilde;o</td>

      <td width="33%">        </font><strong><font ><? echo $emissao; ?></font></strong></td>
    </tr>

    <tr>

      <td>Pai</td>

      <td colspan="3"><strong><font ><? echo $pai; ?></font></strong></td>

      <td>M&atilde;e</td>

      <td><strong><font ><? echo $mae; ?></font></strong></td>
    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td colspan="3"><strong><font ><? echo $endereco; ?></font></strong></td>

      <td>N&uacute;mero</td>

      <td><strong><font ><? echo $numero; ?></font></strong></td>
    </tr>

    <tr>

      <td>Bairro</td>

      <td colspan="3"><strong><font ><? echo $bairro; ?></font></strong></td>

      <td>Complemento</td>

      <td><strong><font ><? echo $complemento; ?></font></strong></td>
    </tr>

    <tr>

      <td>Cidade</td>

      <td colspan="3"><strong><font ><? echo $cidade; ?></font></strong></td>

      <td>Estado</td>

      <td>      <strong><font ><? echo $estado; ?></font></strong></td>
    </tr>

    <tr>

      <td>Cep</td>

      <td colspan="3"><strong><font ><? echo $cep; ?></font></strong></td>

      <td>Orientacao Sexual</td>

      <td><strong><font ><? echo $orientacaosexual; ?></font></strong></td>
    </tr>

    <tr>

      <td>Estado Civil </td>

      <td colspan="3"><strong><font ><? echo $estadocivil; ?></font></strong></td>

      <td>Telefone</td>

      <td><strong><font ><? echo $telefone; ?></font></strong></td>
    </tr>

    <tr>
      <td>Como Conheceu a Empresa</td>
      <td colspan="3"><strong><font ><? echo $resposta; ?></font></strong></td>
      <td>Naturalidade</td>
      <td><strong><font ><? echo $naturalidade; ?></font></strong></td>
    </tr>
    <tr>

      <td>Celular/CelWhats</td>

      <td colspan="3"><strong><font ><? echo "$celular - Cel/Whats $proposal_celwhats"; ?></font></strong></td>

      <td>E-Mail</td>

      <td><strong><font ><? echo $email; ?></font></strong></td>
    </tr>

    <tr>

      <td><strong>Valor bruto da opera&ccedil;&atilde;o </strong></td>

      <td colspan="3"><font ><strong><font ><? echo "R$ ".$valor_total; ?></font></strong></font></td>

      <td><strong>Valor Lid cliente </strong></td>

      <td><strong><font ><? echo "R$ ". $valor_liquido_cliente; ?></font></strong></td>
    </tr>

    <tr>

      <td>Banco Opera&ccedil;&atilde;o </td>

      <td colspan="3"><strong><font color="#000000"><? echo $bco_operacao; ?></font></strong></td>

      <td>Banco a ser Portado</td>

      <td><strong><font color="#000000"><? echo $bco_quitacao; ?></font></strong></td>
    </tr>

    <tr>

      <td>Quant de parcelas </td>

      <td colspan="3"><strong><font ><strong><font ><? echo $quant_parc; ?></font></strong></font></strong></td>

      <td>Valor parcela </td>

      <td><strong><font ><? echo $parcela; ?></font></strong></td>
    </tr>

    <tr>

      <td>Banco Pgto </td>

      <td colspan="3"><strong><font ><? echo $banco_pagto; ?></font></strong></td>

      <td>N&ordm; Banco </td>

      <td><strong><font ><? echo $num_banco; ?></font></strong></td>
    </tr>

    <tr>

      <td>Ag&ecirc;ncia</td>

      <td colspan="2"><strong><font ><? echo $agencia; ?></font></strong></td>

      <td width="19%"><div align="left">N&ordm; Conta <strong><font ><? echo $conta; ?></font></strong><strong><font ><? echo " - $tipo_conta"; ?></font></strong></div></td>

      <td>Tipo de pagto do Benef&iacute;cio</td>

      <td><strong><font ><? echo $pagto_beneficio; ?></font></strong></td>
    </tr>

    <tr>
      <td>Senha Portal Pass</td>
      <td colspan="2">Tem Margem?</td>
      <td>Tem Empr&eacute;stimo em qual banco?</td>
      <td>Valor Renda</td>
      <td><strong><font ><? echo $valorrenda; ?></font></strong></td>
    </tr>
    <tr>
      <td><strong><font ><? echo $senha_portalpass; ?></font></strong></td>
      <td colspan="2"><strong><font ><? echo $tem_margem; ?></font></strong></td>
      <td><strong><font ><? echo $tem_emprestimo; ?></font></strong></td>
      <td>Promotora</td>
      <td><strong><font ><? echo $promotora; ?></font></strong></td>
    </tr>
    <tr>
      <td>Quer Fazer um Contrato Novo?</td>
      <td colspan="2">Refinanciar Daycoval?</td>
      <td>Fazer CC Consignado?</td>
      <td>SERVI&Ccedil;OS</td>
      <td><strong><font ><? echo $servicos; ?></font></strong></td>
    </tr>
    <tr>
      <td><strong><font ><? echo $fazer_contarto_novo; ?></font></strong></td>
      <td colspan="2"><strong><font ><? echo $refinanciar_daycoval; ?></font></strong></td>
      <td><strong><font ><? echo $fazer_cc_consignado; ?></font></strong></td>
      <td>Audio</td>
      <td><strong><font ><? echo $audio; ?></font></strong></td>
    </tr>
    <tr>
      <td colspan="6" align="center"><table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td colspan="8" align="center" background="../../imagens/fundocelulas1.png"><strong>ANALISE DE PORTABILIDADE</strong></td>
          </tr>
          <tr>
            <td width="7%" align="center"><strong>Parcela</strong></td>
            <td width="15%" align="center"><strong>Banco</strong></td>
            <td width="9%" align="center"><strong>Prazo contrato</strong></td>
            <td width="10%" align="center"><strong>Parcelas pagas</strong></td>
            <td width="8%" align="center"><strong>Taxa de Juros</strong></td>
            <td width="14%" align="center"><strong>Num Contrato</strong></td>
            <td width="19%" align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td width="18%" align="center"><strong>Tipo Opera&ccedil;&atilde;o</strong></td>
          </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao1; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao1; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao2; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao2; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao3; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao3; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao4; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao4; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao5; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao5; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao6; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao6; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao7; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao7; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao8; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao8; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao9; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao9; ?></font></strong></td>
            </tr>
          <tr>
            <td align="center"><strong><font ><? echo $parc10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $banco10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $vencto10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $parcelaspagas10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $taxajuros10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $numcontrato10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $bancodigitacao10; ?></font></strong></td>
            <td align="center"><strong><font ><? echo $tipooperacao10; ?></font></strong></td>
            </tr>
          <tr>
            <td colspan="8" align="center" ><table width="100%" border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="6" align="center"><strong>ANALISE DE CREDITO NOVO</strong></td>
              </tr>
              <tr>
                <td width="4%" align="center">&nbsp;</td>
                <td width="29%" align="center"><strong>Senha <font ><? echo $senha_servidor; ?></font></strong></td>
                <td width="11%" align="center">&nbsp;</td>
                <td colspan="2" align="center"><strong>E-Mail</strong></td>
                <td width="3%" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td colspan="2" align="center"><strong><font ><? echo $email; ?></font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Margem Empr&eacute;stimo <font ><? echo $margememprestimo; ?></font></strong></td>
                <td align="center">&nbsp;</td>
                <td width="22%" align="center">&nbsp;</td>
                <td width="31%" align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Margem Cart&atilde;o</strong> <strong><font ><? echo $margemcartao; ?></font></strong></td>
                <td align="center"><strong><font ><? echo $margememprestimo_parcela; ?></font></strong></td>
                <td align="center"><strong><font ><? echo $margememprestimo_valorliberado; ?></font></strong></td>
                <td align="center"><strong><font > </font><font ><? echo $margememprestimo_bancodigitacao; ?></font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Margem Bruta  de Beneficio</strong> <strong><font color="#0000FF"><? echo $debitoemconta; ?></font></strong></td>
                <td align="center"><strong>Parcela</strong></td>
                <td align="center"><strong>Valor Liberado</strong></td>
                <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center"><strong><font ><? echo $margemcartao_parcela; ?></font></strong></td>
                <td align="center"><strong><font ><? echo $margemcartao_valorliberado; ?></font></strong></td>
                <td align="center"><strong><font > </font><font ><? echo $margemcartao_bancodigitacao; ?></font></strong></td>
                <td align="center">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr></tr>
        </tbody>
      </table></td>
    </tr>

    <tr>

      <td>Obs</td>

      <td colspan="4"><strong><font ><? echo $obs; ?></font></strong></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Parecer de Cr&eacute;dito</td>

      <td colspan="5"><strong><font >
        <?
	  
$sql = "SELECT * FROM observacoes_parecer_credito where num_proposta = '$num_proposta' order by codigo desc limit 3";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$data_parecer = $linha[3];

$hora_parecer = $linha[4];

$parecer_de_credito = $linha[5];
	
$emitente_do_parecer_de_credito = $linha[6];

	
echo "$data_parecer - $hora_parecer $parecer_de_credito (Emitente do Parecer: $emitente_do_parecer_de_credito) <br>";

}
  
	  
	    ?>
      </font></strong></td>
    </tr>
    <tr>
      <td>Parecer Fisico</td>
      <td colspan="5"><?  
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
      <td colspan="6"><div align="center"><strong>Assinatura Operador_________________________________________</strong></div></td>
    </tr>
    <tr>
      <td colspan="6"><strong><font  size="4"><? echo "Digitado: $operadorquedigitou em  $datadigitacao as $horadigitacao"; ?></font></strong></td>
    </tr>
  </table>

</form>

<p></p>
</body>

</html>

