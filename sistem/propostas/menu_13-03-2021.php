<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");


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
<script language="javascript">

function foco(cpf)

{

document.getElementById(cpf).focus();

}

</script>

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><?

$solicitacao = $_POST['solicitacao'];


$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$nome_operador = $linha[1];

}

$hoje = date('Y-m-d');

  
$efetuar_proposta = $_POST['efetuar_proposta'];  
$cpf = $_POST['cpf'];  

?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><strong><font size="4">O que deseja fazer com as propostas?</font></strong></td>
    </tr>
    <tr>
      <td colspan="3"><form name="form1" method="post" action="../index.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
      </div></td>
    </tr>
    <tr>
      <td width="27%" background="../../imagens/fundocelulas1.png"><form action="menu.php" method="post" name="form2">
        <div align="center">
          <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
          <input name="efetuar_proposta" type="hidden" id="efetuar_proposta" value="Sim">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?

$sql3 = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$bloqueio_parcial = $linha[57];
}


if($bloqueio_parcial=="Não"){

          echo "<input class='class01' type='submit' name='Submit2' value='Efetuar Proposta'>";
}

else{

echo "<div align='center' class='style1'><blink>Bloqueado para efetuar proposta</blink></div>";

}		  
		  
		  
		  
?>
          </div>
      </form></td>
      <td width="25%" background="../../imagens/fundocelulas1.png"><form action="menu.php" method="post" name="form5">
        <div align="center">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
          <input name="cpf" type="hidden" id="cpf" value="sim">
          <input class='class01' type="submit" name="Submit5" value="Pesquisar Propostas por CPF">
          </div>
      </form></td>
      <td width="32%" background="../../imagens/fundocelulas1.png"><form name="form4" method="post" action="menu.php">
        <div align="center">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "impressao_solicitada"; ?>">
          <input class='class01' type="submit" name="Submit" value="Impress&atilde;o de propostas">
          </div>
      </form></td>
    </tr>
    <tr>
      <td height="40" background="../../imagens/fundocelulas1.png"><form action="../clientes/verifica.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%"  border="0">
          <tr>
            <td width="61%">
              <div align="right">
                <? if(empty($efetuar_proposta)){}else{ echo "CPF"; } ?>
                <? if(empty($efetuar_proposta)){}else{ echo "<input class='class02' name='cpf' type='text' id='cpf' size='11'>"; } ?>
              </div></td>
          <td width="39%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <? if(empty($efetuar_proposta)){}else{ echo "<input class='class01' type='submit' name='Submit3' value='Verificar'>"; } ?></td>
          </tr>
        </table>
      </form></td>
      <td background="../../imagens/fundocelulas1.png"><form action="lista_de_propostas.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%"  border="0">
          <tr>
            <td width="64%">
              <div align="right">
                <? if(empty($cpf)){}else{ echo "CPF"; } ?>
                <? if(empty($cpf)){}else{ echo "<input class='class02' name='cpf' type='text' id='cpf' size='11'>"; } ?>
              </div></td>
          <td width="36%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <? if(empty($cpf)){}else{ echo "<input class='class01' type='submit' name='Submit3' value='Verificar'>"; } ?></td>
          </tr>
        </table>
      </form></td>
      <td background="../../imagens/fundocelulas1.png"><form action="imprimir_proposta.php" method="post" enctype="multipart/form-data" name="form1" target="_blank">
        <table width="100%"  border="0">
          <tr>
            <td width="59%"><div align="right">
              <? if($solicitacao=="impressao_solicitada"){ echo "N&ordm;"; } ?>
              <? if($solicitacao=="impressao_solicitada"){ echo "<input class='class02' name='num_proposta' type='text' id='num_proposta' size='11'>"; } ?>
</div></td>
            <td width="41%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <? if($solicitacao=="impressao_solicitada"){ echo "<input class='class01' type='submit' name='Submit2' value='Imprimir'>"; } ?></td>
          </tr>
        </table>
      </form></td>
    </tr>
  </table>
<p></p>

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#<? echo "ffffff"; ?>">
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3"><strong>N&ordm; Proposta </strong></div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style4">Data Proposta</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style4">Prazo Envio</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style4">Dias corridos</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style4">Dias em atraso</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Status F&iacute;sico</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Status Proposta</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Cliente </div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">CPF</div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Valor Contrato </div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Banco da opera&ccedil;&atilde;o </div></td>
    <td background="../../imagens/fundocelulas2.png"><div align="center" class="style3">Tipo de Proposta</div></td>
  </tr>
    <?
	
$sql = "SELECT * FROM prazo_entrega_fisico limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$periodo = $linha[1];


}


$data_inicio_busca = "2015-03-01";

//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and prazo_final <> '0000-00-00' order by num_proposta desc limit 500";


$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and (status_fisico = 'PENDENTE DE ENVIO' or status_fisico = 'PENDENTE') and status <> 'REPROVADO' and data_proposta >= '$data_inicio_busca' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$num_proposta = $linha[0];
$obs_fisico = $linha[122];

$data_proposta = $linha[152];
$prazo_final = $linha[153];



//------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr1 = explode("-", $hoje);
 
$anolimite1 = $arr1[0];
$meslimite1 = $arr1[1];
$dialimite1 = $arr1[2];

//-------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr2 = explode("-", $data_proposta);
 
$anolimite2 = $arr2[0];
$meslimite2 = $arr2[1];
$dialimite2 = $arr2[2];

//--------------------------------------------------------

//calculo timestam das duas datas
$timestamp1 = mktime(0,0,0,$meslimite1,$dialimite1,$anolimite1);
$timestamp2 = mktime(0,0,0,$meslimite2,$dialimite2,$anolimite2); 


//diminuo a uma data a outra
$segundos_diferenca = $timestamp1 - $timestamp2;
//echo $segundos_diferenca;

//converto segundos em dias
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);

//obtenho o valor absoluto dos dias (tiro o possível sinal negativo)
//$dias_diferenca = abs($dias_diferenca);

//tiro os decimais aos dias de diferenca
$dias_de_atraso = floor($dias_diferenca);




$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

if($dias_diferenca>$periodo){

$dias_atraso = bcsub($dias_de_atraso,$periodo);

$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '$dias_atraso' where `propostas`. `num_proposta` = '$num_proposta'";

}
else{
$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '0' where `propostas`. `num_proposta` = '$num_proposta'";
}
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");

}

//echo $registros;

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and (status_fisico = 'PENDENTE DE ENVIO' or status_fisico = 'PENDENTE') and status <> 'REPROVADO' and data_proposta >= '$data_inicio_busca' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;

$num_proposta = $linha[0];
$nome_cli = $linha[4];
$cpf = $linha[7];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$status = $linha[51];
$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];
$dia_alteracao_status = $linha[110];
$mes_alteracao_status = $linha[111];
$ano_alteracao_status = $linha[112];
$data_alteracao_status = "$dia_alteracao_status-$mes_alteracao_status-$ano_alteracao_status";
$num_contrato_banco = $linha[151];
$status_fisico = $linha[120];

$num_bordero_relacionada = $linha[121];

$data_proposta = $linha[152];
$prazo_final = $linha[153];



$dias_diferenca_gravado = $linha[157];
$dias_atraso_gravado = $linha[158];

?>

  <tr>
    <td width="9%" background="../../imagens/fundocelulas1.png"><form action="imprimir_proposta.php" method="post" name="form2" target="_blank">
      <div align="center" class="style3">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
        <? if($dias_diferenca<=$periodo){
echo $num_proposta;
			
}
else{
echo "<input class='class01' type='submit' name='button' id='button' value='$num_proposta - Visualizar Proposta'>";
}
 ?>
      </div>
    </form></td>
    <td width="7%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $data_proposta;  ?> </div></td>
    <td width="6%" background="../../imagens/fundocelulas1.png"><div align="center"><span class="style3"><?  echo $prazo_final; ?></span></div></td>
    <td width="5%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $dias_diferenca_gravado; ?></div></td>
    <td width="6%" background="../../imagens/fundocelulas1.png"><div align="center"><span class="style3"><? echo $dias_atraso_gravado; ?></span></div></td>
    <td width="6%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $status_fisico;?></div></td>
    <td width="8%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $status;?></div></td>
    <td width="15%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $nome_cli;?></div></td>
    <td width="9%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $cpf;?></div></td>
    <td width="7%" background="../../imagens/fundocelulas1.png"><div align="center" class="style3"><? echo $valor_credito;?></div></td>
    <td width="9%" background="../../imagens/fundocelulas1.png"><div align="center"><span class="style3"><? echo $bco_operacao;?></span></div></td>
    <td width="13%" background="../../imagens/fundocelulas1.png"><div align="center"><span class="style3"><? echo $tipo_proposta;?></span></div></td>
  </tr>
    <? } ?>
</table>

<p>&nbsp;</p>
</body>
</html>
