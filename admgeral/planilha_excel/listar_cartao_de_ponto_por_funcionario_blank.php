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

.style2 {

	color: #0000FF;

	font-weight: bold;

}
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

      <table width="100%"  border="0">

        <tr>

          <td>

            <?

$nome = $_POST['nome'];

$mes_ano = $_POST['mes_ano'];
			  
$sql = "SELECT * FROM operadores where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];
	
$estab_pertence = $linha[44];

}

?>

</td>

        </tr>

</table>

      <p>

        <?


$sql = "SELECT * FROM analiseplanilha where nome = '$nome' and mes_ano = '$mes_ano' order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$analise = $linha[3];
$valor = $linha[4];

$mes_ano = $linha[10];
$dia_semana = $linha[11];

}

?>

      </p>

<table width="100%"  border="1" align="center" bordercolor="#000000">

        <tr>

          <td colspan="4" align="center"><p><strong>MES E ANO: <? echo $mes_ano; ?></strong></p>              </td>
  </tr>

        <tr>
          <td colspan="2"><strong>NOME: <? echo $nome_operador; ?></strong></td>
          <td colspan="2"><div align="center"><strong>FUN&Ccedil;&Atilde;O: <? echo $funcao; ?></strong></div></td>
        <tr>
          <td width="7%"><div align="center"><strong>Dia Semana</strong></div></td>
          <td width="4%"><div align="center"><strong>Data</strong></div></td>
          <td width="6%"><div align="center"><strong>Analise</strong></div></td>
          <td width="6%"><div align="center"><strong>Valor</strong></div></td>
  </tr>
<?

			

$sql = "SELECT * FROM analiseplanilha where nome = '$nome' and mes_ano = '$mes_ano' order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome_operador = $linha[1];
$data = $linha[2];
$analise = $linha[3];
$valor = $linha[4];

$mes_ano = $linha[10];
$dia_semana = $linha[11];


?>

        <tr>
          <td><div align="center" class="style6"><strong><? echo $dia_semana; ?></strong></div></td>
          <td><div align="center" class="style6"> <strong><? echo $data; ?></strong></div></td>
          <td><div align="center" class="style6"><strong><? echo $analise; ?></strong></div></td>
          <td><div align="center" class="style6"><strong><? echo "R$ $valor"; ?></strong></div></td>
  </tr>


          <? } ?>
        <tr>
          <td colspan="2" rowspan="2" valign="bottom">Ass:</td>
          <td align="center" valign="bottom"><span class="style6"><strong>Total Analise</strong></span></td>
          <td align="center" valign="bottom"><span class="style6"><strong>Total Valor</strong></span></td>
        <tr>
          <td align="center" valign="bottom"><span class="style6"><strong>
            <?

$sql = "select sum(analise) as total_analise from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano' group by mes_ano";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalanalise = $linha['total_analise'];



echo $totalanalise;

?>
          </strong></span></td>
          <td align="center" valign="bottom"><span class="style6"><strong>
            <?

$sql = "select sum(valor) as total_valor from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano' group by mes_ano";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalvalor = $linha['total_valor'];



echo "R$ $totalvalor";

?>
          </strong></span></td>
</table>

<p>&nbsp;          </p>

<p>&nbsp;</p>

</body>

</html>

