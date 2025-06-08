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
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit3" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<form action="grava_status.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="6">        <?
require '../../conect/conect.php';
?>

</td>
    </tr>
    <tr>
      <td width="18%">&nbsp;</td>
      <td colspan="5"><strong><font color="#0000FF" size="4">Tela de cadastro de Status!</font></strong></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>Setor</td>
      <td>Mensagem Status</td>
      <td>Operador</td>
      <td>Admin</td>
      <td>Admgeral</td>
    </tr>
    <tr> 
      <td><input name="status" type="text" id="status"></td>
      <td width="20%"><select name="setor" id="setor">
        <option>CONSIGNADO</option>
        <option>CP_VEICULOS</option>
      </select></td>
      <td width="20%"><input name="mensagem_status" type="text" id="mensagem_status" size="50"></td>
      <td><select name="operador" id="operador">
        <option><? echo "$operador"; ?></option>
        <option>sim</option>
        <option selected="selected">nao</option>
      </select></td>
      <td><select name="admin" id="admin">
        <option><? echo "$admin"; ?></option>
        <option>sim</option>
        <option selected="selected">nao</option>
      </select></td>
      <td><select name="admgeral" id="admgeral">
        <option><? echo "$admgeral"; ?></option>
        <option selected="selected">sim</option>
        <option>nao</option>
      </select></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="5"><input type="submit" name="Submit" value="Gravar Status">
      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
</form>
<?



$sql = "select * from status order by status asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;
?>
<td>
<br>
<span class="style1">Código:</span> <? printf("$linha[0]<br>"); ?>
<span class="style1">Status:</span> <? printf("$linha[1]<br>"); ?>
</td>
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>

<p>&nbsp; </p>
</body>

</html>
<? 
mysql_close($conexao);
?>

