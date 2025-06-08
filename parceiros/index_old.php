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
$dia = date('d');
$mes = date('m');
$ano = date('Y');


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?> 
<body bgcolor="#<? printf("$linha[1]"); ?>"> 
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
$bloqueio_parcial = $linha[57];

?>





  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td><strong>Ol&aacute;! Seja bem vindo!<br> 
        </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 
            
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td><strong>E-mail:</strong><br>
      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>
      <td width="15%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $linha[19]; ?>
      </font><font color="#0000FF">      </font></strong></td>
      <td width="23%" valign="top"><div align="center">
        <strong><font color="#0000FF">Confira a data de hoje<br> 
        </font></strong>
        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>
           
        </p>
</div></td>
    </tr>
    <tr>
      <td width="32%"><strong>Estabelecimento:</strong> <br>
        <strong><font color="#0000FF"><? echo $linha[44]; ?>
        </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="30%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
        <? echo $linha[46]; ?>
            </font></strong></td>
      <td><strong>Cidade: <br>
          <font color="#0000FF"><? echo $linha[45]; ?>          </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $linha[47]; ?>
      </font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="ponto/marcarponto.php">
        <?
$hora = date('H');		

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_ponto = $linha[0];
$ent_t = $linha[5];

}

?>
        <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">
        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        <input type="submit" name="Submit9" value="marcar Ponto">
        </font></strong>
      </form>        <strong><font color="#0000FF">      </font></strong></td>
      <td><form name="form3" method="post" action="verifica_f.php">
        

<input type="submit" name="Submit33" value="Visualizar cartao de ponto por Funcionario">


        <strong>
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </strong>      
      </form>        <strong><font color="#0000FF">          </font></strong></td>
      <td colspan="2"><form action="verifica_m.php" method="post" name="form5">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <input type="submit" name="Submit52222" value="Aprovar / Recusar solicita&ccedil;&atilde;o de mototoaxi">
      </form>        </td>
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
    <td><strong></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form action="propostas/relatorio_de_producao_mensal_por_operador.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
      <input name="mes_ano" type="text" id="mes_ano" size="10" maxlength="10">
      <input type="submit" name="Submit53" value="Relat&oacute;rio (Antigo)">
    </form></td>
  </tr>
  <tr>
    <td width="21%"><form action="estabelecimentos/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit6" value="Estabelecimentos">
    </form></td>
    <td width="14%"><form action="clientes/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
    </form></td>
    <td colspan="2"><form action="propostas/relatorio_de_producao_periodico_por_operador_novo.php" method="post" name="form5">
        <div align="right">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="campanha" type="hidden" id="campanha" value="selecione">
          <input name="nome_operador" type="hidden" id="nome_operador3" value="<? echo $nome_operador; ?>">
          De
          <select name="dia_inicial" id="select3">
            <?


    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dia_alteracao_status']."</option>";
    }
?>
          </select>
          <select name="mes_inicial" id="select4">
            <option selected>
            <?  echo $mes;  ?>
            </option>
            <?


    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_alteracao_status']."</option>";
    }
?>
          </select>
          <select name="ano_inicial" id="select5">
            <option selected>
            <?  echo $ano;  ?>
            </option>
            <?


    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
          </select>
at&eacute;
<select name="dia_final" id="select11">
  <?


    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dia_alteracao_status']."</option>";
    }
?>
</select>
<select name="mes_final" id="select12">
  <option selected>
  <?  echo $mes;  ?>
  </option>
  <?


    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_alteracao_status']."</option>";
    }
?>
</select>
<select name="ano_final" id="select13">
  <option selected>
  <?  echo $ano;  ?>
  </option>
  <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
</select>
<input type="submit" name="Submit5232" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
        </div>
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><form action="propostas/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?      
if($bloqueio_parcial==Não){

printf('<input type="submit" name="Submit" value="Propostas">');
}
else{
echo "Bloqueado para efetuar proposta";
}
?>
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="num_proposta">
        <option value="null" selected>Selecione
        <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status <> 'APROVADO E PAGO' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['num_proposta']."</option>";
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
    <td colspan="2"><form action="propostas/pesquisa_propostas_por_num_proposta.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit522" value="Pesquisar Propostas por N&ordm;">
    </form></td>
    <td width="34%"><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="num_proposta">
        <option value="null" selected>Selecione
        <?


    $sql = "select * from propostas where nome_operador = '$nome_operador' and status = 'APROVADO E PAGO' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['num_proposta']."</option>";
    }
?>
        </option>
      </select>
      <input type="submit" name="Submit32" value="Propostas Pagas">
    </form></td>
    <td width="31%"><form name="form6" method="post" action="bancos/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit8" value="Bancos">
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><form action="mototaxi/informe_cpf_para_solicitacao.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5222" value="Mototaxi">
    </form></td>
    <td><form action="propostas/pesquiza_propostas_por_cpf.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit52" value="Pesquisar Propostas por CPF">
    </form></td>
    <td><form action="clientes/cupom.php" method="post" name="form5">
      <div align="left">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
    CPF
    <input name="cpf" type="text" id="cpf2" size="11" maxlength="11">
    <input type="submit" name="Submit52322" value="Registrar Cupom">
      </div>
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