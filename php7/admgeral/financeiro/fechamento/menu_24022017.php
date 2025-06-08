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

<!--

.style1 {	font-size: 18px;

	font-weight: bold;

	color: #0000FF;

}

.style2 {

	color: #0000FF;

	font-weight: bold;

}
.style3 {font-size: 10px}

-->

</style>
</head>



<?

require '../../../conect/conect.php';

error_reporting(E_ALL);

$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');

$dia_ref_inicial = $_POST['dia_ref_inicial'];

$mes_ref_inicial = $_POST['mes_ref_inicial'];

$ano_ref_inicial = $_POST['ano_ref_inicial'];



$dia_ref_final = $_POST['dia_ref_final'];

$mes_ref_final = $_POST['mes_ref_final'];

$ano_ref_final = $_POST['ano_ref_final'];


$data_inicial = "$ano_ref_inicial-$mes_ref_inicial-$dia_ref_inicial";

$data_final = "$ano_ref_final-$mes_ref_final-$dia_ref_final";

?>

<?

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>" 

<? } ?>

leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2"></td>
    </tr>

    <tr>

      <td width="19%">&nbsp;</td>

      <td><p><strong><font color="#0000FF" size="4">Fechamento</font></strong></p>      </td>
    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <input type="submit" name="Submit" value="Voltar ao menu principal">

        <span class="style1">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>      </form></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form action="fechamento_bancos.php" method="post" name="form2">
      <span class="style1">

        <input type="hidden" name="solicitacao" id="solicitacao">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit2" value="Lan&ccedil;amentos">
        </span>      
      </form></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><span class="style2">RELAT&Oacute;RIO POR PERIODO REFERENCIAL </span></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><form action="menu.php" method="post" name="form5">

        <div align="left"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          De

            <strong><font color="#0000FF">

            <select name="dia_ref_inicial" id="dia_ref_inicial">
<option selected><? if(empty($dia_ref_inicial)){ echo $diaatual; } else { echo $dia_ref_inicial; } ?></option>
              <?





    $sql = "select * from fechamento_bancos group by dia order by dia desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

?>
                        </select>

            </font></strong>            <strong><font color="#0000FF"> </font></strong>

          <strong><font color="#0000FF">

            <select name="mes_ref_inicial" id="mes_ref_inicial">
            <option selected><? if(empty($mes_ref_inicial)){ echo $mesatual; } else { echo $mes_ref_inicial; } ?></option>

              <?

    $sql = "select * from fechamento_bancos group by mes order by mes asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }

?>
                        </select>

          </font></strong>            <strong><font color="#0000FF">

            <select name="ano_ref_inicial" id="ano_ref_inicial">
<option selected><? if(empty($ano_ref_inicial)){ echo $anoatual; } else { echo $ano_ref_inicial; } ?></option>
              <?

    $sql = "select * from fechamento_bancos group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }

?>
                      </select>

            </font></strong> at&eacute;<strong><font color="#0000FF"> <strong><font color="#0000FF">

            <select name="dia_ref_final" id="dia_ref_final">
<option selected><? if(empty($dia_ref_final)){ echo $diaatual; } else { echo $dia_ref_final; } ?></option>
              <?

    $sql = "select * from fechamento_bancos group by dia order by dia desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

?>
                        </select>

            </font></strong> <strong><font color="#0000FF"> </font></strong> <strong><font color="#0000FF">

            <select name="mes_ref_final" id="mes_ref_final">
<option selected><? if(empty($mes_ref_final)){ echo $mesatual; } else { echo $mes_ref_final; } ?></option>
              <?

    $sql = "select * from fechamento_bancos group by mes order by mes desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }

?>
                        </select>

            </font></strong> <strong><font color="#0000FF">

            <select name="ano_ref_final" id="ano_ref_final">
<option selected><? if(empty($ano_ref_final)){ echo $anoatual; } else { echo $ano_ref_final; } ?></option>
              <?

    $sql = "select * from fechamento_bancos group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }

?>
                        </select>

            </font></strong>

            </font></strong>

            <input type="submit" name="Submit523" value="Relat&oacute;rio por periodo">
          </div>

      </form></td>
    </tr>

    <tr>

      <td colspan="2"><table width="100%" border="0">
        <tr>
          <td colspan="3"><div align="right">Total no periodo informado:</div></td>
          <td colspan="3"><span class="style3">
		  <?
$sql = "select sum(inss) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?></span></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5%">Data</td>
          <td width="7%">Novo Gov</td>
          <td width="8%">Refin Gov.</td>
          <td width="9%">Port. Gov.</td>
          <td width="9%">Novo INSS</td>
          <td width="9%">Refin INSS</td>
          <td width="10%">Port INSS</td>
          <td width="10%">Cart&atilde;o</td>
          <td width="10%">Cart&atilde;o Saque</td>
          <td width="8%">Seguro</td>
          <td width="8%">Aumento</td>
          <td width="7%">CP</td>
          <td width="10%">Veiculos</td>
        </tr>
        <?
$sql = "SELECT * FROM fechamento_bancos where data between '$data_inicial'and '$data_final' order by data asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$sequencianumeromateria = mysql_num_rows($res);

$codigo = $linha[0];

$data = $linha[6];
$dia = $linha[7];
$mes = $linha[8];
$ano = $linha[9];
$novogov = $linha[10];
$refingov = $linha[11];
$portgov = $linha[12];
$novoinss = $linha[13];
$refininss = $linha[14];
$portinss = $linha[15];
$cartao = $linha[16];
$cartaosaque = $linha[17];
$seguro = $linha[18];
$aumento = $linha[19];
$cp = $linha[20];
$veiculos = $linha[21];



?>
        <tr>
          <td valign="middle"><span class="style3"><? echo "$dia-$mes-$ano"; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $novogov; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $refingov; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $portgov; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $novoinss; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $refininss; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $portinss; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $cartao; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $cartaosaque; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $seguro; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $aumento; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $cp; ?></span></td>
          <td valign="middle"><span class="style3"><? echo $veiculos; ?></span></td>
        </tr>
        <? } ?>
        <tr>
          <td valign="middle">&nbsp;</td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(novogov) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(refingov) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(portgov) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(novoinss) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(refininss) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(portinss) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(cartao) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(cartaosaque) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(seguro) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(aumento) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(cp) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
          <td valign="middle"><span class="style3">
            <?
$sql = "select sum(veiculos) as total_periodo from fechamento_bancos where data between '$data_inicial' and '$data_final'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_do_periodo = $linha['total_periodo'];

		  
		   echo "R$ $total_do_periodo"; ?>
          </span></td>
        </tr>
        
      </table></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>
  </table>

<p>&nbsp; </p>

</body>

</html>

