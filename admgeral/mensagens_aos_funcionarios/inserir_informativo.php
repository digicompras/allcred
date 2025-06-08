<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<?

error_reporting(E_ALL);



require '../../conect/conect.php';

?>

<?

$solicitacao = $_POST['solicitacao'];

if($solicitacao=="excluirarquivo"){
	
$codigo = $_POST['codigo'];
$nomearquivo_old = $_POST['nomearquivo_old'];

$comando = "delete from `informativos` where `informativos`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir informativo");
	
}


$caminho = "../../informativos/$nomearquivo_old";

unlink($caminho);

?>


<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Voltar">

</form>

<form action="grava_informativo.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="90%" border="0" align="center" cellspacing="10">

    <tr>

      <td colspan="2">&nbsp;</td>

    </tr>

    <tr>

      <td width="22%">&nbsp;</td>

      <td width="78%"><strong><font color="#0000FF" size="4">Tela de cadastro de informativos</font></strong></td>

    </tr>

    <tr>

      <td>Assunto</td>

      <td>Informativo</td>

    </tr>

    <tr> 

      <td><input type="text" name="bco_operacao" id="bco_operacao"></td>

      <td><input name="arquivo" type="file" id="arquivo"></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td><input type="submit" name="Submit" value="Salvar"></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>
<p>&nbsp;</p>
	<?
	
	$sql = "SELECT * FROM informativos";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$nomearquivo_old = $linha[2];
	
$bco_operacao = $linha[1];

	
	?>

  
  <table width="60%"  border="0" align="center">
    <tr>
      <td width="12%" align="center"><strong>Informativo</strong></td>
      <td width="23%" align="center"><strong>Assunto</strong></td>
      <td width="34%"><div align="center">#</div></td>
      <td width="31%" align="center">#</td>
    </tr>
	  
    <tr>
      <td align="center"><?

	  printf("<a href='../../informativos/$nomearquivo_old' target='_blank'><img src='../../informativos/$nomearquivo_old' border='0' width='80' height='96'></a>");
	
	echo "<br> $nomearquivo_old";

	  ?></td>
		<form action="atualiza_informativo.php" method="post" enctype="multipart/form-data" name="form1">
			
      <td align="center"><input name="bco_operacao" type="text" id="bco_operacao" value="<? echo "$bco_operacao"; ?>"></td>
      <td><input name="arquivo" type="file" id="arquivo">
		<input name="nomearquivo_old" type="hidden" id="nomearquivo_old" value="<? echo "$nomearquivo_old"; ?>">
		<input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo"; ?>">
        <input type="submit" name="Submit2" value="Atualizar">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
		</td>
		</form>
      <td><form name="form2" method="post" action="inserir_informativo.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="nomearquivo_old" type="hidden" id="nomearquivo_old" value="<? echo "$nomearquivo_old"; ?>">
        <input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo"; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="excluirarquivo">
        <input type="submit" name="submit" id="submit" value="X">
      </form></td>
		
    </tr>
  </table>
	

	<? } ?>
<p>&nbsp;</p>
<p>&nbsp; </p>

</body>



</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>



