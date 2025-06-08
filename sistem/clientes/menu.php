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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;

}
.style1 {
	color: #0000FF;
	font-weight: bold;
}

-->
</style>

</head>

<?

require '../../conect/conect.php';


error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );

$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];


?>

<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];
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
$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$funcao = $linha[43];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$salario = $linha[48];
$vale_alimentacao = $linha[49];
$gratificacao = $linha[50];
$comissao = $linha[51];
$emprestimo = $linha[52];
$admissao = $linha[53];
$demissao = $linha[54];
$meta = $linha[55];
$status = $linha[56];
$bloqueio_parcial = $linha[57];
$tempo_almoco = $linha[58];



}

?>

<?

//include '../../conect/verificahora.php';

?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
      <td width="19%">&nbsp;</td>
      <td colspan="2"><div align="center"><strong><font color="#0000FF" size="4">O que deseja fazer com os clientes?</font></strong></div></td>
      <td width="2%">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas1.png"></td>
      <td width="29%" background="../../imagens/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19%" valign="top" background="../../imagens/fundocelulas1.png"><div align="center">
      <form action="menu.php" method="post" name="form2">
        <p><strong>Inserir Novo Cliente </strong></p>
        <p>
          <strong>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "cadastrarcliente"; ?>">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input class='class01' type=image src="../../imagens/botoes/inserir.png" width="100" height="100" name="Submit2" title="INSERIR NOVO CLIENTE">
          </strong></p>
        </form>
    </div></td>
    <td width="23%" valign="top" background="../../imagens/fundocelulas1.png"><div align="center">
      <form name="form3" method="post" action="menu.php">
        <p><strong>Editar por CPF </strong></p>
        <p>
          <strong>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "editarcliente"; ?>">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <? if($funcao<>"Agente"){ ?>  
          <input class='class01' type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit5" title="EDITAR">
          </strong></p>
        <strong>
        <? } ?>
        </strong>
      </form>
    </div></td>
    <td width="28%" valign="top" background="../../imagens/fundocelulas1.png"><div align="center">
      <form name="form5" method="post" action="menu.php">
        <p><strong>Editar por Codigo </strong></p>
        <p>
          <strong>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "editarclienteporcodigo"; ?>">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <? if($funcao<>"Agente"){ ?> 
          <input class='class01' type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit6" title="EDITAR POR NUMERO DE MATRICULA">
          </strong></p>
        <strong>
        <? } ?>
        </strong>
      </form>
    </div></td>
    <td width="14%" valign="top" background="../../imagens/fundocelulas1.png"><div align="center"><form name="form2" method="post" action="menu.php">
        <div align="center"> 
          <p><strong>
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            Pesquisa por n&ordm; de Pedido de Margem / Portabilidade</strong>          </p>
          <p>
            <input name="codigolancamento" class='class02' type="text" id="codigolancamento" value="<? echo $codigolancamento; ?>" size="10">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir"; ?>">
          </p>
          <p>
            <input class='class01' type=image src="../../imagens/botoes/buscar.png" width="100" height="100" name="Submit7" title="PESQUISAR">
          </p>
        </div>
    </form></div></td>
  </tr>
</table>
<?
 if($solicitacao=="cadastrarcliente"){ ?>
<form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="30%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="35%" background="../../imagens/fundocelulas2.png">
        <div align="center">
 <?         
      echo "Informe o CPF do cliente a ser pesquisado<br>
      <input class='class02' name='cpf' type='text' id='cpf'>
	  ";
	  
	  ?>
          
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </div></td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><div align="center">
        <input class='class01' type=image src="../../imagens/botoes/buscar.png" width="100" height="100" name="Submit" title="PESQUISAR">
      </div></td>
    </tr>
  </table>
</form>
<p>
  <? } ?>
  <?
 if($solicitacao=="editarcliente"){ ?>
</p>
<form action="editar_cliente.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="30%"  border="0" align="center">
    <tr>
      <td width="10%" background="../../imagens/fundocelulas2.png">
        <div align="center">
          <?
      echo "Informe o CPF do cliente a ser alterado<br>
  <input class='class02' name='cpf' type='text' id='cpf'>";
  ?>
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class='class01' type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit3" title="EDITAR">
      </div></td>
    </tr>
  </table>
</form>
<p>
  <? } ?>
  <?
 if($solicitacao=="editarclienteporcodigo"){ ?>
</p>
<form action="editar_cliente_por_codigo.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="30%"  border="0" align="center">
    <tr>
      <td width="10%" background="../../imagens/fundocelulas2.png"><div align="center">
        <?
      echo "Informe o Codigo do cliente a ser alterado<br>
  <input class='class02' name='codigo' type='text' id='codigo'>";
  ?>
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit4" title="EDITAR">
      </div></td>
    </tr>
  </table>
</form>
<p>
  <? } ?>
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="margem_a_verificar.php">
  <?

$sql = "SELECT * FROM margem_portabilidade where codigo = '$codigolancamento' and (status = 'Analisado' or status = 'Pendente') order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$cod_cli = $linha[18];

$nome = $linha[1];

$cpf = $linha[2];

$operador_solicitante = $linha[5];

$num_beneficio = $linha[8];

$num_beneficio2 = $linha[9];

$num_beneficio3 = $linha[10];

$num_beneficio4 = $linha[11];

$horacadastro = $linha[15];

$datacadastro = $linha[17];

$secretaria = $linha[21];

$status = $linha[19];

$tipo = $linha[20];

$rg = $linha[22];

$mae = $linha[23];

$data_nasc = $linha[24];

$senha_servidor = $linha[25];

$fazer_portabilidade = $linha[26];

$data_resposta = $linha[27];

$hora_resposta = $linha[28];

$obs = $linha[29];

$margem_disponivel = $linha[30];



?>
  <table width="100%" border="0" align="center">
    <tr>
      <td colspan="2" background="../../imagens/fundocelulas2.png">Resposta do pedido N&ordm; <? echo $codigolancamento; ?></td>
      <td width="6%" background="../../imagens/fundocelulas2.png">Status</td>
      <td width="11%" background="../../imagens/fundocelulas2.png"><table width="100%" border="1">
        <tr>
          <td><? echo $status; ?></td>
        </tr>
      </table></td>
      <td width="16%" background="../../imagens/fundocelulas2.png"><div align="center">Data / Hora da resposta: </div></td>
      <td width="21%" background="../../imagens/fundocelulas2.png"><table width="100%" border="1">
        <tr>
          <td><? echo "$data_resposta / $hora_resposta"; ?></td>
        </tr>
      </table></td>
      <td width="6%" background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td width="6%" background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td width="6%" background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td width="6%" background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr>
      <td width="15%" background="../../imagens/fundocelulas2.png">Margem Disponivel</td>
      <td colspan="2" background="../../imagens/fundocelulas2.png"><table width="100%" border="1">
        <tr>
          <td><? echo $margem_disponivel; ?></td>
        </tr>
      </table></td>
      <td background="../../imagens/fundocelulas2.png"><div align="right"></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center">CPF: <? echo $cpf; ?></div></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png">Observa&ccedil;&otilde;es</td>
      <td colspan="4" background="../../imagens/fundocelulas2.png"><table width="100%" border="1">
        <tr>
          <td><? echo $obs; ?></td>
        </tr>
      </table></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
  </table>
  <? } ?>
</form>
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="5" background="../../imagens/fundocelulas1.png"><div align="center"></div></td>
  </tr>
  <?

echo "<form name='form1' method='post' action='margem_a_verificar.php'>

  <tr>
    <td><div align='center'>
      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>
      <input name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
      <input name='cod_cli' type='hidden' id='cod_cli' value='$cod_cli'>
      <input name='status' type='hidden' id='status' value='A VERIFICAR'>
      Valor Parcela</div></td>
    <td><div align='center'>Banco a ser Portado</div></td>
    <td><div align='center'>Valor Liberado</div></td>
    <td><div align='center'>Parcelas em Aberto</div></td>
    <td><div align='center'>Prazo do contrato</div></td>
    <td><div align='center'>Faixa RCO</div></td>
  </tr>";
  

$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' and (status = 'Analisado' or status = 'Pendente') order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$pedido = $linha[0];
$valor_parcela = $linha[8];
$banco_a_ser_portado = $linha[9];
$valor_liberado = $linha[10];
$parcelas_em_aberto = $linha[11];
$prazo_do_contrato = $linha[12];
$faixa_rco = $linha[14];


echo "<tr>
          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_parcela</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$banco_a_ser_portado</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_liberado</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$parcelas_em_aberto</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$prazo_do_contrato</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$faixa_rco</div></td></tr></table></td>
        </tr>";
		
}
	

?>
</table>
<p>&nbsp;</p>
</body>
</html>
