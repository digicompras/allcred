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
<title>LISTANDO TODAS AS PROPOSTAS DO CLIENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>
<?

require '../../conect/conect.php';

?>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>" background-attachment: fixed;>





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="menu.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit2" value="Voltar">
</form>
      <table width="100%"  border="0">
        <tr>
          <td><div align="center"><h2> 
            <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_cliente = $linha[4];

}

?>
         Listando todas as propostas do cliente:<? echo " $nome_cliente"; ?></h2></div></td>
        </tr>
      </table>
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tipo_proposta = $linha[83];

$valor_liquido_cliente = $linha[115];

?>
      <table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center"><strong>N&ordm; da Proposta </strong></div></td>
          <td><div align="center"><strong>Tipo Proposta</strong></div></td>
          <td><div align="center"><strong>Valor Liquido Cliente</strong></div></td>
          <td width="19%"><div align="center"><strong>Quant de parcelas </strong></div></td>
          <td width="17%"><div align="center"><strong>Valor das parcelas </strong></div></td>
          <td><div align="center"><strong>Status</strong></div></td>
        </tr>
        <tr>
          <td width="23%"><form action="../propostas/imprimir_proposta.php" method="post" name="form2" target="_blank">
              <div align="center">
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
                <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>
                <? printf("$linha[0]"); ?>
                <input class='class01' type="submit" name="Submit" value="Visualizar Proposta">
              </div>
          </form></td>
          <td width="22%"><div align="center"><? echo $tipo_proposta; ?></div></td>
          <td width="22%"><div align="center"><strong><font color="#0000FF"><? echo "R$ ". $valor_liquido_cliente; ?></font></strong></div></td>
          <td><div align="center"><? printf("$linha[26]"); ?> </div></td>
          <td><div align="center"><? printf("$linha[27]"); ?> </div></td>
          <td width="19%"><div align="center"><? printf("$linha[51]"); ?> </div></td>
          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
          <? } ?>
            </table>
<p>&nbsp;</p>
</body>
</html>
