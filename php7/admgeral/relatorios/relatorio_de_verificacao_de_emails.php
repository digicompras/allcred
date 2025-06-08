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

<title>RELATÓRIO PERIÓDICO DE ALTERAÇÃO DE CLIENTES - ALLCRED FINANCEIRA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}

.style14 {font-size: 14px; font-weight: bold; }
.style3 {font-size: 10px}
.style15 {font-size: 16px}
.style16 {font-size: 10px; font-weight: bold; }
.style22 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';







$date = date('Y-m-d');

$hora = date('H:i:s');



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <p class="style4"><span class="style4"><strong>Total de clientes cadastrados no banco de dados  -<span class="style15">
        <? 	
$sql = "SELECT * FROM clientes";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_cli = mysql_num_rows($res);

}

echo "$registros_cli";
  ?>
      </span></strong></span><br>
</p>
<p><strong>Data do relat&oacute;rio</strong><strong> </strong> <span class="style14"><? echo "$date - $hora"; ; ?></span></p>
<table width="70%" border="0" align="center">
  <tr>
    <td width="13%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="34%"><form action="exporta_excel_verificacao_de_emails.php" method="post" name="form3" target="_blank">
      <span class="style22">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="cidade" type="hidden" id="cidade" value="<? echo $cidade; ?>">
      <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      <input type="submit" name="button" id="button" value="Exportar para Excel">
    </form></td>
    <td width="17%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
<p>
      </p>
      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <?
					

$sql = "SELECT * FROM propostas where tipo_contrato = 'SITE' group by cpf order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];

$nome = $linha[4];

$cpf_proposta = $linha[7];

$email_proposta = $linha[23];


?>
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center" class="style3"><strong>Num Proposta</strong></div></td>
          <td><div align="center" class="style16">Cliente</div></td>
          <td><div align="center" class="style16">CPF</div></td>
          <td><div align="center"><strong>E-Mail da Proposta</strong></div></td>
          <td><div align="center" class="style16">Telefone</div></td>
          <td><div align="center" class="style16"> Celular</div></td>
        </tr>
        
        <tr>
          <td width="6%"><div align="center"><span class="style3"><? echo $num_proposta; ?></span></div></td>
          <td width="15%"><div align="center" class="style3"><? echo $nome; ?></div></td>
          <td width="9%"><div align="center" class="style3"><? echo $cpf_proposta; ?></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $email_proposta; ?></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $telefone; ?></div></td>
          <td width="4%"><div align="center" class="style3"><? echo $celular; ?></div></td>
          </tr>
          <?
$sql2 = "SELECT * FROM clientes where cpf = '$cpf_proposta'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$email_cadastro = $linha[20];

		   ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="center"><strong>E-Mail do cadastro</strong></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        <tr>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center"><span class="style3"></span><span class="style3"><? echo $email_cadastro; ?></span></div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
        <tr>
        
          <td colspan="6" background="../../imagens/fundocelulas2.png"><div align="center">------------------- // --------------</div></td>
		  <?  } } ?>
</table>
<p>&nbsp;</p>      
<p></p>
      <p>
<p>&nbsp;</p>
<p align="center">

<?

$sql = "SELECT * FROM allcred limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>

<br>

<span class="style4"><strong><? echo $site; ?></strong></span>

<br>

<? echo $endereco; ?>

,

<? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>

<br>

<? echo "Telefone / Fax: ". $telefone." "; ?>

/ <? echo $fax; ?>

<br>

<? echo "E-Mail: ". $email_empresa; ?>

</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>

</body>

</html>

