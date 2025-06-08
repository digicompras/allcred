<?
/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();


session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


require '../conect/conect.php';

?>

<?


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome_operador = $linha[1];

}

$sql = "SELECT * FROM operadores where nome = '$nome_operador'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$funcao = $linha[43];
$estab_pertence = $linha[44];
}



$sql = "SELECT * FROM permissoes_do_usuario where usuario = '$nome_operador' and funcao = '$funcao' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$autorizar_ip = $linha[3];

}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #BABABA;
}
-->
</style></head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ECE9D8">
  <tr>
    <td width="11%" valign="top" bgcolor="#bababa">      <form action="principal.php" method="post" name="form1" target="_top" id="form4">
        
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class='class01' type="submit" name="Submit4" value="Home" />
        </div>
    </form></td>
    <td width="14%" valign="top" bgcolor="#bababa"><form action="clientes/menu.php" method="post" name="form1" target="navegacao" id="form1">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="hidden" name="codigolancamento" id="codigolancamento" />
        <input type="hidden" name="solicitacao" id="solicitacao" />
        <input class='class01' type="submit" name="Submit22" value="Clientes" />
      </div>
    </form></td>
    <td width="16%" valign="top" bgcolor="#bababa"><div align="center">
      <form action="relatorios/relatorio_de_possibilidades.php" method="post" name="form2" target="navegacao" id="form3">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class='class01' type="submit" name="Submit2" value="Possibilidades a Respnder" />
        </div>
      </form>
    </div></td>
    <td width="14%" valign="top" bgcolor="#bababa"><form action="relatorios/margem_a_verificar.php" method="post" name="form9" target="navegacao" id="form33">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input class='class01' type="submit" name="Submit11" value="Verificar Margem/Portabilidade" />
    </form></td>
    <td width="16%" valign="top" bgcolor="#bababa"><div align="center">
      <form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form7">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "buscar bordero"; ?>" />
          <input class='class01' type="submit" name="button" id="button" value="Borderôs" />
        </div>
      </form>
    </div></td>
    <td width="11%" valign="top" bgcolor="#bababa"><div align="center">
      <form action="ips/menu.php" method="post" name="form8" target="navegacao" id="form13">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if($autorizar_ip=="sim"){ echo "<input class='class01' type='submit' name='Submit21' value='Autorização de IP's' />"; } ?>
        </div>
      </form>
    </div></td>
    <td width="11%" valign="top" bgcolor="#bababa"><div align="center"></div></td>
    <td width="7%" valign="top" bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><form action="propostas/menu.php" method="post" name="form2" target="navegacao" id="form22">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class='class01' type="submit" name="Submit5" value="Propostas" />
        </div>
    </form></td>
    <td bgcolor="#bababa"><form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form6">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
        <input class='class01' type="submit" name="button10" id="button10" value="Alterar status proposta" />
      </div>
    </form></td>
    <td bgcolor="#bababa"><div align="center">
      <form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form10">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar propostas"; ?>" />
          <input class='class01' type="submit" name="button2" id="button2" value="Verificar propostas por CPF" />
        </div>
      </form>
    </div></td>
    <td bgcolor="#bababa"><form action="relatorios/propostas_a_digitar.php" method="post" name="form2" target="navegacao" id="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="tipo_proposta1" type="hidden" id="tipo_proposta1" value="Todas" />
        <input name="titulo_proposta1" type="hidden" id="titulo_proposta1" value="Todas" />
        <input class='class01' type="submit" name="Submit30" value="Propostas a digitar" />
      </div>
    </form></td>
    <td bgcolor="#bababa"><form action="veiculos/index.php" method="post" name="form18" target="navegacao" id="form19">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="hidden" name="cpf2" id="cpf2" />
        <input type="hidden" name="num_proposta" id="num_proposta" />
        <input class='class01' type="submit" name="button3" id="button3" value="Veículos" />
      </div>
    </form></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa">&nbsp;</td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa">&nbsp;</td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
    <td bgcolor="#bababa"><div align="center"></div></td>
  </tr>
</table>
</body>
</html>
