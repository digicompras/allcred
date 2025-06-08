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
      <td colspan="3">&nbsp;</td>
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
<p>&nbsp;</p>
</body>
</html>
