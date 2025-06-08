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
<title>Edi&ccedil;&atilde;o de produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<p>        <?
require '../../conect/conect.php';
?>

</p>
<p class="style2">Altera&ccedil;&atilde;o de nome de Status. </p>
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<form action="autalizar_status.php" method="post" name="form2">
  <table width="90%"  border="0" align="center">
        <tr>
          <td width="10%">
<?

$codigo = $_POST['codigo'];

$sql = "select * from status where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$status = $linha[1];
$setor = $linha[2];
$mensagem_status = $linha[4];
	$operador = $linha[5];
	$admin = $linha[6];
	$admgeral = $linha[7];

?>
		  
		  </td>
          <td width="32%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
          Status</td>
          <td width="33%">Setor</td>
          <td width="65%">Mensagem Status</td>
          <td width="65%">Operador</td>
          <td width="65%">Admin</td>
          <td width="65%">Admgeral</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td><input name="status" type="text" id="status" value="<? echo $status; ?>"></td>
          <td><select name="setor" id="setor">
			<option selected><? echo "$setor"; ?></option>
            <option>CONSIGNADO</option>
            <option>CP_VEICULOS</option>
          </select></td>
          <td><input name="mensagem_status" type="text" id="mensagem_status" value="<? echo "$mensagem_status"; ?>" size="50"></td>
          <td><select name="operador" id="operador">
            <option><? echo "$operador"; ?></option>
            <option>sim</option>
			<option>nao</option>
            <option selected="selected"><? echo "$operador"; ?></option>
          </select></td>
          <td><select name="admin" id="admin">
            <option><? echo "$admin"; ?></option>
            <option>sim</option>
			<option>nao</option>
            <option selected="selected"><? echo "$admin"; ?></option>
          </select></td>
          <td><select name="admgeral" id="admgeral">
            <option selected="selected"><? echo "$admgeral"; ?></option>
            <option>sim</option>
            <option>nao</option>
          </select></td>
          <td><input type="submit" name="Submit2" value="Atualizar"></td>
        </tr>
		         

          <? } ?>

  </table>
</form>
            </option>
          </select></td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr>
        </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
