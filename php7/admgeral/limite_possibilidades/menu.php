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
require '../../conect/conect.php';
?>	

<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;

}
-->
</style>


</head>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">

  <table width="70%" border="0" align="center" cellspacing="10">

    <tr>

      <td colspan="3">

  </td>
    </tr>

    <tr>

      <td width="18%">&nbsp;</td>

      <td colspan="2"><strong><font color="#0000FF" size="4">ALTERANDO O LIMITE MAXIMO DE PEDIDOS DE POSSIBILIDADES/MARGENS</font></strong></td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class='class01' type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td width="35%"><?
$comando = $_POST['comando'];
$limite = $_POST['limite'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];


if(empty($ano)){
		 $ano_atual = date('Y'); 
		 }
		 else{
		 $ano_atual = $ano;
		 }

if(empty($mes)){
		 $mes_atual = date('m'); 
		 }
		 else{
		 $mes_atual = $mes;
		 }




if($comando=="alterar"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`limite_possibilidades` set `limite` = '$limite' where `limite_possibilidades`. `codigo` = '0' limit 1 ";

}


mysql_query($comando,$conexao) or die("Erro ao gravar dados");





echo "Limite para pedidos de Possibilidades alterado com sucesso<br>";



}

?></td>
      <td width="47%"><?
  $comando = $_POST['comando'];
  $limite_margem_portabilidade = $_POST['limite_margem_portabilidade'];


if($comando=="alterar margem portabilidade"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`limite_margem_portabilidade` set `limite` = '$limite_margem_portabilidade' where `limite_margem_portabilidade`. `codigo` = '0' limit 1 ";

}


mysql_query($comando,$conexao) or die("Erro ao gravar dados");





echo "Limite para pedidos de Margem/Portabilidade alterado com sucesso<br>";



}

?></td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>	<?

$sql = "SELECT * FROM limite_possibilidades";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$limite = $linha[1];

}

?></td>
      <td><?

$sql = "SELECT * FROM limite_margem_portabilidade";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$limite_margem_portabilidade = $linha[1];

}

?></td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form2" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="comando" type="hidden" id="comando" value="alterar">
<input name="limite" type="text" id="limite" value="<? echo $limite; ?>" size="4">
<input class='class01' type="submit" name="Submit2" value="Editar Limite Possibilidades">

      </form></td>
      <td><form name="form2" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="comando" type="hidden" id="comando" value="alterar margem portabilidade">
        <input name="limite_margem_portabilidade" type="text" id="limite_margem_portabilidade" value="<? echo $limite_margem_portabilidade; ?>" size="4">
        <input class='class01' type="submit" name="Submit" value="Editar Limite Margem/Portabilidade">
      </form></td>
    </tr>
  </table>
  <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><form name="form3" method="post" action="menu.php">
        Periodo
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <select name="mes" id="mes">
              <option selected><? echo $mes_atual; ?></option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <select name="ano" id="ano">
              <option>
              <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
              </option>
              <option selected><? echo $ano_atual; ?></option>
              <option>
              <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
              </option>
            </select>
            <input class='class01' type="submit" name="button" id="button" value="Pesquisar">
      </form>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="36%">Operador</td>
      <td width="32%"><div align="center">Pedidos de Margem Portabilidade</div></td>
      <td width="32%"><div align="center">Pedidos de Possibilidades</div></td>
    </tr>
  <?  
$sql = "SELECT * FROM operadores where funcao <> 'Psicóloga Organizacional' and funcao <> 'Secretaria' and funcao <> 'Assistente' and funcao <> 'Operador de Privado' and funcao <> 'Adm Suporte' and funcao <> 'Gerente' and status = 'Ativo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

  
  ?>

    <tr>
      <td><? echo "$nome_operador"; ?></td>
      <td>
        <div align="center">
          <?
$sql2 = "SELECT * FROM margem_portabilidade where operador = '$nome_operador' and mes = '$mes_atual' and ano = '$ano_atual'";
$res2 = mysql_query($sql2);
$pedidos_de_portabilidade = mysql_num_rows($res2);
 
echo "$pedidos_de_portabilidade"; 




?>
      </div></td>
      <td><div align="center">
        <?
$sql2 = "SELECT * FROM possibilidades where operador = '$nome_operador' and mes = '$mes_atual' and ano = '$ano_atual'";
$res2 = mysql_query($sql2);
$pedidos_de_possibilidades = mysql_num_rows($res2);
 
echo "$pedidos_de_possibilidades"; 




?>
      </div></td>
    </tr>
  <? } ?>
  </table>
<p>&nbsp; </p>

</body>

</html>

