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

<title>FRANQUIA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="4">

        <?

require '../../conect/conect.php';



?>	  </td>
    </tr>

    <tr>

      <td width="23%">&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer na sess&atilde;o Mala-Direta?</font></strong></td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar">

      </form></td>

      <td colspan="3">&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td width="24%"><form name="form2" method="post" action="editar_texto.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit2" value="Editar texto da Mala_Direta">
      </form></td>

      <td width="12%">&nbsp;</td>
      <td width="41%">&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

<p>&nbsp; </p>

</body>

</html>

