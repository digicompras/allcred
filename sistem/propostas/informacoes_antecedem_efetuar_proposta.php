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
<title>Informa&ccedil;&otilde;es pr&eacute;vias para preenchimento de proposta!</title>
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
<p><?
//require("conect/conect.php"); or die("erro na requisição");

$cpf = $_POST['cpf'];
$tipo = $_POST['tipo'];
$tipovenda = $_POST['tipovenda'];
$categoria = $_POST['categoria'];
$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$bloqueio_compra = $_POST['bloqueio_compra'];


$bloqueio_compra_recebe = $_GET['bloqueio_compra'];
$bloqueio_compra2 = $bloqueio_compra_recebe;

if(empty($bloqueio_compra)){
$bloqueio_de_compra = $bloqueio_compra2;
}
else{
$bloqueio_de_compra = $bloqueio_compra;
}


$cpf_recebe = $_GET['cpf'];
$cpf2 = $cpf_recebe;

$tipo_recebe = $_GET['tipo'];
$tipo2 = $tipo_recebe;

$estabelecimento_proposta_recebe = $_GET['estabelecimento_proposta'];
$estabelecimento_proposta2 = $estabelecimento_proposta_recebe;

$tipo_proposta_recebe = $_GET['tipo_proposta'];
$tipo_proposta2 = $tipo_proposta_recebe;


$tipo_contrato_recebe = $_GET['tipo_contrato'];
$tipo_contrato2 = $tipo_contrato_recebe;


$tabela_recebe = $_GET['tabela'];
$tabela2 = $tabela_recebe;
	
$categoria_recebe = $_GET['categoria'];
$categoria2 = $categoria_recebe;


$tipovenda_recebe = $_GET['tipovenda'];
$tipovenda2 = $tipovenda_recebe;


error_reporting(E_ALL);

?>
      <? 

$sql = "SELECT * FROM termo_de_responsabilidade limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$termo = $linha[1];

}


 ?>


</p>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p>&nbsp;</p>
<form action="efetuar_proposta.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="60%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>
        <input name="bloqueio_compra" type="hidden" id="bloqueio_compra" value="<? echo $bloqueio_de_compra; ?>" />
      Qual o perfil do cliente? </strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Agencia da proposta </strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>CPF informado</strong></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><? if(empty($tipo)){ echo $tipo2;} else{ echo $tipo; } ?>
        <select class='class02' name="tipo" id="tipo">
          <option selected>
            <? if(empty($tipo)){ echo $tipo2; } else{ echo $tipo; } ?>
          </option>
          <?


$sql = "select * from tipos where situacao = 'Ativo' order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
      </select></td>
      <td background="../../imagens/fundocelulas1.png"><? if(empty($estabelecimento_proposta)){ echo $estabelecimento_proposta2;} else{ echo $estabelecimento_proposta; } ?>
        <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? if(empty($estabelecimento_proposta)){ echo $estabelecimento_proposta2;} else{ echo $estabelecimento_proposta; } ?>"></td>
      <td background="../../imagens/fundocelulas1.png"><? if(empty($cpf)){ echo $cpf2;} else{ echo $cpf; } ?>
        <input name="cpf" type="hidden" id="cpf" value="<? if(empty($cpf)){ echo $cpf2;} else{ echo $cpf; } ?>"></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo de proposta </strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo de contrato</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Tabela</strong></td>
    </tr>
    <tr>
      <td width="34%" background="../../imagens/fundocelulas1.png"><select class='class02' name="tipo_proposta" id="tipo_proposta">
        <option selected>
          <? if(empty($tipo_proposta)){ echo $tipo_proposta2;} else{ echo $tipo_proposta; } ?>
          </option>
        <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
      </select>
      <br></td>
      <td width="34%" background="../../imagens/fundocelulas1.png"><select class='class02' name="tipo_contrato" id="tipo_contrato">
        <option selected>
          <? if(empty($tipo_contrato)){ echo $tipo_contrato2;} else{ echo $tipo_contrato; } ?>
          </option>
        <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipo_contrato where tipo_contrato <> 'COMPRA' and status = 'Ativo' order by tipo_contrato asc";
}
else{
$sql = "select * from tipo_contrato where status = 'Ativo' order by tipo_contrato asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_contrato']."</option>";
    }
?>
      </select></td>
    <td width="32%" background="../../imagens/fundocelulas1.png"><select class='class02' name="tabela" id="tabela">
      <option selected>
        <? if(empty($tabela)){ echo $tabela2;} else{ echo $tabela; } ?>
        </option>
      <?


    $sql = "select * from tabelas where situacao = 'Ativo' order by tabela asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tabela']."</option>";
    }
?>
    </select></td></tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><strong>Tipo Venda</strong></td>
      <td background="../../imagens/fundocelulas1.png"><strong>Categoria</strong></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="tipovenda" id="tipovenda">
		  <option selected>
        <? if(empty($tipovenda)){ echo $tipovenda2;} else{ echo $tipovenda; } ?>
        </option>
          
          <?

$sql = "select * from tipovenda where situacao = 'Ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipodevenda']."</option>";
    }
?>

      </select></td>
      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="categoria" id="categoria">
        <option selected>
          <? if(empty($categoria)){ echo $categoria2;} else{ echo $categoria; } ?>
          </option>
        <?


    $sql = "select * from categorias_clientes where situacao = 'Ativo' order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
      </select></td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" background="../../imagens/fundocelulas2.png"><div align="center"><strong>
        <?

//echo "<br>Termo de Responsabilidade(Assinatura eletrônica)<br><br>$termo";
?>
      </strong></div></td>
    </tr>
    <tr>
      <td colspan="3" background="../../imagens/fundocelulas2.png"><div align="center"><strong>
        <input class='class02' name="termo_de_responsabilidade" type="hidden" id="termo_de_responsabilidade" value="Estou ciente e de Acordo!">
      </strong></div></td>
    </tr>
    <tr>
      <td colspan="3" background="../../imagens/fundocelulas2.png"><div align="center">
        <input name="valor_liberado" type="hidden" id="valor_liberado" value="<? echo 0.00; ?>">
        <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo "Será informado posteriormente"; ?>">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit" value="Efetuar Proposta">
      </div></td>
    </tr>
  </table>
</form>

<p>&nbsp;</p>
</body>
</html>
