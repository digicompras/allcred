<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.

else //se não for...
header("Location: alerta.php");

?>


<html>
<head>
<title>Servi&ccedil;os ao Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../conect/conect.php';
$data_hoje = $_SESSION['data_hoje'];

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
background="../background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
<? } ?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$nome_operador = $linha[1];
$senha_op = $linha[41];
$tipo_op = $linha[42];
?>



  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td><strong>Ol&aacute;! Seja bem vindo, hoje &eacute;: <font color="#0000FF"> <? echo $data_hoje; ?></font><br> </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 
            
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td><strong>E-mail:</strong><br>
      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>
      <td width="16%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $linha[19]; ?>
            <input name="celular" type="hidden" id="celular" value="<? echo $linha[19]; ?>">
      </font><font color="#0000FF">      </font></strong></td>
      <td width="21%"><strong><font color="#0000FF">
      </font></strong></td>
    </tr>
    <tr>
      <td width="34%"><strong>Estabelecimento:</strong> <br>
        <strong><font color="#0000FF"><? echo $linha[44]; ?>
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $linha[44]; ?>">
        </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="29%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
        <? echo $linha[46]; ?>
            <input name="tel_estabelecimento" type="hidden" id="nfantasia23" value="<? echo $linha[46]; ?>">
            </font></strong></td>
      <td><strong>Cidade: <br>
          <font color="#0000FF"><? echo $linha[45]; ?>
          <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento2" value="<? echo $linha[45]; ?>">
          </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $linha[47]; ?>
            <input name="email_estabelecimento" type="hidden" id="email_estabelecimento2" value="<? echo $linha[47]; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="ponto/marcarponto.php">
        <?
		

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_ponto = $linha[0];
}

?>
        <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">
        <?  echo $codigo_ponto; ?>
        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        <input type="submit" name="Submit9" value="marcar Ponto">
        </font></strong>
      </form>        <strong><font color="#0000FF">      </font></strong></td>
      <td><form name="form3" method="post" action="ponto/selecione_funcionario_para_gerar_cartao_ponto.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$senha_flavio = allcred10;
$senha_ivan = 111;

if($senha==$senha_flavio){
echo '<input type="submit" name="Submit33" value="Visualizar cartao de ponto por Funcionario">';
}

?>
        <strong></strong>      
      </form>        <strong><font color="#0000FF">          </font></strong></td>
      <td><strong><font color="#0000FF">        </font></strong></td>
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
  <div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td width="21%"><form action="estabelecimentos/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit6" value="Estabelecimentos">
    </form></td>
    <td width="13%"><form action="clientes/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="num_proposta">
        <option value="null" selected>Selecione
        <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status <> 'Aprovado_e_Pago' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['num_proposta']. ">".$x['num_proposta']."</option>";
    }
?>
        </option>
      </select>
      <input type="submit" name="Submit3" value="Acompanhar Proposta">
    </form></td>
    <td><form name="form2" method="post" action="operadores/editar_operador.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Editar Dados Cadastrais">
    </form></td>
  </tr>
  <tr>
    <td><form action="propostas/informe_operador_para_gerar_relatorio_mensal.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
      <input type="submit" name="Submit523" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
    </form></td>
    <td><form action="propostas/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Propostas">
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="select3">
        <option value="null" selected>Selecione
        <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status = 'Aprovado_e_Pago' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['num_proposta']. ">".$x['num_proposta']."</option>";
    }
?>
        </option>
      </select>
      <input type="submit" name="Submit32" value="Propostas Pagas">
    </form></td>
    <td><form name="form6" method="post" action="bancos/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit8" value="Bancos">
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><form action="propostas/pesquisa_propostas_por_num_proposta.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit522" value="Pesquisar Propostas por N&ordm;">
    </form></td>
    <td width="38%"><form action="propostas/pesquiza_propostas_por_cpf.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit52" value="Pesquisar Propostas por CPF">
    </form></td>
    <td width="28%"><form name="form6" method="post" action="../site/principal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit82" value="Site - Administra&ccedil;&atilde;o">
    </form></td>
  </tr>
</table>
<?



$num_proposta = $_POST['num_proposta'];

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
<strong></strong>
<div align="center"><strong>Prezado Operador!</strong>
</div>
<table width="100%"  border="0">
  <tr>
    <td colspan="3"><strong>A proposta de seu cliente <font color="#0000FF"><? echo $linha[4]; ?></font> de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, </strong></font><br>
    <font color="#000000"><strong>Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>
  </tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="20%"><form action="propostas/imprimir_proposta.php" method="post" name="form3" target="_blank">
      <strong><font color="#0000FF">
      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
      </font></strong>
      <input type="submit" name="Submit4" value="Imprimir Proposta">
    </form></td>
    <td width="43%">&nbsp;</td>
  </tr>
</table>
<p align="center">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  <? } ?>
</p>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>