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

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?



require '../../conect/conect.php';

//$nome = $_POST['nome'];

$data = $_POST['data'];

$date = $_POST['date'];


$mes_ano = date('m-y');

$codigo_ponto = $_POST['codigo_ponto'];





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

background="../background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

<? } ?>





<?

$codigo = $_POST['codigo'];
$mes_ano = $_POST['mes_ano'];




$sql = "SELECT * FROM analiseplanilha where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigoeditar = $linha[0];

$nome= $linha[1];

$data= $linha[2];
	
$analise = $linha[3];
	
$valor = $linha[4];
	

$dia_semana = $linha[11];




}



?>

<form name="form1" method="post" action="index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="codigo_ponto2" type="hidden" id="codigo_ponto2" value="<? echo $codigo_ponto; ?>">

  <input class="class01" type="submit" name="Submit" value="Voltar">

</form>

<p>&nbsp;</p>

<form name="form2" method="post" action="inserir.php">

  <table width="87%"  border="0">

    <tr>

      <td>&nbsp;</td>

      <td><div align="center"><strong>Nome</strong></div></td>

      <td><div align="center"><strong>Data</strong></div></td>

      <td><div align="center"><strong>Analise</strong></div></td>

      <td><div align="center"><strong>Valor</strong></div></td>

      <td><div align="center"></div></td>

      <td><div align="center"></div></td>

      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>

    <tr>

      <td width="6%"><input name="date" type="hidden" id="date" value="<? echo $date; ?>">
      <input name="dia_semana" type="hidden" id="dia_semana" value="<? echo $dia_semana; ?>"></td>

      <td width="20%"><? echo $nome; ?>
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>"></td>

      <td width="8%"><div align="center"><? echo $data; ?></div></td>

      <td width="10%"><div align="center">
        <input class="class02" name="analise" type="text" id="analise" value="<? echo $analise; ?>" size="10" maxlength="10">
      </div></td>

      <td width="9%"><div align="center">
        <input class="class02" name="valor" type="text" id="valor" value="<? echo $valor; ?>" size="10" maxlength="10">
      </div></td>

      <td width="10%"><div align="center"></div></td>

      <td width="8%"><div align="center">
        <input name="sai_t" type="hidden" id="sai_t" value="<? echo $sai_t; ?>" size="10" maxlength="10">
      </div></td>

      <td width="8%"><div align="center"></div></td>
      <td width="13%"><div align="center">
        <input name="obs" type="hidden" id="obs" value="<? echo $obs; ?>">
      </div></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td><input name="codigoeditar" type="hidden" id="codigoeditar" value="<? echo $codigoeditar; ?>">
      <input name="solicitacao" type="hidden" id="solicitacao" value="gravaeditar">
      <input name="mes_ano" type="hidden" id="mes_ano" value="<?echo "$mes_ano"; ?>"></td>

      <td><input class="class01" type="submit" name="Submit2" value="Atualizar"></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>

<p>&nbsp;</p>

  <p>&nbsp;</p>

</body>

</html>

