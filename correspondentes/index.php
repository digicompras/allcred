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

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM correspondentes where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$nome_operador = $linha[1];
$senha_op = $linha[41];
$produto1 = $linha[52];
$produto2 = $linha[53];
$produto3 = $linha[54];
$prazo1 = $linha[55];
$prazo2 = $linha[56];
$prazo3 = $linha[57];
$com1 = $linha[58];
$com2 = $linha[59];
$com3 = $linha[60];
$fator1 = $linha[61];
$fator2 = $linha[62];
$fator3 = $linha[63];

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
      <td><div align="center"><strong><font color="#0000FF">PRODUTO / SERVI&Ccedil;O </font></strong></div></td>
      <td><div align="center"><strong><font color="#0000FF">PRAZO</font></strong></div></td>
      <td><div align="center"><strong><font color="#0000FF">COMISS&Atilde;O</font></strong></div></td>
      <td><div align="center"><strong><font color="#0000FF">FATOR</font></strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><font color="#000000"><strong><? echo $produto1; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $prazo1; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $com1; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $fator1; ?></strong></font></div></td>
    </tr>
    <tr>
      <td><div align="center"><font color="#000000"><strong><? echo $produto2; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $prazo2; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $com2; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $fator2; ?></strong></font></div></td>
    </tr>
    <tr>
      <td><div align="center"><font color="#000000"><strong><? echo $produto3; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $prazo3; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $com3; ?></strong></font></div></td>
      <td><div align="center"><font color="#000000"><strong><? echo $fator3; ?></strong></font></div></td>
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
    <td width="21%"><form action="clientes/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
    </form></td>
    <td width="13%">&nbsp;</td>
    <td colspan="2"><form action="propostas/relatorio_de_producao_periodico_por_operador.php" method="post" name="form5">
      <div align="right">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
    De
    <select name="dia_inicial" id="select31">
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
      <option>24</option>
      <option>25</option>
      <option>26</option>
      <option>27</option>
      <option>28</option>
      <option>29</option>
      <option>30</option>
      <option>31</option>
    </select>
    <strong><font color="#0000FF"> </font></strong>
    <select name="mes_inicial" id="select32">
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
    </select>
    <strong><font color="#0000FF">
    <select name="ano_inicial" id="select33">
      <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
    </select>
    </font></strong> at&eacute;
    <select name="dia_final" id="select34">
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
      <option>24</option>
      <option>25</option>
      <option>26</option>
      <option>27</option>
      <option>28</option>
      <option>29</option>
      <option>30</option>
      <option>31</option>
    </select>
    <strong><font color="#0000FF"> </font></strong>
    <select name="mes_final" id="select35">
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
    </select>
    <strong><font color="#0000FF">
    <select name="ano_final" id="select36">
      <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
    </select>
    </font></strong>
    <input type="submit" name="Submit5232" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
      </div>
    </form></td>
  </tr>
  <tr>
    <td><form action="clientes/pesquiza_cpf.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Efetuar Proposta">
    </form></td>
    <td>&nbsp;</td>
    <td><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="select">
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><form action="clientes/cupom.php" method="post" name="form5">
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
    <td width="38%"><form action="index.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <select name="num_proposta" id="select3">
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
    <td width="28%">&nbsp;</td>
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

<div align="center"><strong>Prezado Correspondente!</strong>
</div>
<table width="100%"  border="0">
  <tr>
    <td colspan="3"><strong>A proposta de seu cliente <font color="#0000FF"><? echo $linha[4]; ?></font> de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, </strong></font><br>
    <font color="#000000"><strong>Tem seu status definido como </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> </font></td>
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