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
<title>Emiss&atilde;o de etiquetas para mala-direta - ALLCRED FINANCEIRA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-right: 0mm;
	margin-bottom: 8mm;
	margin-left: 0mm;
	margin-top: 8mm;
}
.style1 {font-size: 12px}
.style23 {color: #FFFFFF}
.style22 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
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

<table width="70%" border="0" align="center">
  <tr>
    <td width="13%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="34%"><form action="exporta_excel_cidade_e_secretaria.php" method="post" name="form3" target="_blank">
      <span class="style22">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="cidade" type="hidden" id="cidade" value="<? echo $cidade; ?>">
      <input name="secretaria" type="hidden" id="secretaria" value="<? echo $secretaria; ?>">
      <input class="class01" type="submit" name="button" id="button" value="Exportar para Excel">
    </form></td>
    <td width="17%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<TABLE width="95%" border=0 align="center" cellPadding=5 cellSpacing=1>
    <?
	
$cidade = $_POST['cidade'];
	$secretaria = $_POST['secretaria'];
	
$sql = "SELECT * FROM clientes where cidade = '$cidade' and secretaria = '$secretaria' and cpf <> '' order by nome asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
	
$codigo = $linha[0];

$nome = $linha[1];

$cpf = $linha[4];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$e_mail = $linha[20];
?>
          <td valign="middle"><span class="style23"> </span>  
    <div align="center"><span class="style1"><font color="#000000"><br>
	<? echo $nome; ?></font><br>        
              <font color="#000000"><? echo $endereco; ?></font> <br>        
              <font color="#000000"><font color="#000000"><? echo $numero; ?></font> <? echo $bairro; ?></font> <font color="#000000"><? echo $telefone; ?></font><br>
              <font color="#000000"><? echo $celular; ?></font><br>
		<font color="#000000"><? echo "$cidade - $estado"; ?></font></span><span class="style1"><br>
	          <span class="style23">.</span><br>
		    </span>  </div></td>




          <?
if($reg==3){
echo "</tr><tr></tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>


</div>
</body>
</html>
