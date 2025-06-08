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

<style type="text/css">
.style1 {color: #000000;
	font-size: 12px;
	font-weight: bold;
}
</style>
</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2">        <?

require '../../conect/conect.php';

?>



</td>

    </tr>

    <tr>

      <td width="24%">&nbsp;</td>

      <td width="76%"><strong><font color="#0000FF" size="4">O que deseja fazer com Link's de acesso rapido?</font></strong></td>

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

      <td><form name="form2" method="post" action="inserir.php">

        <input type="submit" name="Submit2" value="Inserir">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </form></td>

    </tr>

  </table>

<p>&nbsp; </p>
<table width="100%"  border="0">
  <tr class="style1">
    <td colspan="3"><div align="center">
      <form name="form4" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="rotulo" type="text" id="nome2" value="TODOS" size="50">
        <input type="submit" name="Submit9" value="Buscar">
      </form>
    </div></td>
  </tr>
  <tr class="style1">
    <td><div align="center" class="style1">Rotulo</div></td>
    <td><div align="center" class="style1">
      <div align="left"><strong>Url</strong></div>
    </div></td>
    <td><div align="center" class="style1">#</div></td>
  </tr>
  <?
$rotulo = $_POST['rotulo'];



if($rotulo=="TODOS"){

$sql = "select * from link_acessorapido order by rotulo asc";

}

else{

if(empty($nome)){

$sql = "select * from link_acessorapido where rotulo = '.' order by rotulo asc";



}

else{

$sql = "select * from link_acessorapido where rotulo like '$rotulo%' order by rotulo asc";

}}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$rotulo = $linha[1];

$url = $linha[2];



?>
  <tr>
    <td width="19%" valign="top"><div align="center">
      <form name="form1" method="post" action="editar.php" >
        <div align="center"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo;  ?>">
          
          <input type="submit" name="Submit5" value="<? echo $rotulo; ?>">
        </div>
      </form>
    </div></td>
    <td width="70%" valign="top"><div align="left"><strong><font color="#0000FF"><? echo $url; ?></font></strong></div></td>
    <td width="11%" valign="top"><div align="center">
      <form name="form1" method="post" action="excluir.php" >
        <div align="center">
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo;  ?>">
          <input type="submit" name="Submit10" value="Excluir">
          </div>
        </form>
    </div></td>
  </tr>
  <? } ?>
</table>
</body>

</html>

