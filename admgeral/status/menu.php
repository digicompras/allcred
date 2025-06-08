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

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="4">        <?

require '../../conect/conect.php';

?>
		  
<?
error_reporting(E_ALL);
		  
$solicitacao = $_POST['solicitacao'];


$codigo = $_POST['codigo'];
$status = $_POST['status'];
$setor = $_POST['setor'];
$mensagem_status = $_POST['mensagem_status'];
	$operador = $_POST['operador'];
	$admin = $_POST['admin'];
	$admgeral = $_POST['admgeral'];
	$condicao = $_POST['condicao'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
		  
		  if($solicitacao=="salvareditar"){
			  
$comando = "update `$db`.`status` set `status` = '$status',`setor` = '$setor',`mensagem_status` = '$mensagem_status',`operador` = '$operador',`admin` = '$admin',`admgeral` = '$admgeral',`condicao` = '$condicao' where `status`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar status");

echo " As novas informaçõesdo do $status foram alteradas com sucesso";
			  
		  }
?>




</td>

    </tr>

    <tr>

      <td width="23%">&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer com os Status?</font></strong></td>

    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit222" value="Voltar ao menu principal">

      </form></td>

      <td colspan="3">&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td width="17%"><form name="form2" method="post" action="inserir_status.php">

        <input type="submit" name="Submit2" value="Inserir Status">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </form></td>
      <td width="17%">&nbsp;</td>
      <td width="43%">&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td colspan="3">&nbsp;</td>

    </tr>

  </table>

<p>&nbsp;</p>
<table width="90%"  border="0" align="center">
	<?
	$sql = "select * from status order by status";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$codigo = $linha[0];
$status = $linha[1];
$setor = $linha[2];
$mensagem_status = $linha[4];
	$operador = $linha[5];
	$admin = $linha[6];
	$admgeral = $linha[7];
	$condicao = $linha[8];
	?>
  <tr>
    <td width="0%">
</td>
    <td width="23%">      Status</td>
    <td width="14%">Setor</td>
    <td width="26%">Mensagem Status</td>
    <td width="7%">Operador</td>
    <td width="7%">Admin</td>
    <td width="7%">Admgeral</td>
    <td width="9%">Condicao</td>
    <td width="7%">&nbsp;</td>
  </tr>
	<form action="menu.php" method="post" name="form2">
  <tr>
    <td height="40">&nbsp;</td>
    <td><? echo $status; ?><input name="status" type="hidden" id="status" value="<? echo $status; ?>"></td>
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
    <td><select name="condicao" id="condicao">
      <option selected="selected"><? echo "$condicao"; ?></option>
      <option>ativo</option>
      <option>inativo</option>
    </select></td>
    <td><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "salvareditar"; ?>">      <input type="submit" name="Submit" value="Atualizar"></td>
  </tr>
	</form>
  <? } ?>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p>

</body>

</html>

