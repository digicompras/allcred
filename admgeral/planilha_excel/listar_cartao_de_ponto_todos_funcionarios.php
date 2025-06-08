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

<title>LISTANDO CARTÃO DE PONTO DO FUNCIONÁRIO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}
.style3 {font-size: 36px; }
.style4 {font-size: 14px}
.style7 {font-size: 8px; }

-->

</style>
</head>

<?



require '../../conect/conect.php';





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



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form name="form1" method="post" action="index.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class="class01" type="submit" name="Submit2" value="Voltar">

</form>

<p>

        

</p>

<table width="100%"  border="1" align="center" bordercolor="#000000">



        <tr>
          <td width="7%"><div align="center"><strong>NOME</strong></div></td>
          <td width="7%"><div align="center"><strong>Dia Semana</strong></div></td>
          <td width="4%"><div align="center"><strong>Data</strong></div></td>
          <td width="6%"><div align="center"><strong>Total Analise</strong></div></td>
          <td width="6%"><div align="center"><strong>Total Valor</strong></div></td>
  </tr>
<?

$mes_ano = $_POST['mes_ano'];
			

$sql = "SELECT * FROM analiseplanilha where mes_ano = '$mes_ano' group by nome,data order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
	$nome_operador = $linha[1];
$data = $linha[2];
$analise = $linha[3];
$valor = $linha[4];

$mes_ano = $linha[10];
$dia_semana = $linha[11];



?>

        <tr>
          <td valign="middle"><div align="center" class="style3">
            <form action="listar_cartao_de_ponto_por_funcionario_blank.php" method="post" name="form2" target="_blank">
              <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
              <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
<input class="class01" type="submit" name="button" id="button" value="<? echo $nome; ?>">
            </form>
            </div></td>
          <td><div align="center" class="style3"><strong><? echo $dia_semana; ?></strong></div></td>
          <td><div align="center" class="style3"> <strong><span class="style3"><? echo $data; ?></span></strong></div></td>
          <td><div align="center" class="style3"><strong>
            <?

$sql = "select sum(analise) as total_analise from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalanalise = $linha['total_analise'];



echo $totalanalise;

?>
          </strong></div></td>
          <td><div align="center" class="style3"><strong>
            <?

$sql = "select sum(valor) as total_valor from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalvalor = $linha['total_valor'];



echo "R$ $totalvalor";

?>
          </strong></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
</table>

<p>&nbsp;          </p>

<p>&nbsp;</p>

</body>

</html>

