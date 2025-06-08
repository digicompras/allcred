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
$dateatual = date('Y-m-d');
$dataatual = date('d-m-Y');
$mes_anoatual = date('m-d');


require '../../conect/conect.php';
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db = $linha[1];

}
	

	$nome = $_POST['nome'];

$sql = "SELECT * FROM operadores where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];
	
$estab_pertence = $linha[44];

}


$solicitacao = $_POST['solicitacao'];


$codigo = $_POST['codigo'];

$data = $_POST['data'];
$date = $_POST['date'];
$dia = date('d');
$mes = date('m');
$ano = date('Y');

$mes_ano = $_POST['mes_ano'];
//$estab_pertence = $_POST['estab_pertence'];
	
	
$num_dia = date('w');
$sql = "SELECT * FROM dias_semana where num_dia = '$num_dia' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$dia_semana = $linha[2];

}

	
	
if($solicitacao=="inserir"){
	
$analise = $_POST['analise'];
$valor = $_POST['valor'];
	
$comando = "insert into analiseplanilha(analise,valor,data,dia_semana,date,dia,mes,ano,estab_pertence) values('$analise','$valor','$data','$dia_semana','$date','$dia','$mes','$ano','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao grava as infomações!<br><br> Tente novamente!");


echo "informações gravadas com sucesso!<br><br>";


}
	


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
      <table width="100%" border="0">
        <tr>
          <td width="11%"><form name="form1" method="post" action="index.php">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input type="submit" name="Submit2" value="Voltar">
          </form></td>
          <td width="8%">&nbsp;</td>
          <td width="45%"><form name="form1" method="post" action="editar_cartao_ponto.php">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_anoatual; ?>">
            <input name="date" type="hidden" id="date" value="<? echo $dateatual; ?>">
            <input name="data" type="hidden" id="data" value="<? echo $dataatual; ?>">
            Nome do operador
            <select name="nome" id="nome">
          <option selected><? echo $nome; ?></option>
              <?

    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
            </select>
            <input type="button" name="button" id="button" value="OK">
          </form></td>
          <td width="36%">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100%"  border="0">

        <tr>

          <td><div align="center"><span class="style2">

            <?




$sql = "SELECT * FROM ponto where nome = '$nome' and mes_ano = '$mes_ano' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {











?>

          Ffuncion&aacute;rio:</span> <span class="style2"><? printf("$linha[1]"); ?><? } ?></span></div></td>

        </tr>

</table>

      <p>

        
      </p>



<table width="90%"  border="0" align="center" bordercolor="#000000">

        <tr>

          <td colspan="10"><form name="form3" method="post" action="editar_cartao_ponto.php">
            <p><strong>NOME: <? echo $nome_operador; ?>
              <input name="nome" type="hidden" id="nome" value="<? echo "$nome_operador"; ?>">
            </strong><strong>FUN&Ccedil;&Atilde;O: <? echo $funcao; ?></strong>
              <input name="funcao" type="hidden" id="funcao" value="<? echo "$funcao"; ?>">
              <strong>M&Ecirc;S: <? echo $mes_ano; ?></strong>
              <input name="mes_ano" type="hidden" id="mes_ano" value="<?echo "$mes_ano"; ?>">
              <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
              <input name="data" type="hidden" id="data" value="<? echo $data; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="inserir">
            </p>
            <p>An&aacute;lise
              <input name="analise" type="text" id="analise" size="10">
            Valor
            <input name="valor" type="text" id="valor" size="10">
            <input type="button" name="button2" id="button2" value="Salvas">
            </p>
          </form>
<?

if($solicitacao=="gravaeditar")

$codigo = $_POST['codigo'];
$analise = $_POST['analise'];
$valor = $_POST['valor'];


$comando = "update `$db`.`analiseplanilha` set `analise` = '$analise',`valor` = '$valor' where `analiseplanilha`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao gravar suas alterações, tente novamente!");			  
			  
?>			  
			</td>
        </tr>


        <tr>

          <td colspan="10"></td>
        <tr>
          <td width="16%"><div align="center"></div></td>
          <td width="13%"><div align="center"></div></td>
          <td colspan="4"><div align="center"></div></td>
          <td width="14%"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <tr>
          <td><div align="center"><strong>Dia Semana</strong></div></td>
          <td><div align="center"><strong>Data</strong></div></td>
          <td width="8%"><div align="center"><strong>An&aacute;lise</strong></div></td>
          <td width="9%"><div align="center"><strong>Valor</strong></div></td>
          <td width="10%"><div align="center"></div></td>
          <td width="9%"><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
  </tr>
<?

			

$sql = "SELECT * FROM analiseplanilha where nome = '$nome' and mes_ano = '$mes_ano' order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$ent_m = $linha[3];
$sai_m = $linha[4];
$ent_t = $linha[5];
$sai_t = $linha[6];
$ent_e = $linha[7];
$sai_e = $linha[8];
$obs = $linha[9];
$mes_ano = $linha[10];
$dia_semana = $linha[11];
$quant_horas_faltas_d = $linha[33];
$quant_horas = $linha[26];


?>
        <tr>
          <td><div align="center"><? echo $dia_semana; ?></div></td>
          <td><div align="center"> <? echo $data; ?> </div></td>
          <td><div align="center"><? echo $ent_m; ?></div></td>
          <td><div align="center"><? echo $sai_m; ?></div></td>
          <td><div align="center"><? echo $ent_t; ?></div></td>
          <td><div align="center"><? echo $sai_t; ?></div></td>
          <td><div align="center"><? echo $obs; ?></div></td>
          <td width="6%"><div align="center"><? echo $quant_horas; ?></div></td>
          <td width="6%"><div align="center"><? echo $quant_horas_faltas_d; ?></div></td>
          <td width="9%"><form name="form2" method="post" action="editar_codigo.php">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

            <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
            <input name="date" type="hidden" id="date" value="<? echo $date; ?>">

            <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>

            <input type="submit" name="Submit3" value="Editar data">

          </form></td>

        

          <? } ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><p>Total</p></td>
          <td>Total</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><span class="style7">
            <?

$sql = "select sum(analise) as total_analise from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalanalise = $linha['total_analise'];



echo $totalanalise;

?>
          </span></td>
          <td><span class="style7">
            <?

$sql = "select sum(valor) as total_valor from analiseplanilha where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$totalvalor = $linha['total_valor'];



echo $totalvalor;

?>
          </span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <tr>

          <td colspan="10">&nbsp;<br></td>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

