<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


require '../conect/conect.php';


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
?>

<html>

<head>

<title>Relat&oacute;rio de Produ&ccedil;&atilde;o</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../background/preview.jpg);
	background-repeat: no-repeat;
}

-->

</style></head>



<body>

<p>&nbsp;</p>

<form action="principal.php" method="post" name="form1" target="_top">
  <input class='class01' type="submit" name="Submit" value="Voltar ao menu principal">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_alterou = $linha[1];
	$operador_alterou_em_massa = $linha[1];
	
}
?>
</form>
	
<?
	
	$solicitacao = $_POST['solicitacao'];
	$alteracao_em_massa = $_POST['alteracao_em_massa'];
	$retirar_proposta_da_listagem_em_massa = $_POST['retirar_proposta_da_listagem_em_massa'];
	$abrir_status_em_massa = $_POST['abrir_status_em_massa'];
	$confirma_alteracao_em_massa = $_POST['confirma_alteracao_em_massa'];
	$status = $_POST['status'];
	$obs2 = $_POST['obs2'];
	
	$num_proposta1 = $_POST['num_proposta1'];
	$num_proposta2 = $_POST['num_proposta2'];
	$num_proposta3 = $_POST['num_proposta3'];
	$num_proposta4 = $_POST['num_proposta4'];
	$num_proposta5 = $_POST['num_proposta5'];
	$num_proposta6 = $_POST['num_proposta6'];
	$num_proposta7 = $_POST['num_proposta7'];
	$num_proposta8 = $_POST['num_proposta8'];
	$num_proposta9 = $_POST['num_proposta9'];
	$num_proposta10 = $_POST['num_proposta10'];
	$num_proposta_excluir_da_massa = $_POST['num_proposta_excluir_da_massa'];
	
	
	if($retirar_proposta_da_listagem_em_massa=="sim"){
	$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '',`operadorstatusemmassa` = '' where `propostas`. `num_proposta` = '$num_proposta_excluir_da_massa' limit 1";
mysql_query($comando,$conexao);
	}
	
	
	if($alteracao_em_massa=="sim"){
		



$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta1' limit 1 ";
mysql_query($comando,$conexao);	
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta2' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta3' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta4' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta5' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta6' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta7' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta8' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta9' limit 1 ";
mysql_query($comando,$conexao);
		
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '$alteracao_em_massa',`operadorstatusemmassa` = '$operador_alterou_em_massa' where `propostas`. `num_proposta` = '$num_proposta10' limit 1 ";
mysql_query($comando,$conexao);
	
	
	}
?>
	
<p>
	
<?
		
if($confirma_alteracao_em_massa=='sim'){
	
$dataalteracao = date('d-m-Y');
$horaalteracao = date('H:i:s');
	
$sql = "SELECT * FROM propostas where alteracao_em_massa = 'sim' and operadorstatusemmassa = '$operador_alterou_em_massa' and status <> 'PAGO AO CLIENTE'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_proposta = $linha[0];
$cpf = $linha[7];
	
	
	
$comando = "insert into observacoes_parecer_credito(num_proposta,cpf,data,hora,obs,operador) values('$num_proposta','$cpf','$dataalteracao','$horaalteracao','$obs2','$operador_alterou_em_massa')";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`propostas` set `status` = '$status',`obs2` = '$obs2',`alteracao_em_massa` = '',`operadorstatusemmassa` = '' where `propostas`. `alteracao_em_massa` = 'sim' and `num_proposta` = '$num_proposta'";
mysql_query($comando,$conexao);
	
}
	
	
$sql2 = "SELECT * FROM propostas where alteracao_em_massa = 'sim' and operadorstatusemmassa = '$operador_alterou_em_massa' and status = 'PAGO AO CLIENTE'";
$res2 = mysql_query($sql2);
$propostas_encontradas = mysql_num_rows($res2);
while($linha=mysql_fetch_row($res2)) {

$num_proposta_nao_afetada = $linha[0];
$cpf = $linha[7];
	
	if($propostas_encontradas>=1){
echo "Proposta não afetada devido a seu status PAGO AO CLIENTE!<br>
$num_proposta_nao_afetada <br>";
	}
	
$comando = "update `$db`.`propostas` set `alteracao_em_massa` = '',`operadorstatusemmassa` = '' where `propostas`. `num_proposta` = '$num_proposta_nao_afetada'";
mysql_query($comando,$conexao);
}
	
	
}		
		
		
?>
	
<p>
<?
//if($solicitacao=="buscar proposta"){

//echo "<table width='100%' border='0'>
 // <tr>
 //   <td width='31%'>&nbsp;</td>
  //  <td width='39%'><div align='center'><strong>Altera&ccedil;&atilde;o de status de proposta</strong></div></td>
//    <td width='30%'>&nbsp;</td>
//  </tr>
 // <tr>
 //   <td><div align='center'></div></td>
//    <td><div align='center'>
 //     <form action='operacoes_a_serem_executadas.php' method='post' name='form12' target='navegacao'>";
	  ?>
        <?

//$usuario = $_SESSION['usuario'];

//$senha = $_SESSION['senha'];

?>
<?
//        echo "Proposta
//  <input name='num_proposta' type='text' id='num_proposta' size='11'>
        
//  <input name='solicitacao' type='hidden' id='solicitacao' value='alterar status proposta'>
        
//  <input type='submit' name='Submit15' value='Buscar'>
 //     </form>
 //   </div></td>
 //   <td><div align='center'></div></td>
//  </tr>
//</table>";

//}

?>
<p>
  <?
  

if($solicitacao=="alterar status proposta"){


$num_proposta = $_POST['num_proposta'];

//$sql = "SELECT * FROM propostas where num_proposta = $num_proposta";
//$res = mysql_query($sql);
//while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$quoeficiente_gravado = $linha[90]*100;

$percentual_op_gravado = $linha[100]*100;

$devolucao_ao_cliente_gravado = $linha[175];

//}

if(empty($quoeficiente_gravado)){
$quoeficiente = "";
}
else{
$quoeficiente = $quoeficiente_gravado;
}

if(empty($percentual_op_gravado)){
$percentual_op = "";
}
else{
$percentual_op = $percentual_op_gravado;
}

if(empty($devolucao_ao_cliente_gravado)){
$devolucao_ao_cliente = "0.00";
}
else{
$devolucao_ao_cliente = $devolucao_ao_cliente_gravado;
}


echo "<table width='80%' border='0' align='center'>
  <tr>
    
    <td colspan='3' width='39%'><div align='center'><strong>Altera&ccedil;&atilde;o de status de proposta</strong></div></td>
    
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form action='propostas/status_proposta.php' method='post' name='form12' target='navegacao'>";
	  ?>
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <?
        echo "Proposta
		$num_proposta 
  <input class='class02' name='num_proposta' type='text' id='num_proposta' value='$num_proposta' size='11'>
        comiss&atilde;o
  <input class='class02' name='percentual' type='text' id='percentual' value='$quoeficiente' size='4' maxlength='4'>
        % Comiss&atilde;o op
  <input class='class02'name='percentual_op' type='text' id='percentual_op' value='$percentual_op' size='4' maxlength='4'><br>
  Devolu&ccedil;&atilde;o ao Cliente R$
  <input class='class02' name='devolucao_ao_cliente' type='text' id='devolucao_ao_cliente' value='$devolucao_ao_cliente' size='11'>
  <input class='class01' type='submit' name='Submit15' value='Status'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

?>
<p>
  <?
if($solicitacao=="alterar status proposta..."){


$num_proposta_veiculos = $_POST['num_proposta_veiculos'];

//$sql = "SELECT * FROM propostas_veiculos where num_proposta = $num_proposta_veiculos";
//$res = mysql_query($sql);
//while($linha=mysql_fetch_row($res)) {



$num_proposta_veiculos = $linha[0];

$percentual_gravado_veiculos = $linha[169]*100;

$percentual_op_gravado_veiculos = $linha[170]*100;

$devolucao_ao_cliente_gravado_veiculos = $linha[171];

//}

if(empty($percentual_gravado_veiculos)){
$percentual_veiculos = "";
}
else{
$percentual_veiculos = $percentual_gravado_veiculos;
}

if(empty($percentual_op_gravado_veiculos)){
$percentual_op_veiculos = "";
}
else{
$percentual_op_veiculos = $percentual_op_gravado_veiculos;
}

if(empty($devolucao_ao_cliente_gravado_veiculos)){
$devolucao_ao_cliente_veiculos = "0.00";
}
else{
$devolucao_ao_cliente_veiculos = $devolucao_ao_cliente_gravado_veiculos;
}


echo "<table width='100%' border='0' align='center>
  <tr>
    
    <td colspan='3' width='39%'><div align='center'><strong>Altera&ccedil;&atilde;o de status de proposta Cr&eacute;dito Pessoal / Ve&iacute;culos</strong></div></td>
    
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form action='veiculos/status_proposta.php' method='post' name='form12' target='navegacao'>";
	  ?>
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "Proposta
		$num_proposta_veiculos 
  <input class='class02' name='num_proposta' type='text' id='num_proposta' value='$num_proposta_veiculos' size='11'>
        comiss&atilde;o
  <input class='class02' name='percentual' type='text' id='percentual' value='$percentual_veiculos' size='4' maxlength='4'>
        % Comiss&atilde;o op
  <input class='class02' name='percentual_op' type='text' id='percentual_op' value='$percentual_op_veiculos' size='4' maxlength='4'><br>
  Devolu&ccedil;&atilde;o ao Cliente R$
  <input class='class02' name='devolucao_ao_cliente' type='text' id='devolucao_ao_cliente' value='$devolucao_ao_cliente_veiculos' size='11'>
  <input class='class01' type='submit' name='Submit15' value='Status'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

//FIM DA BUSCA DE PROPOSTAS DE VEICULOS-----------------
?>
<p>
<?
if(($abrir_status_em_massa=="sim") or ($alteracao_em_massa=="sim") or ($confirma_alteracao_em_massa=="sim") or ($retirar_proposta_da_listagem_em_massa=="sim")){
	?>
<form name="form2" method="post" action="operacoes_a_serem_executadas.php">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
		
  <table width="100%" border="0" align="center">
    <tbody>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center"><input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" /></td>
        <td align="center">&nbsp;</td>
        <td align="right"><input class='class01' type="submit" name="submit4" id="submit4" value="X"></td>
      </tr>
    </tbody>
  </table>
</form>
	
<?
}
else{
	
	?>
<form name="form2" method="post" action="operacoes_a_serem_executadas.php">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <table width="80%" border="0" align="center">
    <tbody>
      <tr>
        <td align="center"><input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
          <input name="alteracao_em_massa" type="hidden" id="alteracao_em_massa" value="sim">
        <input name="abrir_status_em_massa" type="hidden" id="abrir_status_em_massa" value="sim">          <input class='class01' type="submit" name="submit3" id="submit3" value="Abrir altera&ccedil;&atilde;o de Status em Massa"></td>
      </tr>
    </tbody>
  </table>
</form>
	<? } ?>
<p>
<?
if(($abrir_status_em_massa=="sim") or ($alteracao_em_massa=="sim") or ($confirma_alteracao_em_massa=="sim") or ($retirar_proposta_da_listagem_em_massa=="sim")){
?>
<form name="form2" method="post" action="operacoes_a_serem_executadas.php">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <th colspan="5" scope="col">Informe as propostas a serem afetadas em massa</th>
      </tr>
      <tr>
        <th scope="col" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta1" type="text" id="num_proposta1""  size="11"></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta2" type="text" id="num_proposta2" size="11"></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta3" type="text" id="num_proposta3" size="11"></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta4" type="text" id="num_proposta4" size="11"></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta5" type="text" id="num_proposta5" size="11"></th>
      </tr>
      <tr>
        <td align="center" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta6" type="text" id="num_proposta6" size="11"></td>
        <td align="center" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta7" type="text" id="num_proposta7" size="11"></td>
        <td align="center" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta8" type="text" id="num_proposta8" size="11"></td>
        <td align="center" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta9" type="text" id="num_proposta9" size="11"></td>
        <td align="center" background="../imagens/fundocelulas2.png"><input class='class02' name="num_proposta10" type="text" id="num_proposta10" size="11"></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center"><input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />          <input name="alteracao_em_massa" type="hidden" id="alteracao_em_massa" value="sim">
        <input class='class01' type="submit" name="submit" id="submit" value="Adicionar"></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
<form name="form2" method="post" action="operacoes_a_serem_executadas.php">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <th colspan="2" background="../imagens/fundocelulas2.png" scope="col">Status</th>
        <th scope="col" background="../imagens/fundocelulas2.png"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="confirma_alteracao_em_massa" type="hidden" id="confirma_alteracao_em_massa" value="sim">
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
        Observa&ccedil;&otilde;es</th>
        <th scope="col" background="../imagens/fundocelulas2.png">#</th>
        <th scope="col" background="../imagens/fundocelulas2.png">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="2" background="../imagens/fundocelulas2.png" scope="col"><strong><font color="#0000FF">
          <select class='class02' name="status" id="select11">
            <option selected><? echo $status; ?></option>
            <?

    $sql = "select * from status group by status order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }

?>
          </select>
        </font></strong></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><textarea class='class02' name="obs2" cols="45" rows="3" id="obs2"></textarea></th>
        <th scope="col" background="../imagens/fundocelulas2.png"><strong><font color="#0000FF">
          <input class='class01' type="submit" name="submit2" id="submit2" value="Confirmar Alteracoes">
        </font></strong></th>
        <th scope="col" background="../imagens/fundocelulas2.png">&nbsp;</th>
      </tr>
      <?
		$sql = "SELECT * FROM propostas where alteracao_em_massa = 'sim' and operadorstatusemmassa = '$operador_alterou'";
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

$margemcartao = $linha[209];
$margememprestimo = $linha[210];

$dia_niver = $linha[211];
$mes_niver = $linha[212];
$ano_niver = $linha[213];

$secretaria = $linha[214];
$categoria = $linha[215];
$proposal_celwhats = $linha[216];
$operadorquedigitou = $linha[217];




		?>
      <? } ?>
    </tbody>
  </table>
</form>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <th scope="col" background="../imagens/fundocelulas2.png">N&deg; Proposta</th>
      <th scope="col" background="../imagens/fundocelulas2.png">CPF</th>
      <th scope="col" background="../imagens/fundocelulas2.png">Cliente</th>
      <th scope="col" background="../imagens/fundocelulas2.png">Tipo Proposta</th>
      <th scope="col" background="../imagens/fundocelulas2.png">&nbsp;</th>
    </tr>
    <?
$sql = "SELECT * FROM propostas where  operadorstatusemmassa = '$operador_alterou_em_massa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$num_proposta_excluir_da_massa = $linha[0];

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

$margemcartao = $linha[209];
$margememprestimo = $linha[210];

$dia_niver = $linha[211];
$mes_niver = $linha[212];
$ano_niver = $linha[213];

$secretaria = $linha[214];
$categoria = $linha[215];
$proposal_celwhats = $linha[216];
$operadorquedigitou = $linha[217];




		?>
    <tr>
      <td align="center"><? echo "$num_proposta_excluir_da_massa"; ?></td>
      <td align="center"><? echo "$cpf"; ?></td>
      <td align="center"><? echo "$nome"; ?></td>
      <td align="center"><? echo "$tipo_proposta"; ?></td>
      <td align="center"><form name="form3" method="post" action="operacoes_a_serem_executadas.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
        <input name="retirar_proposta_da_listagem_em_massa" type="hidden" id="retirar_proposta_da_listagem_em_massa" value="sim">
        <input name="num_proposta_excluir_da_massa" type="hidden" id="num_proposta_excluir_da_massa" value="<? echo "$num_proposta_excluir_da_massa"; ?>" />
        <strong><font color="#0000FF">
        <input class='class01' type="submit" name="submit5" id="submit5" value="x">
        </font></strong>
      </form></td>
    </tr>
    <? } ?>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p></p>
	<? } ?>
    
  <?
  //---------------BUSCA PROPOSTAS DE VEICULOS--------------------
//if($solicitacao=="buscar proposta"){

//echo "<table width='100%' border='0'>
 // <tr>
//    <td width='31%'>&nbsp;</td>
//    <td width='39%'><div align='center'><strong>Altera&ccedil;&atilde;o de status de proposta Crédito Pessoal / Veículos</strong></div></td>
//    <td width='30%'>&nbsp;</td>
//  </tr>
//  <tr>
//    <td><div align='center'></div></td>
 //   <td><div align='center'>
 //     <form action='operacoes_a_serem_executadas.php' method='post' name='form12' target='navegacao'>";
	  ?>
  <?

//$usuario = $_SESSION['usuario'];

//$senha = $_SESSION['senha'];

?>
  <?
 //       echo "Proposta
//  <input name='num_proposta_veiculos' type='text' id='num_proposta_veiculos' size='11'>
        
//  <input name='solicitacao' type='hidden' id='solicitacao' value='alterar status proposta veiculos'>
        
//  <input type='submit' name='Submit15' value='Buscar'>
//      </form>
  //  </div></td>
//    <td><div align='center'></div></td>
//  </tr>
//</table>";

//}

?>

<p>
<p>


<?

if($solicitacao=="buscar bordero"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='23%'><div align='center'></div></td>
    <td width='43%'><div align='center'><strong>Busca de border&ocirc;</strong></div></td>
    <td width='34%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form2' method='post' action='borderos/borderos.php' target='navegacao'>
        N&ordm; do Border&ocirc;
  <input name='num_bordero_receber' type='text' id='num_bordero_receber' size='10'>
  <input type='submit' name='Submit25' value='Buscar Border&ocirc;'>";
  ?>
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?
      echo "</form>
    </div></td>
    <td><div align='center'>
	</div></td>
  </tr>
</table>";


echo "<table width='100%' border='0'>
  <tr>
    <td width='23%'><div align='center'></div></td>
    <td width='34%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form2' method='post' action='borderos/borderos.php' target='navegacao'>
        Nº Proposta
  <input name='num_proposta' type='text' id='num_proposta' size='10'>
  <input type='submit' name='Submit25' value='Buscar Borderô'>";
  ?>
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?
      echo "</form>
    </div></td>
    <td><div align='center'>
	</div></td>
  </tr>
</table>";


}

?>
<p>
<?
if($solicitacao=="verificar propostas"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='23%'><div align='center'></div></td>
    <td width='34%'><div align='center'><strong>Verificando propostas por CPF</strong></div></td>
    <td width='43%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form action='lista_de_propostas_para_alterar_status.php' method='post' enctype='multipart/form-data' name='form1' target='navegacao'>
        
          <div align='center'>
            <input name='cpf' type='text' id='cpf'>";
			?>
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
            echo "<input type='submit' name='Submit17' value='Verificar'>
            </div>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

?>
<p>
</body>

</html>

