<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />




<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #de1d13;
	font-weight: bold;
}

-->
</style>

</head>


<?

require '../../conect/conect.php';

?>

<?

$solicitacao = $_POST['solicitacao'];

$salariovigente1 = $_POST['salariovigente1'];
$salarioprevisto1 = $_POST['salarioprevisto1'];
$coeficiente1 = $_POST['coeficiente1'];
$bco_operacao1 = $_POST['bco_operacao1'];
$indice1 = $_POST['indice1'];
$indicemaior1 = $_POST['indicemaior1'];

$indicedecimal1 = bcdiv($indice1,100,5);
$indicemaiordecimal1 = bcdiv($indicemaior1,100,5);


if($solicitacao == "salvar_aumento_salario"){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}


$comando = "update `$db`.`simuladores` set `salariovigente1` = '$salariovigente1',`salarioprevisto1` = '$salarioprevisto1',`coeficiente1` = '$coeficiente1',`bco_operacao1` = '$bco_operacao1',`indice1` = '$indice1',`indicedecimal1` = '$indicedecimal1',`indicemaior1` = '$indicemaior1',`indicemaiordecimal1` = '$indicemaiordecimal1' where `simuladores`. `codigo` = '0' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações dos simuladores");



}

?>


<?

$sql = "SELECT * FROM simuladores";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;


$codigo = $linha[0];

$salariovigente1 = $linha[1];
$salarioprevisto1 = $linha[2];
$coeficiente1 = $linha[3];
$bco_operacao1 = $linha[4];
$indicemaior1 = $linha[5];
$indicemaiordecimal1 = $linha[6];
$indice1 = $linha[7];
$indicedecimal1 = $linha[8];




}

?>


<?


$indicermc = $_POST['indicermc'];


$indicesaque = $_POST['indicesaque'];
$indicesaquedecimal = bcdiv($indicesaque,100,5);


$indicemargem_rmc = $_POST['indicemargem_rmc'];
$indicedecimalmargem_rmc = bcdiv($indicemargem_rmc,100,5);


if($solicitacao == "salvar_indice_rmc"){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}


$comando = "update `$db`.`indices_rmc` set `indicermc` = '$indicermc',`indicesaque` = '$indicesaque',`indicesaquedecimal` = '$indicesaquedecimal',`indicemargem_rmc` = '$indicemargem_rmc',`indicedecimalmargem_rmc` = '$indicedecimalmargem_rmc' where `indices_rmc`. `codigo` = '0' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações dos indices RMC");



}

?>


<?

$sql = "SELECT * FROM indices_rmc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;


$codigo = $linha[0];

$indicermc = $linha[1];
$indicesaque = $linha[2];
$indicesaquedecimal = $linha[3];

$indicemargem_rmc = $linha[4];
$indicedecimalmargem_rmc = $linha[5];

}

?>

<body>
<div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Aumento de Salario</li>
      <li class="TabbedPanelsTab" tabindex="0">Cartão RMC</li>
      <li class="TabbedPanelsTab" tabindex="0">Portabilidade</li>
      <li class="TabbedPanelsTab" tabindex="0">Ver Margem</li>
      <li class="TabbedPanelsTab" tabindex="0">Tabela IRRF</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
<form id="form1" name="form1" method="post" action="index.php">

        <table width="100%" border="0">
          <tr>
            <td><input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "salvar_aumento_salario"; ?>"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="12%"><div align="center">Salario Vigente</div></td>
            <td width="18%"><div align="center">Salario Previsto (proximo exercicio)</div></td>
            <td width="17%"><div align="center">Coeficiente</div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="16%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="salariovigente1" type="text" id="salariovigente1" value="<? echo $salariovigente1; ?>" size="10" />
            </div></td>
            <td><div align="center">
              <input name="salarioprevisto1" type="text" id="salarioprevisto1" value="<? echo $salarioprevisto1; ?>" size="10" />
            </div></td>
            <td><div align="center">
              <input name="coeficiente1" type="text" id="coeficiente1" value="<? echo $coeficiente1; ?>" size="10" />
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td height="22"><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">Banco de Operacao</div></td>
            <td><div align="center">% de aumento</div></td>
            <td><div align="center">% de aumento (&gt; que minimo)</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"><strong><font color="#0000FF">
              <select name="bco_operacao1" id="select7">
                <option selected="selected"><? echo $bco_operacao1; ?></option>
                <?





    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
              </select>
            </font></strong></div></td>
            <td><div align="center">
              <input name="indice1" type="text" id="indice1" value="<? echo $indice1; ?>" size="10" />
            </div></td>
            <td><div align="center">
              <input name="indicemaior1" type="text" id="indicemaior1" value="<? echo $indicemaior1; ?>" size="10" />
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input type="submit" name="button" id="button" value="Salvar">
            </div></td>
            <td colspan="3"><div align="center">
              <? if($solicitacao == "salvar_aumento_salario"){ echo "Alterações Aumento de salario efetuadas com sucesso!"; }  ?>
            </div>              <div align="center"></div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
</form>

      </div>
      <div class="TabbedPanelsContent">
        <form name="form4" method="post" action="index.php">
          <table width="100%" border="0">
            <tr>
              <td width="12%"><div align="left">
                <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "salvar_indice_rmc"; ?>">
              </div></td>
              <td width="18%"><div align="center"></div></td>
              <td width="14%"><div align="center"></div></td>
              <td width="13%"><div align="center"></div></td>
              <td width="10%"><div align="center"></div></td>
              <td width="16%"><div align="center"></div></td>
              <td width="17%"><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center">Indice RMC</div></td>
              <td><div align="center">Indice p/ Saque %</div></td>
              <td><div align="center">Indice Margem RMC%</div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center">
                <input name="indicermc" type="text" id="indicermc" value="<? echo $indicermc; ?>" size="10">
              </div></td>
              <td><div align="center">
                <input name="indicesaque" type="text" id="indicesaque" value="<? echo $indicesaque; ?>" size="10">
              </div></td>
              <td><div align="center">
                <input name="indicemargem_rmc" type="text" id="indicemargem_rmc" value="<? echo $indicemargem_rmc; ?>" size="10">
              </div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><div align="center">
                <input type="submit" name="button5" id="button5" value="Salvar">
              </div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
              <td><div align="center"></div></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="TabbedPanelsContent">
        <table width="100%" border="0">
          <tr>
            <td width="12%"><div align="center"></div></td>
            <td width="18%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="16%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">Portabilidade</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="100%" border="0">
          <tr>
            <td width="12%"><div align="center"></div></td>
            <td width="18%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="16%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">Ver Margem</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
<form id="form1" name="form1" method="post" action="index.php">

<?

$solicitacao = $_POST['solicitacao'];

$ano1 = $_POST['ano1'];
$de1 = $_POST['de1'];
$ate1 = $_POST['ate1'];
$aliquota1 = $_POST['aliquota1'];
$deducao1 = $_POST['deducao1'];

$ano2 = $_POST['ano1'];
$de2 = $_POST['de2'];
$ate2 = $_POST['ate2'];
$aliquota2 = $_POST['aliquota2'];
$deducao2 = $_POST['deducao2'];

$ano3 = $_POST['ano1'];
$de3 = $_POST['de3'];
$ate3 = $_POST['ate3'];
$aliquota3 = $_POST['aliquota3'];
$deducao3 = $_POST['deducao3'];

$ano4 = $_POST['ano1'];
$de4 = $_POST['de4'];
$ate4 = $_POST['ate4'];
$aliquota4 = $_POST['aliquota4'];
$deducao4 = $_POST['deducao4'];

$ano5 = $_POST['ano1'];
$de5 = $_POST['de5'];
$ate5 = $_POST['ate5'];
$aliquota5 = $_POST['aliquota5'];
$deducao5 = $_POST['deducao5'];



if($solicitacao == "salvar_tabela_irrf"){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}


$comando = "update `$db`.`tabela_irrf` set `ano` = '$ano1',`de` = '$de1',`ate` = '$ate1',`aliquota` = '$aliquota1',`deducao` = '$deducao1' where `tabela_irrf`. `codigo` = '1' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações da faixa 1");


$comando = "update `$db`.`tabela_irrf` set `ano` = '$ano1',`de` = '$de2',`ate` = '$ate2',`aliquota` = '$aliquota2',`deducao` = '$deducao2' where `tabela_irrf`. `codigo` = '2' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações da faixa 2");


$comando = "update `$db`.`tabela_irrf` set `ano` = '$ano1',`de` = '$de3',`ate` = '$ate3',`aliquota` = '$aliquota3',`deducao` = '$deducao3' where `tabela_irrf`. `codigo` = '3' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações da faixa 3");


$comando = "update `$db`.`tabela_irrf` set `ano` = '$ano1',`de` = '$de4',`ate` = '$ate4',`aliquota` = '$aliquota4',`deducao` = '$deducao4' where `tabela_irrf`. `codigo` = '4' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações da faixa 4");


$comando = "update `$db`.`tabela_irrf` set `ano` = '$ano1',`de` = '$de5',`ate` = '$ate5',`aliquota` = '$aliquota5',`deducao` = '$deducao5' where `tabela_irrf`. `codigo` = '5' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações da faixa 5");





}

?>

<?

$sql = "SELECT * FROM tabela_irrf where codigo = '1'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo1 = $linha[0];

$ano1 = $linha[2];
$de1 = $linha[3];
$ate1 = $linha[4];
$aliquota1 = $linha[5];
$deducao1 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo2 = $linha[0];

$ano2 = $linha[2];
$de2 = $linha[3];
$ate2 = $linha[4];
$aliquota2 = $linha[5];
$deducao2 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '3'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo3 = $linha[0];

$ano3 = $linha[2];
$de3 = $linha[3];
$ate3 = $linha[4];
$aliquota3 = $linha[5];
$deducao3 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '4'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo4 = $linha[0];

$ano4 = $linha[2];
$de4 = $linha[3];
$ate4 = $linha[4];
$aliquota4 = $linha[5];
$deducao4 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '5'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo5 = $linha[0];

$ano5 = $linha[2];
$de5 = $linha[3];
$ate5 = $linha[4];
$aliquota5 = $linha[5];
$deducao5 = $linha[6];

}

?>

        <table width="100%" border="0">
          <tr>
            <td width="12%"><div align="center">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "salvar_tabela_irrf"; ?>">
            </div></td>
            <td width="18%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="16%"><div align="center"></div></td>
            <td width="17%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">Ano</div></td>
            <td><div align="center">De</div></td>
            <td><div align="center">Até</div></td>
            <td><div align="center">Aliquota</div></td>
            <td><div align="center">Dedução</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="ano1" type="text" id="ano1" value="<? echo $ano1; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="de1" type="text" id="de1" value="<? echo $de1; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="ate1" type="text" id="ate1" value="<? echo $ate1; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="aliquota1" type="text" id="aliquota1" value="<? echo $aliquota1; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="deducao1" type="text" id="deducao1" value="<? echo $deducao1; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="ano2" type="text" disabled id="ano2" value="<? echo $ano2; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="de2" type="text" id="de2" value="<? echo $de2; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="ate2" type="text" id="ate2" value="<? echo $ate2; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="aliquota2" type="text" id="aliquota2" value="<? echo $aliquota2; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="deducao2" type="text" id="deducao2" value="<? echo $deducao2; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="ano3" type="text" disabled id="ano3" value="<? echo $ano3; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="de3" type="text" id="de3" value="<? echo $de3; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="ate3" type="text" id="ate3" value="<? echo $ate3; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="aliquota3" type="text" id="aliquota3" value="<? echo $aliquota3; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="deducao3" type="text" id="deducao3" value="<? echo $deducao3; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="ano4" type="text" disabled id="ano4" value="<? echo $ano4; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="de4" type="text" id="de4" value="<? echo $de4; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="ate4" type="text" id="ate4" value="<? echo $ate4; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="aliquota4" type="text" id="aliquota4" value="<? echo $aliquota4; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="deducao4" type="text" id="deducao4" value="<? echo $deducao4; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="ano5" type="text" disabled id="ano5" value="<? echo $ano5; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="de5" type="text" id="de5" value="<? echo $de5; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="ate5" type="text" id="ate5" value="<? echo $ate5; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="aliquota5" type="text" id="aliquota5" value="<? echo $aliquota5; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="deducao5" type="text" id="deducao5" value="<? echo $deducao5; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input type="submit" name="button2" id="button2" value="Salvar">
            </div></td>
            <td colspan="3"><div align="center"><? if($solicitacao == "salvar_tabela_irrf"){ echo "Alteracoe da tabela IRRF efetuadas com sucesso!"; }  ?></div>              <div align="center"></div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
</form>
      </div>

    </div>
  </div>
<div id="TabbedPanels2" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Calculos Aumento de Salario</li>
    <li class="TabbedPanelsTab" tabindex="0">Calculos Cartao RMC</li>
    <li class="TabbedPanelsTab" tabindex="0">Calculos Portabilidade</li>
    <li class="TabbedPanelsTab" tabindex="0">Calculos Ver Margem</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <form name="form3" method="post" action="index.php">
        <table width="100%" border="0">
          <tr>
            <td width="4%"><div align="center">CPF:</div></td>
            <td width="13%"><div align="center">
              <input type="text" name="cpf" id="cpf">
            </div></td>
            <td width="8%"><div align="center">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "pesquisar"; ?>">
              <input type="submit" name="button3" id="button3" value="Pesquisar">
            </div></td>
            <td width="54%"><div align="center"></div></td>
            <td width="7%"><div align="center"></div></td>
            <td width="7%"><div align="center"></div></td>
            <td width="7%"><div align="center"></div></td>
          </tr>
        </table>
      </form>
<form name="form2" method="post" action="index.php">

<?

$cpf = $_POST['cpf'];



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

if(empty($cpf)){
	
}
else{



$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$nome_cliente = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[107];

$saldo1 = $linha[108];
$saldo2 = $linha[109];
$saldo3 = $linha[110];
$saldo4 = $linha[111];
$saldo5 = $linha[112];
$saldo6 = $linha[113];
$saldo7 = $linha[114];
$naturalidade = $linha[115];
$pagto_beneficio = $linha[116];



$resposta = $linha[119];



$secretaria = $linha[124];
$senha_servidor = $linha[125];
$fazer_portabilidade = $linha[126];
$obs_das_margens = $linha[127];


$valor_parcela = $linha[128];
$saldo_devedor = $linha[129];
$parcelas_em_aberto = $linha[130];
$prazo_contrato = $linha[131];
$aprovacao = $linha[132];

$valorrenda = $linha[136];

}

}

?>

        <table width="100%" border="0">
          <tr>
            <td width="12%"><div align="left">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "calcular"; ?>">
            </div></td>
            <td width="12%"><div align="center"></div></td>
            <td width="13%"><div align="center"></div></td>
            <td width="12%"><div align="center"></div></td>
            <td width="9%"><div align="center"></div></td>
            <td width="19%"><div align="center"></div></td>
            <td width="18%"><div align="center"></div></td>
            <td width="5%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="right">Nome</div></td>
            <td colspan="3"><div align="left"><? echo $nome_cliente; ?>            </div>              <div align="left"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="right">CPF</div></td>
            <td colspan="3"><div align="left"><? echo $cpf; ?>
              <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">Data Nasc</div></td>
            <td><div align="center">Renda</div></td>
            <td><div align="center">Complemento do Salario</div></td>
            <td><div align="center">Consignação</div></td>
            <td><div align="center"></div></td>
            <td colspan="2" rowspan="8" valign="top"><div align="center">

<?

$sql = "SELECT * FROM simuladores";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];

$salariovigente1 = $linha[1];
$salarioprevisto1 = $linha[2];
$coeficiente1 = $linha[3];
$bco_operacao1 = $linha[4];
$indicemaior1 = $linha[5];
$indicemaiordecimal1 = $linha[6];
$indice1 = $linha[7];
$indicedecimal1 = $linha[8];




}

$sql = "SELECT * FROM indices_rmc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];

$indicermc = $linha[1];
$indicesaque = $linha[2];
$indicesaquedecimal = $linha[3];
$indicemargem_rmc = $linha[4];
$indicedecimalmargem_rmc = $linha[5];

}





?>

<?
$valor_da_renda = $_POST['valor_da_renda'];

$complementosalario = $_POST['complementosalario'];

$consignacao = $_POST['consignacao'];
$quantemprestimos = $_POST['quantemprestimos'];
$emprestimos = $_POST['emprestimos'];
$pensao = $_POST['pensao'];
$contribuicoes = $_POST['contribuicoes'];




$sql = "SELECT * FROM tabela_irrf where codigo = '1'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo1 = $linha[0];

$ano1 = $linha[2];
$de1 = $linha[3];
$ate1 = $linha[4];
$aliquota1 = $linha[5];
$aliquota1decimal = bcdiv($aliquota1,100,5);
$deducao1 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo2 = $linha[0];

$ano2 = $linha[2];
$de2 = $linha[3];
$ate2 = $linha[4];
$aliquota2 = $linha[5];
$aliquota2decimal = bcdiv($aliquota2,100,5);

$deducao2 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '3'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo3 = $linha[0];

$ano3 = $linha[2];
$de3 = $linha[3];
$ate3 = $linha[4];
$aliquota3 = $linha[5];
$aliquota3decimal = bcdiv($aliquota3,100,5);

$deducao3 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '4'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo4 = $linha[0];

$ano4 = $linha[2];
$de4 = $linha[3];
$ate4 = $linha[4];
$aliquota4 = $linha[5];
$aliquota4decimal = bcdiv($aliquota4,100,5);

$deducao4 = $linha[6];

}


$sql = "SELECT * FROM tabela_irrf where codigo = '5'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo5 = $linha[0];

$ano5 = $linha[2];
$de5 = $linha[3];
$ate5 = $linha[4];
$aliquota5 = $linha[5];
$aliquota5decimal = bcdiv($aliquota5,100,5);

$deducao5 = $linha[6];

}





if($valor_da_renda <=  $salariovigente1){
	          
$renda_informada = $salarioprevisto1;

if(empty($valor_da_renda)){}else{
$indice_complemento_salario = bcdiv($complementosalario,$valorrenda,10);
}

$novocomplemento_salario = bcmul($renda_informada,$indice_complemento_salario,10);



$nova_renda_prevista = bcadd($renda_informada,$novocomplemento_salario,2);


}
else{
	
$renda_informada = $valor_da_renda;


$indice_complemento_salario = bcdiv($complementosalario,$valorrenda,10);

$novocomplemento_salario = bcmul($renda_informada,$indice_complemento_salario,10);




$sub_calculo_da_previsao_de_nova_renda = bcmul($renda_informada,$indicemaiordecimal1,10);

$totalizando_calculo_da_previsao_de_nova_renda = bcadd($renda_informada,$sub_calculo_da_previsao_de_nova_renda,10);

$nova_renda_prevista = bcadd($totalizando_calculo_da_previsao_de_nova_renda,$novocomplemento_salario,2);

	
}



if(empty($pensao)){
	
$indice_pensao = "0";

}
else{
	
$indice_pensao = bcdiv($pensao,$valorrenda,6);

}



$novapensao = bcmul($nova_renda_prevista,$indice_pensao,2);


if(($nova_renda_prevista >= $de1) && ($nova_renda_prevista <= $ate1)){
	
$aliquota = $aliquota1decimal;
$deducao = $deducao1;	
	
}

if(($nova_renda_prevista >= $de2) && ($nova_renda_prevista <= $ate2)){
	
$aliquota = $aliquota2decimal;
$deducao = $deducao2;	
	
}

if(($nova_renda_prevista >= $de3) && ($nova_renda_prevista <= $ate3)){
	
$aliquota = $aliquota3decimal;
$deducao = $deducao3;	
	
}

if(($nova_renda_prevista >= $de4) && ($nova_renda_prevista <= $ate4)){
	
$aliquota = $aliquota4decimal;
$deducao = $deducao4;	
	
}

if(($nova_renda_prevista >= $de5) && ($nova_renda_prevista <= $ate5)){
	
$aliquota = $aliquota5decimal;
$deducao = $deducao5;	
	
}

$base_de_calculo_irrf = bcsub($nova_renda_prevista,$novapensao,2);	
		  

if($base_de_calculo_irrf <= $ate1){

$irrf_devido = "0.00";

}
else{
	
$sub_calculo_irrf_devido = bcmul($base_de_calculo_irrf,$aliquota,2);	

$irrf_devido = bcsub($sub_calculo_irrf_devido,$deducao,2);	

}
				  
$despesas1 = bcadd($irrf_devido,$consignacao,2);

$despesas2 = bcadd($novapensao,$contribuicoes,2);

//$despesas3 = bcadd($novocomplemento_salario,0,2);


$total_despesas = bcadd($despesas1,$despesas2,2);

//$total_despesas = bcadd($sub_total_despesas,$despesas3,2);


$sub_saldo_salario = bcsub($nova_renda_prevista,$total_despesas,2);

$indice_percentual = bcmul($sub_saldo_salario,0.3,2);

$nova_margem = bcsub($indice_percentual,$emprestimos,2);

?>

<?

if($nova_margem <= 0){
	
$advertencia = "ATENÇÃO!!!... CLIENTE SEM MARGEM!";


}

?>
              <table width="100%" border="0" cellspacing="0">
<?
if(($cpf <> "") && ($solicitacao <> "calcular")){
	
$bgcolor = "EEE";

}
else{
	
if(empty($cpf) && ($solicitacao <> "calcular")){
	
$bgcolor = "EEE";

}
else{
	

if(($cpf <> "") && ($solicitacao == "calcular")){
	
if($nova_margem <= 0){

	
$bgcolor = "f6ed61";

}
else{
	
$bgcolor = "CCCCCC";
	
}
	
}

}


}

?>
                <tr>
                  <td width="50%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong><?

if(empty($cpf)){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
		
echo "Nova Renda";

}

}
	
}
}

?>

</strong></div></td>
                  <td width="8%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td width="42%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Nova Margem";

}
	
}

}
}

?>
</strong></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
echo "R$ $nova_renda_prevista";

}
	
}

}

}

?>

</div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
                    <?
       
if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "R$ $nova_margem";

}
	
}

}

}

				  
?>
                  </div></td>
                </tr>
                <tr>
                  <td colspan="3" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><? if(($valor_da_renda <> "") && ($nova_margem <= 0)){ echo "<span class='style1'>$advertencia</span>"; } ?></div>                    <div align="center"></div>                    <div align="center"></div></td>
                  </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){


}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Valor Liberado";

}
	
}

}
}

?>

</strong></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                  
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){

}
else{
	
if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{	

echo "O que Fazer?";

}
	
}

}
}

?>

</strong></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                    <?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){


}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
$valor_liberado = bcdiv($nova_margem,$coeficiente1,2);
	
echo "R$ $valor_liberado";

}
	
}

}
}

?>
                  </strong></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
<? 

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	


}
else{
	
if($quantemprestimos <= 5){

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Contrato Novo";

}

}

}
else{

if($solicitacao == "calcular"){
	
					  
 echo "Agregação de Margem";

}

}
	
	
}

}

				  
				  
				  
				  
				  
?>
                 
</div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                  
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Banco de Operação";

}

}
	
}
}


?>

</strong></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                  
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{

echo "Nova Pensão";

}
	
}

}
}

?>

</strong></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
				  
<? 

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{

echo $bco_operacao1;

}
	
}

}

}



?>
 
</div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
<?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	
}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
 echo "R$ $novapensao";
 
}

}
	
}

}


?>

</div></td>
                </tr>
              </table>
            </div>
<div align="left"></div>
            <div align="left"></div>              <div align="left"></div>
            <div align="left"></div>            <div align="left"></div>
            <div align="left"></div>            <div align="left"></div>
            <div align="left"></div>            <div align="left"></div>
            <div align="left"></div>            <div align="left"></div>
            <div align="left"></div>            <div align="left"></div>
            <div align="center"></div>            <div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <? echo $data_nasc; ?><input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>">
            </div></td>
            <td><div align="center">
              <input name="valor_da_renda" type="text" id="valor_da_renda" value="<? echo $valorrenda; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="complementosalario" type="text" id="complementosalario" value="<? echo $complementosalario; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="consignacao" type="text" id="consignacao" value="<? echo $consignacao; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">Quant Emprestimos</div></td>
            <td><div align="center">Emprestimos</div></td>
            <td><div align="center">Pensão Alimentícia</div></td>
            <td><div align="center">Contribuições</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <input name="quantemprestimos" type="text" id="quantemprestimos" value="<? echo $quantemprestimos; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="emprestimos" type="text" id="emprestimos" value="<? echo $emprestimos; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="pensao" type="text" id="pensao" value="<? echo $pensao; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="contribuicoes" type="text" id="contribuicoes" value="<? echo $contribuicoes; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
            <?
if(empty($cpf)){
	
}
else{
	
if(empty($valorrenda)){
	
echo "<script>

alert('ATENÇÃO!!!... CLIENTE COM VALOR DA RENDA OU DATA DE NASCIMENTO EM BRANCO!!!... ATUALIZE O CADASTRO ANTES DE PROSSEGUIR!');

</script>";

	
}
else{
  
echo "<input type='submit' name='button4' id='button4' value='Calcular'>";

}
			  
}
			  
			  
			  ?>
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="TabbedPanelsContent">
      <form name="form2" method="post" action="index.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


?>
        <table width="100%" border="0">
          <tr>
            <td width="12%"><div align="left">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "calcular"; ?>">
            </div></td>
            <td width="12%"><div align="center"></div></td>
            <td width="13%"><div align="center"></div></td>
            <td width="12%"><div align="center"></div></td>
            <td width="9%"><div align="center"></div></td>
            <td width="19%"><div align="center"></div></td>
            <td width="18%"><div align="center"></div></td>
            <td width="5%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="right">Nome</div></td>
            <td colspan="3"><div align="left"><? echo $nome_cliente; ?></div>
              <div align="left"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="right">CPF</div></td>
            <td colspan="3"><div align="left"><? echo $cpf; ?>
              <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">Data Nasc</div></td>
            <td><div align="center">Renda</div></td>
            <td><div align="center">Complemento do Salario</div></td>
            <td><div align="center">Consignação</div></td>
            <td><div align="center"></div></td>
            <td colspan="2" rowspan="8" valign="top"><div align="center">
<?
//------------------calculos cartao RMC--------------------

$margem_rmc = bcmul($valor_da_renda,$indicedecimalmargem_rmc,2);

$limitecompras = bcmul($margem_rmc,$indicermc,2);

$limitesaque = bcmul($limitecompras,$indicesaquedecimal,2);


//----------FIM DOS CALCULOS-------------------------------
?>
             
              <?

if($nova_margem <= 0){
	
$advertencia = "ATENÇÃO!!!... CLIENTE SEM MARGEM!";


}

?>
              <table width="100%" border="0" cellspacing="0">
                <?
if(($cpf <> "") && ($solicitacao <> "calcular")){
	
$bgcolor = "EEE";

}
else{
	
if(empty($cpf) && ($solicitacao <> "calcular")){
	
$bgcolor = "EEE";

}
else{
	

if(($cpf <> "") && ($solicitacao == "calcular")){
	
if($nova_margem <= 0){

	
$bgcolor = "f6ed61";

}
else{
	
$bgcolor = "CCCCCC";
	
}
	
}

}


}

?>
                <tr>
                  <td width="47%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                    <?

if(empty($cpf)){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
		
echo "Margem RMC";

}

}
	
}
}

?>
                  </strong></div></td>
                  <td width="8%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td width="45%" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                    <?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Limite Compras";

}
	
}

}
}

?>
                  </strong></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
                    <?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
echo "R$ $margem_rmc";

}
	
}

}

}

?>
                  </div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
                    <?
       
if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){
	

}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "R$ $limitecompras";

}
	
}

}

}

				  
?>
                  </div></td>
                </tr>
                <tr>
                  <td colspan="3" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                    <?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){


}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
echo "Limite Saque";

}
	
}

}
}

?>
                  </strong></div>
                    <div align="center"></div>
                    <div align="center"></div></td>
                </tr>
                <tr>
                  <td colspan="3" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"><strong>
                    <?

if(empty($cpf) && ($solicitacao == "calcular")){
	
}
else{
	
if(empty($valor_da_renda)){


}
else{

if($solicitacao == "calcular"){
	
if($nova_margem <= 0){
}
else{
	
	
echo "R$ $limitesaque";

}
	
}

}
}

?>
                  </strong></div>                    <div align="center"></div>                    <div align="center"></div></td>
                  </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                </tr>
                <tr>
                  <td colspan="3" bgcolor="#<? echo "$bgcolor"; ?>"><div align="center">
                    <? if($nova_margem <= 0){ echo "<span class='style1'>$advertencia</span>"; } ?>
                  </div>                    <div align="center"></div>                    <div align="center"></div></td>
                  </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                </tr>
                <tr>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                  <td bgcolor="#<? echo "$bgcolor"; ?>"><div align="center"></div></td>
                </tr>
              </table>
            </div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="left"></div>
              <div align="center"></div>
              <div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"> <? echo $data_nasc; ?>
              <input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>">
            </div></td>
            <td><div align="center">
              <input name="valorrenda" type="text" id="valorrenda" value="<? echo $valorrenda; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="complementosalario" type="text" id="complementosalario" value="<? echo $complementosalario; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="consignacao" type="text" id="consignacao" value="<? echo $consignacao; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">IRRF</div></td>
            <td><div align="center">Pensão Alimentícia</div></td>
            <td><div align="center">Contribuições</div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">
              <input name="ir" type="text" id="ir" value="<? echo $irrf_devido; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="pensao" type="text" id="pensao" value="<? echo $pensao; ?>" size="10">
            </div></td>
            <td><div align="center">
              <input name="contribuicoes" type="text" id="contribuicoes" value="<? echo $contribuicoes; ?>" size="10">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">
              <?
if(empty($cpf)){
	
}
else{
	
if(empty($valorrenda)){
	
echo "<script>

alert('ATENÇÃO!!!... CLIENTE COM VALOR DA RENDA OU DATA DE NASCIMENTO EM BRANCO!!!... ATUALIZE O CADASTRO ANTES DE PROSSEGUIR!');

</script>";

	
}
else{
  
echo "<input type='submit' name='button4' id='button4' value='Calcular'>";

}
			  
}
			  
			  
			  ?>
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="TabbedPanelsContent">Content 3</div>
    <div class="TabbedPanelsContent">Content 4</div>
  </div>
</div>
<p>&nbsp;</p>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var TabbedPanels2 = new Spry.Widget.TabbedPanels("TabbedPanels2");
</script>
</body>
</html>