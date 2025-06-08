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
</head>

<?

require '../../conect/conect.php';


error_reporting(E_ALL);

$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];


?>

<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha' limit 1";
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
//$meta = $linha[55];
//$status = $linha[56];
//$bloqueio_parcial = $linha[57];
//$tempo_almoco = $linha[58];



}

?>



<?			
$sql = "SELECT * FROM fundo_navegacao";
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
<table width="100%" border="0">
    <tr>
      <td width="19%">&nbsp;</td>
      <td colspan="2"><div align="center"><strong><font color="#0000FF" size="4">O que deseja fazer com os clientes?</font></strong></div></td>
      <td width="2%">&nbsp;</td>
    </tr>
    <tr>
      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td><form name="form2" method="post" action="menu.php">
        <div align="center"> <strong>Pesquisa por n&ordm; de Pedido de Margem / Portabilidade</strong>
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class='class02' name="codigolancamento" type="text" id="codigolancamento" value="<? echo $codigolancamento; ?>" size="10">
          <input class='class02' name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir"; ?>">
          <input class='class01' type="submit" name="button2" id="button2" value="Pesquisar">
        </div>
      </form></td>
      <td width="29%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
<p>&nbsp; </p>
<table width="100%" border="0">
  <tr>
    <td width="16%"><div align="center"></div></td>
    <td width="19%"><div align="center">
      <form action="pesquiza_cpf.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit2" value="Cadastrar Cliente ">
      </form>
    </div></td>
    <td width="23%"><div align="center">
      <form name="form3" method="post" action="informe_cpf_para_edicao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <? if($funcao<>"Agente"){ echo"<input class='class01' type='submit' name='Submit3' value='Editar Cliente por CPF'>"; } ?>
      </form>
    </div></td>
    <td width="28%"><div align="center">
      <form name="form5" method="post" action="informe_codigo_para_edicao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <? if($funcao<>"Agente"){ echo"<input class='class01' type='submit' name='button' id='button' value='Editar Cliente por N&ordm; de Matr&iacute;cula'>";  }?>
      </form>
    </div></td>
    <td width="14%"><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="margem_a_verificar.php">
  <?
//----------------------INICIO DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="responder"){

$codigolancamento = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$date_gravar = date('Y-m-d');
$hora_gravar = date('H:i:s');
$status = $_POST['status'];
$operador_gravar = $_POST['operador'];

$margem_disponivel = $_POST['margem_disponivel'];
$obs = $_POST['obs'];

$valor_parcela = $_POST['valor_parcela'];
$saldo_devedor = $_POST['saldo_devedor'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_contrato = $_POST['prazo_contrato'];
$aprovacao = $_POST['aprovacao'];
$valor_liberado = $_POST['valor_liberado'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`margem_portabilidade` set `data_resposta` = '$date_gravar',`hora_resposta` = '$hora_gravar',`status` = '$status',`margem_disponivel` = '$margem_disponivel',`obs` = '$obs' where `margem_portabilidade`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo_parcelas_pedido_margem = $linha[0];


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `pedido` = '$codigolancamento',`status` = '$status' where `parcelas_pedido_margem`. `codigo` = '$codigo_parcelas_pedido_margem'";
}

mysql_query($comando,$conexao);

}




}


//---------------------FIM DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR------------------------
?>
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
      <td colspan="2">Resposta do pedido N&ordm; <? echo $codigolancamento; ?></td>
      <td width="6%">Status</td>
      <td width="11%"><table width="100%" border="1">
        <tr>
          <td><? echo $status; ?></td>
        </tr>
      </table></td>
      <td width="16%"><div align="center">Data / Hora da resposta: </div></td>
      <td width="21%"><table width="100%" border="1">
        <tr>
          <td><? echo "$data_resposta / $hora_resposta"; ?></td>
        </tr>
      </table></td>
      <td width="6%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
    </tr>
    <tr>
      <td width="15%">Margem Disponivel</td>
      <td colspan="2"><table width="100%" border="1">
        <tr>
          <td><? echo $margem_disponivel; ?></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Observa&ccedil;&otilde;es</td>
      <td colspan="4"><table width="100%" border="1">
        <tr>
          <td><? echo $obs; ?></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <? } ?>
</form>
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="5"><div align="center"></div></td>
  </tr>
  <?

echo "<form name='form1' method='post' action=''>

  <tr>
    <td><div align='center'>
      <input class='class02' name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>
      <input class='class02' name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
      <input class='class02' name='status' type='hidden' id='status' value='A VERIFICAR'>
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
