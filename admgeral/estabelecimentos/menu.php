<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");

require '../../conect/conect.php';

error_reporting(E_ALL);

$operador = $_POST['operador'];
$date = $_POST['date'];
$hora = $_POST['hora'];
$area = $_POST['area'];
$valor = $_POST['valor'];

$comando = "insert into areasdeacesso(operador,date,hora,area,valor) values('$operador','$date','$hora','$area','$valor')";

mysql_query($comando,$conexao);
?>



<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2">


</td>

    </tr>

    <tr>

      <td width="23%">&nbsp;</td>

      <td width="77%"><strong><font color="#0000FF" size="4">Oque deseja fazer com os estabelecimentos?</font></strong></td>

    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form action="inserir_estabelecimento.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Cadastrar Estabelecimento">

      </form></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="informe_nfantasia_para_edicao.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit3" value="Editar Estabelecimento">

      </form></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form4" method="post" action="informe_estabelecimento_para_exclusao.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit4" value="Excluir Estabelecimento">

      </form></td>

    </tr>

  </table>

<p>&nbsp; </p>

</body>

</html>

