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
  <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4">
        <?
//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS
require '../../../conect/conect.php';

$solicitacao = $_POST['solicitacao'];


?>
</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">O que deseja fazer com as categorias de despesas?</font></strong></div></td>
    </tr>
    <tr>
      <td width="26%"><form name="form4" method="post" action="../principal.php">
        <input type="submit" name="Submit4" value="Voltar ao menu Financeiro">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
      <td width="74%"><?


if($solicitacao=="inserir"){

$categoria = $_POST['categoria'];
$status_categoria_despesa = "Ativo";

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}


$comando = "insert into categorias_despesas(categoria,status_categoria_despesa) values('$categoria','$status_categoria_despesa')";



mysql_query($comando,$conexao) or die("Erro ao gravar categoria de despesa");


echo "Categoria de despesa gravada com sucesso!<br>";



}

?></td>
      <td width="74%">&nbsp;</td>
      <td width="74%"><?
$codigo = $_POST['codigo'];
$status_alterar = $_POST['status'];
 
  

if($solicitacao=="editar"){
	
if($status_alterar=="Ativo"){
	
$status = "Inativo";

}

if($status_alterar=="Inativo"){
	
$status = "Ativo";

}
	
	
	

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}

$comando = "update `$db`.`categorias_despesas` set `status_categoria_despesa` = '$status' where `categorias_despesas`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar status");


//echo "<br>";



}

?></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form2" method="post" action="editar_categorias.php">
        <input type="submit" name="Submit2" value="Editar categoria ">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
      <td><form name="form3" method="post" action="selecione_codigo_exclusao_categoria.php">
        <input type="submit" name="Submit3" value="Excluir categoria ">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="46%" valign="top"><div align="center">
      <form name="form3" method="post" action="menu.php">
        <table width="100%" border="0">
          <tr>
            <td width="2%"><div align="center"></div></td>
            <td width="43%"><div align="right">Categoria Despesa</div></td>
            <td width="19%"><div align="center"></div></td>
            <td width="3%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="right">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="solicitacao" type="hidden" id="solicitacao" value="inserir">
              <input name="categoria" type="text" id="categoria">
            </div></td>
            <td><div align="left">
              <input type="submit" name="Submit5" value="Inserir">
            </div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </form>
    </div>
        <div align="center"></div></td>
    <td width="8%"><div align="center"></div></td>
    <td width="46%"><div align="center">
      <table width="100%" border="0">
        <tr>
          <td width="2%"><div align="center"></div></td>
          <td width="31%"><div align="center">Categoria Despesa</div></td>
          <td width="26%"><div align="center">#</div></td>
          <td width="9%"><div align="center"></div></td>
        </tr>
        <?
$solicitacao = $_POST['solicitacao'];

if($solicitacao =="editar"){
$sql = "select * from categorias_despesas order by categoria asc";
}
else{
	
$sql = "select * from categorias_despesas order by categoria asc";

}


$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg = 0;

$codigo = $linha[0];
$categoria = $linha[1];
$status_categoria_despesa = $linha[2];

?>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"><? echo $categoria; ?></div></td>
          <td><div align="center">
            <form name="form4" method="post" action="menu.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="editar">
              <input name="status" type="hidden" id="status" value="<? echo $status_categoria_despesa; ?>">
              <input type="submit" name="button" id="button" value="<? echo $status_categoria_despesa; ?>">
            </form>
          </div></td>
          <td><div align="center"></div></td>
        </tr>
        <?

}

?>
      </table>
    </div>
        <div align="center"></div></td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
