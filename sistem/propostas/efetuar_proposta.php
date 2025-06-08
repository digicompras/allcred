<?php
session_start(); //inicia sessÃ£o...
if ($_SESSION["usuario"] == true) //verifica se a variÃ¡vel "usuario" Ã© verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variÃ¡vel "senha" Ã© verdadeira...
echo ""; //se for emite mensagem positiva.
else //se nÃ£o for...
header("Location: alerta.php");


require '../../conect/conect.php';
include '../../css_menus/modalpropostas.css';

?>



<html>
<head>
<title>FORMULARIO DE PROPOSTAS</title>
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


$date = date('Y-m-d');


?>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	
$sql = "SELECT * FROM permissoesdetela";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$referencias = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">

<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>



<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class='class01' type="submit" name="Submit3" value="Voltar">
</form>
<p>
  <?
$tipo = $_POST['tipo'];
$tipo_proposta = $_POST['tipo_proposta'];
$tipo_contrato = $_POST['tipo_contrato'];
$tipovenda = $_POST['tipovenda'];
$cpf = $_POST['cpf'];
$categoria = $_POST['categoria'];
$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$valor_liberado = $_POST['valor_liberado'];
$bco_operacao = $_POST['bco_operacao'];
$tabela = $_POST['tabela'];
$termo_de_responsabilidade = $_POST['termo_de_responsabilidade'];
$bloqueio_compra = $_POST['bloqueio_compra'];
$valorrenda = $_POST['valorrenda'];

?>
  
  
  <?

if((empty($termo_de_responsabilidade))){

//echo "<script>

//alert('ATENÃ‡ÃƒO!!!... VOCÃŠ DEVE ASSINAR DIGITALMENTE O TERMO DE RESPONSABILIDADE CLICANDO SOBRE O CAMPO  --> Estou ciente e de Acordo!.');
//window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra&valorrenda=$valorrenda';

//</script>";


	}

if(empty($tipo_contrato)){

echo "<script>

alert('ATENÃ‡ÃƒO!!!... VOCÃŠ DEVE SELECIONAR UM TIPO DE CONTRATO!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra&categoria=$categoria&tipovenda=$tipovenda';

</script>";


	}
	
	
if(empty($tipovenda)){

echo "<script>

alert('ATENÃ‡ÃƒO!!!... VOCÃŠ DEVE SELECIONAR UM TIPO DE VENDA!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra&categoria=$categoria&tipovenda=$tipovenda';

</script>";


	}
	
if(empty($categoria)){

echo "<script>

alert('ATENÃ‡ÃƒO!!!... VOCÃŠ DEVE SELECIONAR UMA CATEGORIA!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra&categoria=$categoria&tipovenda=$tipovenda';

</script>";


	}

if(empty($tipo)){

echo "<script>

alert('ATENÃ‡ÃƒO!!!... VOCÃŠ DEVE SELECIONAR UM PERFIL DO CLIENTE!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra&categoria=$categoria&tipovenda=$tipovenda';

</script>";


	}







$sql = "SELECT * FROM clientes where cpf = '$cpf'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_cli = $linha[0];
$nome_cli = $linha[1];
	$nomesocial = $linha[140];
$orientacaosexual = $linha[2];
$estadocivil_cli = $linha[3];
//$cpf_cli = $linha[4];
$rg_cli = $linha[5];
$orgao_cli = $linha[6];
$emissao_cli = $linha[7];

$dia_niver = $linha[138];
$mes_niver = $linha[88];
$ano_niver = $linha[139];

$pai_cli = $linha[9];
$mae_cli = $linha[10];
$endereco_cli = $linha[11];
$numero_cli = $linha[12];
$bairro_cli = $linha[13];
$complemento_cli = $linha[14];
$cidade_cli = $linha[15];
$estado_cli = $linha[16];
$cep_cli = $linha[17];
$telefone_cli = $linha[18];
$celular_cli = $linha[19];
$email_cli = $linha[20];
$operador_cli = $linha[21];
$cel_operador_cli = $linha[22];
$email_operador_cli = $linha[23];
$estabelecimento_cli = $linha[24];
$cidade_estabelecimento_cli = $linha[25];
$tel_estabelecimento_cli = $linha[26];
$email_estabelecimento_cli = $linha[27];
$obs_cli = $linha[28];
$datacadastro_cli = $linha[29];
$horacadastro_cli = $linha[30];
$dataalteracao_cli = $linha[31];
$horaalteracao_cli = $linha[32];
$operador_alterou_cli = $linha[33];
$cel_operador_alterou_cli = $linha[34];
$email_operador_alterou_cli = $linha[35];
$estabelecimento_alterou_cli = $linha[36];
$cidade_estabelecimento_alterou_cli = $linha[37];
$tel_estabelecimento_alterou_cli = $linha[38];
$email_estabelecimento_alterou_cli = $linha[39];
$banco = $linha[41];
$agencia = $linha[42];
$conta = $linha[43];
$num_beneficio = $linha[44];
$num_beneficio2 = $linha[73];
$num_beneficio3 = $linha[74];
$num_beneficio4 = $linha[75];

$pagto_beneficio = $linha[116];


$resposta = $linha[119];
$secretaria = $linha[124];
$categoria = $linha[134];


$valorrenda = $linha[136];


}
?>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$cpf_op = $linha[4];
$celular = $linha[19];
$email = $linha[20];
$estabelecimento = $linha[44];
$cidade_estabelecimento = $linha[45];
$tel_estabelecimento = $linha[46];
$email_estabelecimento = $linha[47];

}
?>
  
  <?
//---------------------VALIDACAO DOS CAMPOS--------------------------------------------------


if((empty($valorrenda)) or (empty($telefone_cli)) or (empty($celular_cli)) or (empty($cpf))){ ?>
  
  <script>

alert("ATENÃ‡ÃƒO!!!...\n                  <? echo "$nome_op"; ?> \n\nVALOR DA RENDA DO CLIENTE NAO INFORMADO!. ATUALIZE O CADASTRO DO CLIENTE PRIMEIRO!. \n\n CPF* --->> <? echo "$cpf"; ?> \n Valor Renda* --->> <? echo "$valorrenda"; ?> \n Telefone* --->> <? echo "$telefone_cli"; ?>\n Celular* --->> <? echo "$celular_cli"; ?>");

window.location = "../clientes/editar_cliente.php?nome=<? echo "$nome_cli"; ?>&cpf=<? echo "$cpf"; ?>&telefone=<? echo "$telefone_cli"; ?>&celular=<? echo "$celular_cli"; ?>&num_beneficio=<? echo "$num_beneficio"; ?>&secretaria=<? echo "$secretaria"; ?>&categoria=<? echo "$categoria"; ?>&rg=<? echo "$rg_cli"; ?>&mae=<? echo "$mae_cli"; ?>&valorrenda=<? echo "$valorrenda"; ?>";

</script>
  
  <?

}

//-------------------FIM DA VALIDACAO DOS CAMPOS--------------------------------
?>
  
  
  <? 

$sql = "SELECT * FROM termo_de_responsabilidade limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$termo = $linha[1];

}


 ?>
</p>

<form action="grava_proposta.php" method="post" enctype="multipart/form-data" name="form1">
  
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"><strong><font color="#0000FF" size="4">FORMUL&Aacute;RIO DE PROPOSTA </font></strong><strong><font color="#0000FF"><? echo $tipovenda; ?></font></strong><strong><font color="#0000FF">
        <input name="tipovenda" type="hidden" id="tipovenda" value="<? echo $tipovenda; ?>">
      </font></strong></div></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Perfil do cliente</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo da proposta </strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tabela</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Data da Proposta </strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $tipo; ?>
            <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $tipo_proposta; ?>
            <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_proposta; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $tabela; ?>
            <input name="tabela" type="hidden" id="tabela" value="<? echo $tabela; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo date('d-m-Y'); ?></font></strong>
        <input name="dataproposta" type="hidden" id="dataproposta3" value="<? echo date('d-m-Y'); ?>">
        <input name="data_proposta" type="hidden" id="dataproposta4" value="<? echo $date; ?>">
        <input name="horaproposta" type="hidden" id="horaproposta3" value="<? echo $hora_atual; ?>">
        <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">
        <input name="dia" type="hidden" id="dataproposta" value="<? echo date('d'); ?>">
        <input name="mes" type="hidden" id="dataproposta2" value="<? echo date('m'); ?>">
        <input name="ano" type="hidden" id="ano" value="<? echo date('Y'); ?>">
        <strong><font color="#0000FF"></font></strong></td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas1.png"><strong>Operador</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Agencia</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Status</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo de Contrato</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $nome_op; ?>
            <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_op; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?>
            <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo Aguardando_AtivaÃ§Ã£o; ?>
            <input name="status" type="hidden" id="status4" value="<? echo "AGUARDANDO ATIVACAO"; ?>">
            <input name="status_pagto_cliente" type="hidden" id="status_pagto_cliente" value="<?  echo "Aguardando_Pagto"; ?>">
            <input name="status_fisico" type="hidden" id="status_fisico" value="<? echo "PENDENTE DE ENVIO"; ?>">
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $tipo_contrato; ?>
            <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo $tipo_contrato; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Cliente</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Nome Social</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>RG/&Oacute;rg&atilde;o</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Emiss&atilde;o</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="nome" type="hidden" id="nome" value="<? echo $nome_cli; ?>">
      <strong><font color="#0000FF"><? echo $nome_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $nomesocial; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="rg" type="hidden" id="rg" value="<? echo $rg_cli; ?>">
        <strong><font color="#0000FF"><? echo $rg_cli; ?>
        </font>/
        <input name="orgao" type="hidden" id="orgao" value="<? echo $orgao_cli; ?>">
      <strong><? echo $orgao_cli; ?></strong></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="emissao" type="hidden" id="emissao" value="<? echo $emissao_cli; ?>">
        <strong><font color="#0000FF"><? echo $emissao_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Secretaria</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Categoria</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>CPF</strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="secretaria" type="hidden" id="secretaria" value="<? echo $secretaria; ?>">
        <strong><font color="#0000FF"><? echo $secretaria; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="categoria" type="hidden" id="categoria" value="<? echo $categoria; ?>">
        <strong><font color="#0000FF"><? echo $categoria; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <strong><font color="#0000FF"><? echo $cpf; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Orienta&ccedil;&atilde;o Sexual</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Data Nasc</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Pai</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>M&atilde;e</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="orientacaosexual" type="hidden" id="orientacaosexual" value="<? echo $orientacaosexual; ?>">
        <strong><font color="#0000FF"><? echo $orientacaosexual; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="dia_niver" type="hidden" id="dia_niver" value="<? echo $dia_niver; ?>">
        <input name="mes_niver" type="hidden" id="mes_niver" value="<? echo $mes_niver; ?>">
        <input name="ano_niver" type="hidden" id="ano_niver" value="<? echo $ano_niver; ?>">
      <strong><font color="#0000FF"><? echo "$dia_niver/$mes_niver/$ano_niver"; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="pai" type="hidden" id="pai2" value="<? echo $pai_cli; ?>">
        <strong><font color="#0000FF"><? echo $pai_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="mae" type="hidden" id="mae" value="<? echo $mae_cli; ?>">
        <strong><font color="#0000FF"><? echo $mae_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Estado Civil</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Como Conheceu a Empresa</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Valor Renda</strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="estadocivil" type="hidden" id="estadocivil" value="<? echo $estadocivil_cli; ?>">
        <strong><font color="#0000FF"><? echo $estadocivil_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="resposta" type="hidden" id="resposta" value="<? echo $resposta; ?>">
        <strong><font color="#0000FF"><? echo $resposta; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="valorrenda" type="text" id="valorrenda" value="<? echo $valorrenda; ?>">
        <strong><font color="#0000FF"><? echo $valorrenda; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>N&ordm; Benef&iacute;cio 1</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>N&ordm; Benef&iacute;cio2</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>N&ordm; Benef&iacute;cio 3 </strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>N&ordm; Benef&iacute;cio 4 </strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
        <strong><font color="#0000FF"><? echo $num_beneficio; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="num_beneficio2" type="hidden" id="num_beneficio22" value="<? echo $num_beneficio2; ?>">
        <strong><font color="#0000FF"><? echo $num_beneficio2; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="num_beneficio3" type="hidden" id="num_beneficio32" value="<? echo $num_beneficio3; ?>">
        <strong><font color="#0000FF"><? echo $num_beneficio3; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="num_beneficio4" type="hidden" id="num_beneficio42" value="<? echo $num_beneficio4; ?>">
        <strong><font color="#0000FF"><? echo $num_beneficio4; ?></font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Endere&ccedil;o</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>N&uacute;mero</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Complemento</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Bairro</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="endereco" type="hidden" id="endereco2" value="<? echo $endereco_cli; ?>">
        <strong><font color="#0000FF"><? echo $endereco_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="numero" type="hidden" id="numero" value="<? echo $numero_cli; ?>">
        <strong><font color="#0000FF"><? echo $numero_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="complemento" type="hidden" id="complemento" value="<? echo $complemento_cli; ?>">
        <strong><font color="#0000FF"><? echo $complemento_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="bairro" type="hidden" id="bairro2" value="<? echo $bairro_cli; ?>">
        <strong><font color="#0000FF"><? echo $bairro_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Cep</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Cidade</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Estado</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo de pagto do Benef&iacute;cio</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input name="cep" type="hidden" id="cep2" value="<? echo $cep_cli; ?>">
        <strong><font color="#0000FF"><? echo $cep_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="cidade" type="hidden" id="cidade2" value="<? echo $cidade_cli; ?>">
        <strong><font color="#0000FF"><? echo $cidade_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF">
        <input name="estado" type="hidden" id="estado" value="<? echo $estado_cli; ?>">
        <? echo $estado_cli; ?></font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><input name="pagto_beneficio" type="hidden" id="email" value="<? echo $pagto_beneficio; ?>">
        <strong><font color="#0000FF"><? echo $pagto_beneficio; ?></font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><strong>Telefone</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Celular</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Valor bruto de opera&ccedil;&atilde;o R$</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Valor liq cliente R$ </strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="telefone" type="text" id="telefone3" value="<? echo $telefone_cli; ?>" size="15" maxlength="14"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="celular" type="text" id="celular" value="<? echo $celular_cli; ?>" size="15" maxlength="14"></td>
      <td background="../../imagens/fundocelulas2.png"><font color="#0000FF">
        <input class='class02' name="valor_total" type="text" id="valor_total" size="15">
      </font></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="valor_liquido_cliente" type="text" id="valor_liquido_cliente" size="15">
        <font color="#0000FF">
        <input name="valor_credito" type="hidden" id="valor_credito" value="">
        <? //echo $valor_liberado; ?>
        <input name="valor_liberado" type="hidden" id="valor_liberado2" value="<? echo $valor_liberado; ?>">
        </font></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><strong>Quant de parcelas </strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Valor parcela</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Banco de Opera&ccedil;&atilde;o </strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Banco do cliente</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><font color="#0000FF">
        <input class='class02' name="quant_parc" type="text" id="quant_parc" size="15">
      </font></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="parcela" type="text" id="parcela2" size="15"></td>
      <td background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <select class='class02' name="bco_operacao" id="bco_operacao">
          <option selected>Selecione o banco</option>
          <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <select class='class02' name="banco_pagto" id="banco_pagto">
          <option selected><? echo $banco_pagto; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><strong>Ag&ecirc;ncia</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>N&ordm; Conta</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Tipo Conta</strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong>Banco a ser Portado</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <input class='class02' name="agencia" type="text" id="agencia" value="<? echo $agencia; ?>" size="15">
      </font></strong></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="conta" type="text" id="conta2" value="<? echo $conta; ?>" size="15"></td>
      <td background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <select class='class02' name="tipo_conta" id="bco_operacao">
          <?


    $sql = "select * from tipos_contas order by tipo_conta asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_conta']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <select class='class02' name="bco_quitacao" id="banco_pagto">
          <option selected><? echo $banco_pagto; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
    </tr>
	  <?
	  if($referencias=="sim"){
	  ?>
    <tr> 
      <td colspan="4" background="../../imagens/fundocelulas1.png"><div align="center"><strong>Refer&ecirc;ncias</strong></div></td>
    </tr>
    <tr> 
      <td width="17%" background="../../imagens/fundocelulas1.png"><strong>Nome</strong></td>
      <td width="34%" background="../../imagens/fundocelulas1.png"><strong>Telefone</strong></td>
      <td width="15%" background="../../imagens/fundocelulas1.png"><strong>Grau de relacionamento</strong></td>
      <td width="34%" background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="nome_ref1" type="text" id="nome_ref1" size="50">
      </td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' type="text" name="fone_ref1" id="fone_ref1"></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF">
        <select class='class02' name="grau_relacionamento1" id="grau_relacionamento1">
          <option selected>Selecione o relacionamento</option>
          <?


    $sql = "select * from grau_relacionamento order by relacionamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['relacionamento']."</option>";
    }
	
?>
        </select>
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas1.png"><strong>Nome</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Telefone</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Grau de relacionamento</strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="nome_ref2" type="text" id="nome_ref2" size="50"></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' type="text" name="fone_ref2" id="fone_ref2"></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF">
        <select class='class02' name="grau_relacionamento2" id="grau_relacionamento2">
          <option selected>Selecione o relacionamento</option>
          <?


    $sql = "select * from grau_relacionamento order by relacionamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['relacionamento']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
	  <? 
	  }
	  else{
		
		echo "<input class='class02' name='nome_ref' type='hidden' id='nome_ref' size='50'>
      <input class='class02' type='hidden' name='fone_ref' id='fone_ref'>
      <input class='class02' type='hidden' name='grau_relacionamento1' id='grau_relacionamento1'>
      <input class='class02' name='nome_ref2' type='hidden' id='nome_ref2' size='50'>
      <input class='class02' type='hidden' name='fone_ref2' id='fone_ref2'>
      <input class='class02' type='hidden' name='grau_relacionamento2' id='grau_relacionamento2'>";
	}
	  ?>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"></div></td>
    </tr>
    
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas1.png"><table width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="8" align="center" background="../../imagens/fundocelulas1.png"><strong>ANALISE DE PORTABILIDADE</strong></td>
            </tr>
          <tr>
            <td width="6%"><strong>Parcela</strong></td>
            <td width="6%"><strong>Banco</strong></td>
            <td width="10%"><strong>Prazo contrato</strong></td>
            <td width="14%"><strong>Parcelas pagas</strong></td>
            <td width="13%"><strong>Taxa de Juros</strong></td>
            <td width="14%"><strong>Num Contrato</strong></td>
            <td width="19%"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td width="18%"><strong>Tipo Opera&ccedil;&atilde;o</strong></td>
            </tr>
          <tr>
            <td><input name="parc1" type="text" class='class02' id="parc1" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco1" id="banco1">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto1" type="text" class='class02' id="vencto1" size="5"></td>
            <td><input name="parcelaspagas1" type="text" class='class02' id="parcelaspagas1" size="5"></td>
            <td><input name="taxajuros1" type="text" class='class02' id="taxajuros1" size="5"></td>
            <td><input name="numcontrato1" type="text" class='class02' id="numcontrato1" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao1" type="hidden" class='class02' id="bancodigitacao1" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao1" type="hidden" class='class02' id="tipooperacao1" size="5" readonly="readonly">
              </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc2" type="text" class='class02' id="parc2" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco2" id="banco2">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto2" type="text" class='class02' id="vencto2" size="5"></td>
            <td><input name="parcelaspagas2" type="text" class='class02' id="parcelaspagas2" size="5"></td>
            <td><input name="taxajuros2" type="text" class='class02' id="taxajuros2" size="5"></td>
            <td><input name="numcontrato2" type="text" class='class02' id="numcontrato2" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao2" type="hidden" class='class02' id="bancodigitacao2" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao2" type="hidden" class='class02' id="tipooperacao2" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc3" type="text" class='class02' id="parc3" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco3" id="banco3">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto3" type="text" class='class02' id="vencto3" size="5"></td>
            <td><input name="parcelaspagas3" type="text" class='class02' id="parcelaspagas3" size="5"></td>
            <td><input name="taxajuros3" type="text" class='class02' id="taxajuros3" size="5"></td>
            <td><input name="numcontrato3" type="text" class='class02' id="numcontrato3" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao3" type="hidden" class='class02' id="bancodigitacao3" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao3" type="hidden" class='class02' id="tipooperacao3" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc4" type="text" class='class02' id="parc4" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco4" id="banco4">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto4" type="text" class='class02' id="vencto4" size="5"></td>
            <td><input name="parcelaspagas4" type="text" class='class02' id="parcelaspagas4" size="5"></td>
            <td><input name="taxajuros4" type="text" class='class02' id="taxajuros4" size="5"></td>
            <td><input name="numcontrato4" type="text" class='class02' id="numcontrato4" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao4" type="hidden" class='class02' id="bancodigitacao4" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao4" type="hidden" class='class02' id="tipooperacao4" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc5" type="text" class='class02' id="parc5" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco5" id="banco5">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto5" type="text" class='class02' id="vencto5" size="5"></td>
            <td><input name="parcelaspagas5" type="text" class='class02' id="parcelaspagas5" size="5"></td>
            <td><input name="taxajuros5" type="text" class='class02' id="taxajuros5" size="5"></td>
            <td><input name="numcontrato5" type="text" class='class02' id="numcontrato5" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao5" type="hidden" class='class02' id="bancodigitacao5" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao5" type="hidden" class='class02' id="tipooperacao5" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc6" type="text" class='class02' id="parc6" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco6" id="banco6">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto6" type="text" class='class02' id="vencto6" size="5"></td>
            <td><input name="parcelaspagas6" type="text" class='class02' id="parcelaspagas6" size="5"></td>
            <td><input name="taxajuros6" type="text" class='class02' id="taxajuros6" size="5"></td>
            <td><input name="numcontrato6" type="text" class='class02' id="numcontrato6" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao6" type="hidden" class='class02' id="bancodigitacao6" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao6" type="hidden" class='class02' id="tipooperacao6" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc7" type="text" class='class02' id="parc7" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco7" id="banco7">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto7" type="text" class='class02' id="vencto7" size="5"></td>
            <td><input name="parcelaspagas7" type="text" class='class02' id="parcelaspagas7" size="5"></td>
            <td><input name="taxajuros7" type="text" class='class02' id="taxajuros7" size="5"></td>
            <td><input name="numcontrato7" type="text" class='class02' id="numcontrato7" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao7" type="hidden" class='class02' id="bancodigitacao7" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao7" type="hidden" class='class02' id="tipooperacao7" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc8" type="text" class='class02' id="parc8" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco8" id="banco8">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto8" type="text" class='class02' id="vencto8" size="5"></td>
            <td><input name="parcelaspagas8" type="text" class='class02' id="parcelaspagas8" size="5"></td>
            <td><input name="taxajuros8" type="text" class='class02' id="taxajuros8" size="5"></td>
            <td><input name="numcontrato8" type="text" class='class02' id="numcontrato8" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao8" type="hidden" class='class02' id="bancodigitacao8" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao8" type="hidden" class='class02' id="tipooperacao8" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc9" type="text" class='class02' id="parc9" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco9" id="banco9">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto9" type="text" class='class02' id="vencto9" size="5"></td>
            <td><input name="parcelaspagas9" type="text" class='class02' id="parcelaspagas9" size="5"></td>
            <td><input name="taxajuros9" type="text" class='class02' id="taxajuros9" size="5"></td>
            <td><input name="numcontrato9" type="text" class='class02' id="numcontrato9" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao9" type="hidden" class='class02' id="bancodigitacao9" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao9" type="hidden" class='class02' id="tipooperacao9" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td><input name="parc10" type="text" class='class02' id="parc10" size="5"></td>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco10" id="banco10">
                <option selected><? echo $banco_pagto; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><input name="vencto10" type="text" class='class02' id="vencto10" size="5"></td>
            <td><input name="parcelaspagas10" type="text" class='class02' id="parcelaspagas10" size="5"></td>
            <td><input name="taxajuros10" type="text" class='class02' id="taxajuros10" size="5"></td>
            <td><input name="numcontrato10" type="text" class='class02' id="numcontrato10" size="10"></td>
            <td><strong><font color="#0000FF">
              <input name="bancodigitacao10" type="hidden" class='class02' id="bancodigitacao10" size="5" readonly="readonly">
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input name="tipooperacao10" type="hidden" class='class02' id="tipooperacao10" size="5" readonly="readonly">
            </font></strong></td>
            </tr>
          <tr>
            <td colspan="8" align="center" background="../../imagens/fundocelulas2.png"><table width="100%">
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
            <td align="center"><strong>
              <input name="senha_servidor" type="text" class='class02' id="senha_servidor" size="5">
            </strong></td>
            <td align="center">&nbsp;</td>
            <td colspan="2" align="center"><input name="email" type="text" class='class02' id="email" value="<? echo $email_cli; ?>" size="50"></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td width="22%" align="center">&nbsp;</td>
            <td width="31%" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>Margem Empr&eacute;stimo</strong></td>
            <td align="center"><strong>Parcela</strong></td>
            <td align="center"><strong>Valor Liberado</strong></td>
            <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>
              <input name="margememprestimo" type="text" class='class02' id="margememprestimo" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="margememprestimo_parcela" type="hidden" class='class02' id="margememprestimo_parcela" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="margememprestimo_valorliberado" type="hidden" class='class02' id="margememprestimo_valorliberado" size="5">
            </strong></td>
            <td align="center"><strong><font color="#0000FF">
              </font>
                <input name="margememprestimo_bancodigitacao" type="hidden" class='class02' id="margememprestimo_bancodigitacao" size="5">
            </strong></td>
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
            <td align="center"><strong>Margem Cart&atilde;o</strong></td>
            <td align="center"><strong>Parcela</strong></td>
            <td align="center"><strong>Valor Liberado</strong></td>
            <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>
              <input name="margemcartao" type="text" class='class02' id="margemcartao" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="margemcartao_parcela" type="hidden" class='class02' id="margemcartao_parcela" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="margemcartao_valorliberado" type="hidden" class='class02' id="margemcartao_valorliberado" size="5">
            </strong></td>
            <td align="center"><strong><font color="#0000FF">
              </font>
                <input name="margemcartao_bancodigitacao" type="hidden" class='class02' id="margemcartao_bancodigitacao" size="5">
            </strong></td>
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
            <td align="center"><strong>D&eacute;bito em Conta</strong></td>
            <td align="center"><strong>Parcela</strong></td>
            <td align="center"><strong>Valor Liberado</strong></td>
            <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>
              <input name="debitoemconta" type="hidden" class='class02' id="debitoemconta" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="debitoemconta_parcela" type="hidden" class='class02' id="debitoemconta_parcela" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="debitoemconta_valorliberado" type="hidden" class='class02' id="debitoemconta_valorliberado" size="5">
            </strong></td>
            <td align="center"><strong><font color="#0000FF">
              </font>
                <input name="debitoemconta_bancodigitacao" type="hidden" class='class02' id="debitoemconta_bancodigitacao" size="5">
            </strong></td>
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
            <td align="center"><strong>Cr&eacute;dito Carn&ecirc;</strong></td>
            <td align="center"><strong>Parcela</strong></td>
            <td align="center"><strong>Valor Liberado</strong></td>
            <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>
              <input name="creditocarne" type="hidden" class='class02' id="creditocarne" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="creditocarne_parcela" type="hidden" class='class02' id="creditocarne_parcela" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="creditocarne_valorliberado" type="hidden" class='class02' id="creditocarne_valorliberado" size="5">
            </strong></td>
            <td align="center"><strong><font color="#0000FF">
              </font>
                <input name="creditocarne_bancodigitacao" type="hidden" class='class02' id="creditocarne_bancodigitacao" size="5">
            </strong></td>
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
            <td align="center"><strong>Cr&eacute;dito Conta Energia</strong></td>
            <td align="center"><strong>Parcela</strong></td>
            <td align="center"><strong>Valor Liberado</strong></td>
            <td align="center"><strong>Banco Digita&ccedil;&atilde;o</strong></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>
              <input name="creditocontaenergia" type="hidden" class='class02' id="creditocontaenergia" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="creditocontaenergia_parcela" type="hidden" class='class02' id="creditocontaenergia_parcela" size="5">
            </strong></td>
            <td align="center"><strong>
              <input name="creditocontaenergia_valorliberado" type="hidden" class='class02' id="creditocontaenergia_valorliberado" size="5">
            </strong></td>
            <td align="center"><strong><font color="#0000FF">
              </font>
                <input name="creditocontaenergia_bancodigitacao" type="hidden" class='class02' id="creditocontaenergia_bancodigitacao" size="5">
            </strong></td>
            <td align="center">&nbsp;</td>
				  </tr>
          <tr>
            <td colspan="6" align="center">&nbsp;</td>
            </tr>
				
				</table>
			  
			  
			  </td>
            </tr>
			
          <tr>
            
          </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center" background="../../imagens/fundocelulas1.png">&nbsp;</td>
      <td colspan="2" background="../../imagens/fundocelulas1.png"><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" background="../../imagens/fundocelulas1.png">&nbsp;</td>
      <td colspan="2" background="../../imagens/fundocelulas1.png"><div align="center">
        <textarea class='class02' name="obs" cols="50" rows="7" id="obs"><? echo $obs_cli; ?></textarea>
      </div></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><DIV>
        <div align="center"></div>
      </DIV></td>
    </tr>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"><strong><font color="#0000FF">
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
        <input name="recebido" type="hidden" id="recebido" value="<? echo NÃ£o; ?>">
        <input name="resposta1" type="hidden" id="resposta1" value="<? echo NÃ£o; ?>">
		  <input name="resposta2" type="hidden" id="resposta2" value="<? echo NÃ£o; ?>">
		  <input name="resposta3" type="hidden" id="resposta3" value="<? echo NÃ£o; ?>">
		  <input name="termo" type="hidden" id="termo" value="<? echo $termo;  ?>">
      </font></strong>
          <strong>
          <input name="termo_de_responsabilidade" type="hidden" id="termo_de_responsabilidade" value="<? echo $termo_de_responsabilidade;  ?>">
          </strong>
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input class='class01' type="submit" name="Submit" value="Salvar">
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
