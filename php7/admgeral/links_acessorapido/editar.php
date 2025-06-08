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

<p class="style2">Edi&ccedil;&atilde;o de Link. </p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="grava_editar.php" method="post" name="form2">

  <table width="100%"  border="0">

        <tr>

          <td width="5%">

<?



$codigo = $_POST['codigo'];



$sql = "select * from link_acessorapido where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$rotulo = $linha[1];
$url = $linha[2];

?>		  </td>

          <td width="95%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>
        </tr>

        <tr>

          <td height="40">Rotulo</td>

          <td><input name="rotulo" type="text" id="rotulo" value="<? echo $rotulo; ?>" size="50" maxlength="50"></td>
        </tr>
        <tr>
          <td height="40">Link</td>
          <td><input name="url" type="text" id="url" value="<? echo $url; ?>" size="100"></td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td><input type="submit" name="Submit2" value="Atualizar"></td>
        </tr>

		          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>



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
<p>&nbsp;</p>

</body>

</html>

