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
<title>Menu principal do Administrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../conect/conect.php';

			
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>

<form name="form1" method="post" action="calcula_pedido.php">
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$nome_operador = $linha[1];
?>



  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br> </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 
            <input name="nome" type="hidden" id="razaosocial2" value="<? echo $linha[1]; ?>">
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="41%"><strong>Estabelecimento:</strong> <br><strong><font color="#0000FF"><? echo $linha[24]; ?>
            <input name="estabelecimento" type="hidden" id="nfantasia5" value="<? echo $linha[24]; ?>">
      </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="14%"><strong>Celular:<font color="#0000FF"><br> <? echo $linha[19]; ?>
            <input name="celular" type="hidden" id="nfantasia32" value="<? echo $linha[19]; ?>">
      </font><font color="#0000FF">
      </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong>Cidade: <br><font color="#0000FF"><? echo $linha[25]; ?>
            <input name="cidade_estabelecimento" type="hidden" id="nfantasia43" value="<? echo $linha[25]; ?>">
      </font><font color="#0000FF">      </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
        <? echo $linha[26]; ?>
            <input name="tel_estabelecimento" type="hidden" id="nfantasia23" value="<? echo $linha[26]; ?>">
      </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $linha[27]; ?>
            <input name="email_estabelecimento" type="hidden" id="nfantasia24" value="<? echo $linha[27]; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF">      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
<?
if($reg==3){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>
  </table>
  
  <?
  	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	?>

</form>
<?



$num_proposta = $_POST['num_proposta'];

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
<p align="center"><strong>ALLCRED FINANCEIRA! </strong></p>
<table width="100%"  border="0">
  <tr>
    <td colspan="3"><strong>A proposta de seu cliente  de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>
  </tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="20%"><form action="propostas/imprimir_proposta.PHP" method="post" name="form3" target="_blank">
      <strong><font color="#0000FF">
      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
      </font></strong>
      <input type="submit" name="Submit4" value="Imprimir Proposta">
    </form></td>
    <td width="43%">&nbsp;</td>
  </tr>
</table>
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
<? } ?>

<div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td><form action="estabelecimentos/menu.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit6" value="Estabelecimentos">
      </font>
    </form></td>
    <td width="18%"><form action="clientes/menu.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
      </font>
    </form></td>
    <td><form action="principal.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="num_proposta">
          <option value="null" selected>Selecione
          <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status <> 'Proposta_Paga' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['num_proposta']. ">".$x['num_proposta']."</option>";
    }
?>
          </option>
      </select>
      <input type="submit" name="Submit3" value="Acompanhar Proposta">
      </font>
    </form></td>
    <td><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit7" value="Emitir etiquetas para mala-direta">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><form action="estados_do_brasil/menu.php" method="post" name="form6">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit62" value="Estados do Brasil ">
      </font>
    </form></td>
    <td><form action="propostas/menu.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Propostas">
      </font>
    </form></td>
    <td><form action="principal.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="select3">
          <option value="null" selected>Selecione
          <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status = 'Proposta_Paga' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['num_proposta']. ">".$x['num_proposta']."</option>";
    }
?>
          </option>
      </select>
      <input type="submit" name="Submit32" value="Propostas Pagas">
      </font>
    </form></td>
    <td><form action="operadores/menu.php" method="post" name="form20">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit20" value="Operadores(Funcion&aacute;rios)">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><form name="form6" method="post" action="bancos/menu.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit8" value="Bancos">
      </font>
    </form></td>
    <td><form action="status/menu.php" method="post" name="form17">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit172" value="Status">
      </font>
    </form></td>
    <td><form action="propostas/pesquiza_propostas_por_cpf.php" method="post" name="form5">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit52" value="Pesquisar Propostas por CPF">
      </font>
    </form></td>
    <td><form action="correspondentes/menu.php" method="post" name="form20">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit202" value="Correspondentes">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><form name="form8" method="post" action="mototaxi/menu.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit122" value="Mototaxi">
      </font>
    </form></td>
    <td><form name="form8" method="post" action="newsletter/menu.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit1222" value="Newslleter">
      </font>
    </form></td>
    <td><font size="2">&nbsp;</font></td>
    <td><form name="form8" method="post" action="ponto/menu.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit12" value="Cart&atilde;o de Ponto">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td colspan="4"><form name="form12" method="post" action="propostas/status_proposta.php">
        <div align="center"><font size="2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          N&ordm; da proposta
          <input name="num_proposta" type="text" id="num_proposta" size="4" maxlength="4">
          Percentual de comiss&atilde;o
          <input name="percentual" type="text" id="percentual" size="4" maxlength="4">
          % Comiss&atilde;o do operador
          <input name="percentual_op" type="text" id="percentual_op" size="4" maxlength="4"> 
          <input type="submit" name="Submit15" value="Alterar Status de propostas">
        </font></div>
    </form></td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="propostas/informe_operador_para_gerar_relatorio_mensal.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Relat&oacute;rio de produ&ccedil;&atilde;o mensal por operador">
      </font>
    </form></td>
    <td colspan="2"><form action="propostas/lista_de_propostas_para_alterar_satatus.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="100%"  border="0">
        <tr>
          <td width="41%"><font size="2">Informe o CPF do cliente para ver as propostas dele <br>
          </font></td>
          <td width="21%"><font size="2">
            <input name="cpf" type="text" id="cpf">
          </font></td>
          <td width="38%"><font size="2">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input type="submit" name="Submit17" value="Verificar Propostas ">
          </font></td>
        </tr>
      </table>
    </form></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="correspondentes/informe_correspondente_para_verificar_propostas_aguardando_ativacao.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit23" value="Verificar status por Correspondente">
      </font>
    </form></td>
    <td colspan="2"><div align="center"><font size="2"></font>
      </div></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="propostas/informe_operador_para_verificar_propostas_aguardando_ativacao.php">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit24" value="Verificar status por operador">
      </font>
    </form></td>
    <td colspan="2"><div align="center">
      <form name="form15" method="post" action="propostas/escolha_tipo_relatorio.php">
        <font size="2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit16" value="Relat&oacute;rio de Comiss&otilde;es ALLCRED">
        </font>
      </form>
    </div></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
        <form name="form15" method="post" action="propostas/relatorio_comissoes_baixadas_dia_anterior.php">
          <font size="2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          Informe a data que deseja 
          <input name="data" type="text" id="data" size="10" maxlength="10">
          <input type="submit" name="Submit162" value="Relat&oacute;rio de Comiss&otilde;es baixadas do dia">
          </font>
        </form>
    </div></td>
  </tr>
  <tr>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">Website</font></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td><form action="aempresa/menu.php" method="post" name="form1">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit9" value="A Empresa ">
      </font>
    </form></td>
    <td><form action="background_topo/menu.php" method="post" name="form14">
          <font size="2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit142" value="Background Cabe&ccedil;alho">
          </font>
    </form></td>
    <td><form action="cores/menu.php" method="post" name="form5">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit53" value="Cores do website">
      </font>
    </form></td>
    <td><form action="categorias/menu.php" method="post" name="form2">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit22" value="Categorias">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><form action="comentarios/menu.php" method="post" name="form3">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit322" value="Coment&aacute;rios">
      </font>
    </form></td>
    <td><form action="background_navegacao/menu.php" method="post" name="form14">
          <font size="2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit14" value="Background Navega&ccedil;&atilde;o">
          </font>
    </form></td>
    <td><form action="pagina_inicial/menu.php" method="post" name="form10">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit10" value="P&aacute;gina inicial do site ">
      </font>
    </form></td>
    <td><form action="sub_categorias/menu.php" method="post" name="form13">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit13" value="Sub categorias ">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><form action="ultimos_visitantes/ultimos_visitantes.php" method="post" name="form17">
          <font size="2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit1722" value="&Uacute;ltimos visitantes">
          </font>
    </form></td>
    <td><form action="logo/menu.php" method="post" name="form7">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit72" value="Logotipo">
      </font>
    </form></td>
    <td><font size="2">&nbsp;</font></td>
    <td><form action="produtos/menu.php" method="post" name="form11">
      <font size="2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit11" value="Produtos">
      </font>
    </form></td>
  </tr>
  <tr>
    <td><font size="2">&nbsp;</font></td>
    <td><form action="publicidade/menu.php" method="post" name="form19">
        <font size="2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit19" value="Publicidade">
        </font>
    </form></td>
    <td><font size="2">&nbsp;</font></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="19%">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="35%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>