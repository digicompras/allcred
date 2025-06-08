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



<form name="form1" method="post" action="../mensagens_aos_funcionarios/menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class='class01' type="submit" name="Submit22" value="Voltar">

</form>

<form action="grava_edit_texto.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="80%" border="0" cellspacing="10">

    <tr>

      <td colspan="2"><?

require '../../conect/conect.php';

?></td>
    </tr>

    <tr>

	<?

$sql = "SELECT * FROM mensagens_emails";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$texto1 = $linha[1];
$texto2 = $linha[2];

?>

      <td width="11%">&nbsp;</td>

      <td><p><strong><font color="#0000FF" size="4">Editando texto dos emails de resposta!</font></strong></p>      </td>
    </tr>

    <tr>

      <td><strong><font color="#0000FF">Texto se aprovado</font></strong></td>

      <td><strong><font color="#0000FF">Texto demais status</font></strong></td>
    </tr>

    <tr> 

      <td valign="top"><textarea class='class02' name="texto1" cols="50" rows="10" wrap="PHYSICAL" id="texto1"><? echo $texto1; ?></textarea></td>

      <td width="60%" valign="top"><textarea class='class02' name="texto2" cols="50" rows="10" wrap="PHYSICAL" id="texto2"><? echo $texto2; ?></textarea></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>



          <? } ?>
    </tr>
    <tr> 

      <td>&nbsp;</td>

      <td><input class='class01' type="submit" name="Submit" value="Salvar"></td>
    </tr>
  </table>

</form>

<p>&nbsp; </p>

</body>

</html>

