<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

?>
<html>
<head>
<title>Emiss&atilde;o de etiquetas para mala-direta - ALLCRED FINANCEIRA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 5mm;
	margin-top: 8mm;
}
.style1 {font-size: 12px}
-->
</style></head>


			<?
			
require '../../conect/conect.php';
			
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); }?>" bgproperties="fixed">

<TABLE width="100%" border=0 align="center" cellPadding=0 cellSpacing=0>
    <?
	
$tipo = $_POST['tipo'];
	
$sql = "SELECT * FROM clientes where tipo = '$tipo' order by nome asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
  <td>    <span class="style1"><font color="#000000"><? echo $linha[1]; ?></font><br>        
      <font color="#000000"><? echo $linha[11]; ?></font> , <font color="#000000"><? echo $linha[12]; ?></font><br>        
      <font color="#000000"><? echo $linha[13]; ?></font> <font color="#000000"><? echo $linha[14]; ?></font><br>
		<font color="#000000"><? echo $linha[15]; ?></font> - <font color="#000000"><? echo $linha[16]; ?><br>        
		<font color="#000000"><? echo $linha[17]; ?></font></span><br>
    <br></td>

          <?
if($reg==3){
echo "</tr><tr></tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>


</div>
<p>&nbsp;</p>
</body>
</html>
