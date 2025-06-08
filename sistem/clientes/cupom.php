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
<script language="Javascript">
function right(e) {
if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)){
alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");
return false;
}
else if (navigator.appName == 'Microsoft Internet Explorer' &&
(event.button == 2 || event.button == 3)) {
alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");
return false;
}
return true;
}
document.onmousedown=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
window.onmousedown=right;
</script>
<head>
<title>CUPOM - ALLCRED FINANCEIRA</title>
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

require '../../conect/conect.php';

			
?>
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


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">
<form name="form2" method="post" action="">
</form>
<form name="form1" method="post" action="../index.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class='class01' type="submit" name="Submit3" value="Voltar ao menu principal">
</form>
<?
$cpf = $_POST['cpf'];

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
$sexo = $linha[2];
$estadocivil = $linha[3];
$cpf = $linha[4];
$rg = $linha[5];
$orgao = $linha[6];
$emissao = $linha[7];
$data_nasc = $linha[8];
$pai = $linha[9];
$mae = $linha[10];
$endereco = $linha[11];
$numero = $linha[12];
$bairro = $linha[13];
$complemento = $linha[14];
$cidade = $linha[15];
$estado = $linha[16];
$cep = $linha[17];
$telefone = $linha[18];
$celular = $linha[19];
$email = $linha[20];
$operador = $linha[21];
$cel_operador = $linha[22];
$email_operador = $linha[23];
$estabelecimento = $linha[24];
$cidade_estabelecimento = $linha[25];
$tel_estabelecimento = $linha[26];
$email_estabelecimento = $linha[27];
$obs = $linha[28];
$datacadastro = $linha[29];
$horacadastro = $linha[30];
$dataalteracao = $linha[31];
$horaalteracao = $linha[32];
$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$tipo = $linha[40];
$banco = $linha[41];
$agencia = $linha[42];
$conta = $linha[43];
$num_beneficio = $linha[44];

$parc1 = $linha[45];
$banco1 = $linha[46];
$vencto1 = $linha[47];
$compra1 = $linha[48];

$parc2 = $linha[49];
$banco2 = $linha[50];
$vencto2 = $linha[51];
$compra2 = $linha[52];

$parc3 = $linha[53];
$banco3 = $linha[54];
$vencto3 = $linha[55];
$compra3 = $linha[56];

$parc4 = $linha[57];
$banco4 = $linha[58];
$vencto4 = $linha[59];
$compra4 = $linha[60];

$parc5 = $linha[61];
$banco5 = $linha[62];
$vencto5 = $linha[63];
$compra5 = $linha[64];

$parc6 = $linha[65];
$banco6 = $linha[66];
$vencto6 = $linha[67];
$compra6 = $linha[68];

$parc7 = $linha[69];
$banco7 = $linha[70];
$vencto7 = $linha[71];
$compra7 = $linha[72];

$num_beneficio2 = $linha[73];
$num_beneficio3 = $linha[74];
$num_beneficio4 = $linha[75];

$dataprev2 = $linha[76];
$obs2 = $linha[77];


$dataprev = $linha[76];
$cpf_rg = $linha[78];
$comp_end = $linha[79];
$comp_quit1 = $linha[80];
$comp_quit2 = $linha[81];
$comp_quit3 = $linha[82];
$comp_quit4 = $linha[83];
$comp_quit5 = $linha[84];
$comp_quit6 = $linha[85];
$comp_renda = $linha[86];
$cpf_rg_testemunha = $linha[87];
$mes_niver = $linha[88];
$status_cliente = $linha[89];

?>
<? } ?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];


?>
<? } ?>
<div align="center">
  <strong><font color="#0000FF" size="4">CUPOM - ALLCRED FINANCEIRA</font></strong></div>
<form action="grava_cupom.php" method="post" name="form1" target="_blank">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td background="../../imagens/fundocelulas1.png">Nome</td>
      <td background="../../imagens/fundocelulas1.png">Tipo</td>
      <td background="../../imagens/fundocelulas1.png">Data Nasc </td>
      <td background="../../imagens/fundocelulas1.png">m&ecirc;s do anivers&aacute;rio</td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="nome" type="text" id="nome2" value="<? echo $nome; ?>"></td>
      <td background="../../imagens/fundocelulas1.png"><strong>
        <select class='class02' name="tipo" id="tipo">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
      </strong></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" size="15" maxlength="10"></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="mes_niver" type="text" id="mes_niver" value="<? echo $mes_niver; ?>" size="4" maxlength="2"></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png">Estado Civil </td>
      <td background="../../imagens/fundocelulas1.png">Sexo</td>
      <td background="../../imagens/fundocelulas1.png">CPF</td>
      <td background="../../imagens/fundocelulas1.png">RG</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="estadocivil" id="select3">
        <option selected><? echo $estadocivil; ?></option>
        <?


    $sql = "select * from estado_civil order by estadocivil asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";
    }
?>
      </select></td>
      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="sexo" id="sexo">
        <option selected><? echo $sexo; ?></option>
        <option>Masculino</option>
        <option>Feminino</option>
      </select></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="18" maxlength="14"></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="rg" type="text" id="rg" value="<? echo $rg; ?>" size="25" maxlength="25"></td>
    </tr>
    <tr> 
      <td width="15%" background="../../imagens/fundocelulas1.png">&Oacute;rg&atilde;o</td>
      <td width="37%" background="../../imagens/fundocelulas1.png">Emiss&atilde;o</td>
      <td width="11%" background="../../imagens/fundocelulas1.png">E-Mail</td>
      <td width="36%" background="../../imagens/fundocelulas1.png">Pai </td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10">
dd-mm-aaaa </td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="email" type="text" id="email" value="<? echo $email; ?>"></td>
      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="pai" type="text" id="pai" value="<? echo $pai; ?>"></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png">M&atilde;e</td>
      <td background="../../imagens/fundocelulas2.png">Endere&ccedil;o</td>
      <td background="../../imagens/fundocelulas2.png">N&uacute;mero</td>
      <td background="../../imagens/fundocelulas2.png">Bairro</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="mae" type="text" id="endereco3" value="<? echo $mae; ?>"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>"></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png">Complemento</td>
      <td background="../../imagens/fundocelulas2.png">Cidade</td>
      <td background="../../imagens/fundocelulas2.png">Cep</td>
      <td background="../../imagens/fundocelulas2.png">Estado</td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="cidade" type="text" id="cidade" value="<? echo $cidade; ?>"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">
 00000-000</td>
      <td background="../../imagens/fundocelulas2.png"><select class='class02' name="estado" id="select7">
        <option selected><? echo $estado; ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr> 
      <td background="../../imagens/fundocelulas2.png"><p>Telefone</p></td>
      <td background="../../imagens/fundocelulas2.png">Celular</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="telefone" type="text" id="endereco5" value="<? echo $telefone; ?>" size="15" maxlength="14"></td>
      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="celular" type="text" id="telefone" value="<? echo $celular; ?>" size="15" maxlength="14"></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF">
        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('Y-m-d'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $hora_atual; ?>">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
</font></strong></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" background="../../imagens/fundocelulas2.png"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit" value="Registrar Cupom"> 
          <input class='class01' type="reset" name="Submit2" value="Limpar"> </td><td background="../../imagens/fundocelulas2.png"><div align="right"> </div></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong>Cadastro efetuado por <br>
        </strong><strong><font color="#0000FF"><? echo $operador; ?>
        
      </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_operador; ?>
      </font><font color="#0000FF"> </font></strong></td>
      <td width="20%" background="../../imagens/fundocelulas1.png"><strong>Celular:<font color="#0000FF"><br>
              <? echo $cel_operador; ?>
      </font><font color="#0000FF"> </font></strong></td>
    </tr>
    <tr>
      <td width="18%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estab_pertence; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%" background="../../imagens/fundocelulas1.png"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estab_pertence; ?>
      </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estab_pertence; ?>
      </font><font color="#0000FF"> </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estab_pertence; ?>          </font></strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Data do Cadastro <br>
              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Hora que foi efetuado o Cadastro <br>
              <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong></strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
  </table>
  <?
  	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	?>
</form>
<form name="form1" method="post" action="">
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$dataalteracao = $linha[31];
$horaalteracao = $linha[32];
?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" valign="top" background="../../imagens/fundocelulas2.png"><strong>&Uacute;ltima altera&ccedil;&atilde;o efetuada pelo operador: <br>
      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%" valign="top" background="../../imagens/fundocelulas2.png"><strong>Celular:<font color="#0000FF"><br>
              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
    </tr>
    <tr>
      <td width="18%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estab_pertence; ?> </font></strong></td>
      <td valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>
      <td valign="top" background="../../imagens/fundocelulas2.png"><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>
    </tr>
    <tr>
      <td valign="top" background="../../imagens/fundocelulas2.png"><strong>Data do Cadastro <br>
            <font color="#0000FF"><? echo $dataalteracao; ?> </font></strong></td>
      <td valign="top" background="../../imagens/fundocelulas2.png"><strong>Hora que foi efetuado o Cadastro <br>
            <font color="#0000FF"><? echo $horaalteracao; ?> </font></strong></td>
      <td valign="top" background="../../imagens/fundocelulas2.png"><strong></strong></td>
      <td valign="top" background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
  </table>
  <? } ?>
</form>
<form name="form1" method="post" action="">
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
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];


?>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong>Cadastro atualmente sendo alterado por: </strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong>Ol&aacute;! Seja bem vindo<br>
      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%" background="../../imagens/fundocelulas1.png"><strong>Celular:<font color="#0000FF"><br>
              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
    </tr>
    <tr>
      <td width="18%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%" background="../../imagens/fundocelulas1.png"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estab_pertence; ?> </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>
    </tr>
  </table>
<? } ?>
</form>
</body>
</html>
