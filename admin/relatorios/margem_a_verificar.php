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

<title>LISTANDO TODOS OS PEDIDOS DE POSSIBILIDADES DO PERIODO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style3 {font-size: 10px}
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 18px}
.style5 {font-size: 24px}

-->

</style>
</head>

<?



require '../../conect/conect.php';

$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_respondeu = $linha[1];

}


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>

<?

if($solicitacao=="gravar_parcela"){

$pedido = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$nome_gravar = $_POST['nome'];
$cpf_gravar = $_POST['cpf'];
$operador_gravar = $_POST['operador'];
$date = date('Y-m-d');
$hora = date('H:i:s');
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$status = $_POST['status'];
$faixa_rco = $_POST['faixa_rco'];




$comando = "insert into parcelas_pedido_margem(pedido,cod_cli,nome,cpf,operador,date,hora,valor_parcela,banco_a_ser_portado,valor_liberado,parcelas_em_aberto,prazo_do_contrato,status,faixa_rco) values('$pedido','$cod_cli_gravar','$nome_gravar','$cpf_gravar','$operador_gravar','$date','$hora','$valor_parcela','$banco_a_ser_portado','$valor_liberado','$parcelas_em_aberto','$prazo_do_contrato','$status','$faixa_rco')";



mysql_query($comando,$conexao) or die("Erro ao gravar parcelas para esse pedido!");




}


?>



<?

if($solicitacao=="altera_parcela"){

$pedido = $_POST['pedido'];
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$faixa_rco = $_POST['faixa_rco'];




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `valor_parcela` = '$valor_parcela',`banco_a_ser_portado` = '$banco_a_ser_portado',`valor_liberado` = '$valor_liberado',`parcelas_em_aberto` = '$parcelas_em_aberto',`prazo_do_contrato` = '$prazo_do_contrato',`faixa_rco` = '$faixa_rco' where `parcelas_pedido_margem`. `codigo` = '$pedido'";
}

mysql_query($comando,$conexao);




}


?>



<body bgcolor="#ffffff" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];


}


?>









<p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <p><br>

  <?

//$nome_operador = $_POST['nome_operador'];

//$data_inicial = $_POST['data_inicial'];

//$data_final = $_POST['data_final'];




$sql = "SELECT * FROM margem_portabilidade where (status = 'A VERIFICAR' or status = 'Pendente' or status = 'a responder')";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?><br>
        
      <?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>
      <table width="100%"  border="0" align="center">
        <tr>
          <td colspan="5"><div align="center"><span class="style2">
          
            Listando todos os pedidos de verifica&ccedil;&atilde;o de margem da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td><div align="center">Total de Clientes para verificar margem</div></td>
          <td width="26%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="20%"><div align="center"><strong><? echo " $registros";?></strong></div></td>
          <td colspan="3"><div align="center">
            <form name="form2" method="post" action="margem_a_verificar.php">
              <div align="center"> <strong>Pesquisa por n&ordm; de Pedido</strong>
<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                <input class='class02' name="codigolancamento" type="text" id="codigolancamento" value="<? if($solicitacao == "responder"){
					
					
				}
				else{
					echo $codigolancamento; 
					
				}
					?>" size="10">
                <input class='class02' name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir"; ?>">
                <input class='class01' type="submit" name="button2" id="button2" value="Pesquisar">
</div>
            </form>
          </div></td>
          <td width="22%"><div align="center"></div></td>
        </tr>
      </table>
<table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
          <td colspan="2"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
</table>
<form name="form1" method="post" action="margem_a_verificar.php">
<?
//----------------------INICIO DA GRAVAÇÃO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="responder"){

$codigolancamento = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$date_gravar = date('Y-m-d');
$hora_gravar = date('H:i:s');
$status = $_POST['status'];
$operador_gravar = $_POST['operador'];
$senha_servidor = $_POST['senha_servidor'];

$margem_disponivel = $_POST['margem_disponivel'];
$margem_disponivel2 = $_POST['margem_disponivel2'];
$margem_rmc = $_POST['margem_rmc'];

$bco_operacao1 = $_POST['bco_operacao1'];
$bco_operacao2 = $_POST['bco_operacao2'];


$obs = $_POST['obs'];

$valor_parcela = $_POST['valor_parcela'];
$saldo_devedor = $_POST['saldo_devedor'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_contrato = $_POST['prazo_contrato'];
$aprovacao = $_POST['aprovacao'];
$valor_liberado = $_POST['valor_liberado'];
$faixa_rco = $_POST['faixa_rco'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`margem_portabilidade` set `data_resposta` = '$date_gravar',`hora_resposta` = '$hora_gravar',`status` = '$status',`margem_disponivel` = '$margem_disponivel',`margem_disponivel2` = '$margem_disponivel2',`bco_operacao1` = '$bco_operacao1',`bco_operacao2` = '$bco_operacao2',`obs` = '$obs',`margem_rmc` = '$margem_rmc' where `margem_portabilidade`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`clientes` set `senha_servidor` = '$senha_servidor' where `clientes`. `codigo` = '$cod_cli_gravar' limit 1 ";
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


//---------------------FIM DA GRAVAÇÃO E ENVIO PARA O OPERADOR------------------------
?>


        <?
if($solicitacao =="responder"){
	
	
}
else{

$sql = "SELECT * FROM margem_portabilidade where codigo = '$codigolancamento' and (status = 'A VERIFICAR' or status = 'Pendente' or status = 'a responder') order by codigo asc";

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

$obs = $linha[29];

$margem_disponivel = $linha[30];

$margem_disponivel2 = $linha[31];

$margem_rmc = $linha[35];

$email_cliente = $linha[36];

$sql2 = "SELECT * FROM clientes where codigo = '$cod_cli'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$categoria = $linha[134];

$senha_servidor_cli = $linha[125];


}
?>


<table width="100%" border="0">
  <tr>
    <td colspan="2">Cliente: <? echo $nome; ?></td>
    <td colspan="3">E-Mail: <? echo $email_cliente; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">CPF: <? echo $cpf; ?></td>
    <td colspan="3">Categoria: <? echo $categoria; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Resposta do pedido Nº <? echo $codigolancamento; ?></td>
    <td width="15%">Status
      <select class='class02' name="status" id="status">
        <option selected><? echo $status; ?></option>
        <option>Analisado</option>
        <option>Pendente</option>
      </select></td>
    <td colspan="2"><div align="left">Data / Hora Solicita&ccedil;&atilde;o<? echo " $datacadastro - $horacadastro"; ?></div></td>
    <td colspan="2">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Operador Solicitante: <? echo "$operador_solicitante"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="12%">Margem Disponivel 1</td>
    <td><input class='class02' name="margem_disponivel" type="text" id="margem_disponivel" value="<? echo $margem_disponivel; ?>"></td>
    <td><div align="right">Bco Opera&ccedil;&atilde;o</div></td>
    <td width="15%"><strong><font color="#0000FF">
      <select class='class02' name="bco_operacao1" id="select7">
        <option selected="selected"><? echo $bco_operacao1; ?></option>
        <?





    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
      </select>
    </font></strong></td>
    <td width="8%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Margem Disponivel 2</td>
    <td width="17%"><input class='class02' name="margem_disponivel2" type="text" id="margem_disponivel2" value="<? echo $margem_disponivel; ?>"></td>
    <td><div align="right">Bco Opera&ccedil;&atilde;o</div></td>
    <td><strong><font color="#0000FF">
      <select class='class02' name="bco_operacao2" id="bco_operacao">
        <option selected="selected"><? echo $bco_operacao1; ?></option>
        <?





    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
      </select>
    </font></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Margem p/ RMC</td>
    <td><input class='class02' type="text" name="margem_rmc" id="margem_rmc" value="<? echo $margem_rmc; ?>"></td>
    <td><div align="right">Senha Servidor</div></td>
    <td><input class='class02' type="text" name="senha_servidor" id="senha_servidor" value="<? echo $senha_servidor_cli; ?>"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Observa&ccedil;&otilde;es</td>
    <td colspan="3"><textarea class='class02' name="obs" cols="45" rows="3"  id="obs"><? echo $obs; ?> </textarea>
      <input class='class01' type="submit" name="Submit2" value="Responder">
      <input class='class02' name="solicitacao" type="hidden" id="solicitacao" value="responder">
      <input class='class02' name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
      <input class='class02' name="cod_cli" type="hidden" id="cod_cli" value="<? echo $cod_cli; ?>">
      <input class='class02' name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input class='class02' name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input class='class02' name="operador" type="hidden" id="operador" value="<? echo $operador_respondeu; ?>"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<? } 

}
?>
</form>

<table width="100%" border="0">
  <tr>
    <td colspan="5"><div align="center">
      <form name="form1" method="post" action="margem_a_verificar.php">
        <input class='class02' name="solicitacao" type="hidden" id="solicitacao" value="incluir_parcela">
        <input class='class02' name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
        <input class='class01' type="submit" name="Submit3" value="Incluir Parcela">
      </form>
    </div></td>
  </tr>
  <?
  echo "<table width='100%' border='0'>
<tr>
	<td><div align='center'>Valor Parcela</div></td>
    <td><div align='center'>Banco a ser Portado</div></td>
    <td><div align='center'>Valor Liberado</div></td>
    <td><div align='center'>Parcelas em Aberto</div></td>
    <td><div align='center'>Prazo do contrato</div></td>
    <td><div align='center'>Faixa RCO</div></td>
</tr>";

if($solicitacao == "responder"){
	
	
}
else{

$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' and (status = 'A VERIFICAR' or status = 'Pendente') order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$pedido = $linha[0];
$valor_parcela = $linha[8];
$banco_a_ser_portado = $linha[9];
$valor_liberado = $linha[10];
$parcelas_em_aberto = $linha[11];
$prazo_do_contrato = $linha[12];
$faixa_rco = $linha[14];

if($solicitacao == "editar"){
	
echo "<form name='form1' method='post' action='margem_a_verificar.php'>
<input class='class02' name='pedido' type='hidden' id='pedido' value='$pedido'>
<input class='class02' name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
<input class='class02' name='solicitacao' type='hidden' id='solicitacao' value='altera_parcela'>
<tr>
          <td><div align='center'><input class='class02' name='valor_parcela' type='text' id='valor_parcela' value='$valor_parcela'></div></td>
    <td><div align='center'><input class='class02' name='banco_a_ser_portado' type='text' id='banco_a_ser_portado' value='$banco_a_ser_portado'></div></td>
    <td><div align='center'><input class='class02' name='valor_liberado' type='text' id='valor_liberado' value='$valor_liberado'></div></td>
    <td><div align='center'><input class='class02' name='parcelas_em_aberto' type='text' id='parcelas_em_aberto' value='$parcelas_em_aberto'></div></td>
    <td><div align='center'><input class='class02' name='prazo_do_contrato' type='text' id='prazo_do_contrato' value='$prazo_do_contrato'></div></td>
    <td><div align='center'><input class='class02' name='faixa_rco' type='text' id='faixa_rco' value='$faixa_rco'></div></td>
	<td><div align='center'><input class='class01' type='submit' name='Submit2' value='Alterar'></div></td>
        </tr>
		
		</form>";
	
	
}
else{

echo "<form name='form1' method='post' action='margem_a_verificar.php'>
<input class='class02' name='num_pedido' type='hidden' id='num_pedido' value='$pedido'>
<input class='class02' name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
<input class='class02' name='solicitacao' type='hidden' id='solicitacao' value='editar'>
<tr>
          <td><div align='center'>$valor_parcela</div></td>
          <td><div align='center'>$banco_a_ser_portado</div></td>
          <td><div align='center'>$valor_liberado</div></td>
          <td><div align='center'>$parcelas_em_aberto</div></td>
          <td><div align='center'>$prazo_do_contrato</div></td>
          <td><div align='center'>$faixa_rco</div></td>
		  <td><div align='center'><input class='class01' type='submit' name='Submit2' value='Editar'></div></td>
        </tr>
		
		</form>";
		
}
		
}


}
?>
<?
if($solicitacao == "incluir_parcela"){

echo "<form name='form1' method='post' action='margem_a_verificar.php'>

  <tr>
    <td><div align='center'>
      <input class='class02' name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>
      <input class='class02' name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
      <input class='class02' name='cod_cli' type='hidden' id='cod_cli' value='$cod_cli'>
      <input class='class02' name='status' type='hidden' id='status' value='A VERIFICAR'></div></td>
    
  </tr>
  
  <tr>
    <td><div align='center'><input class='class02' name='valor_parcela' type='text' id='valor_parcela' value=''></div></td>
    <td><div align='center'><input class='class02' name='banco_a_ser_portado' type='text' id='banco_a_ser_portado' value=''></div></td>
    <td><div align='center'><input class='class02' name='valor_liberado' type='text' id='valor_liberado' value=''></div></td>
    <td><div align='center'><input class='class02' name='parcelas_em_aberto' type='text' id='parcelas_em_aberto' value=''></div></td>
    <td><div align='center'><input class='class02' name='prazo_do_contrato' type='text' id='prazo_do_contrato' value=''></div></td>
    <td><div align='center'><input class='class02' name='faixa_rco' type='text' id='faixa_rco' value=''></div></td>
	<td><div align='center'><input class='class01' type='submit' name='Submit2' value='Gravar Parcela'></div></td>
  </tr>
  </form>";
  
}

?>
</table>
<p align="center">
  <?
  
if(($solicitacao == "abrir") or ($solicitacao == "incluir_parcela") or ($solicitacao == "editar") or ($solicitacao == "altera_parcela") or ($solicitacao == "gravar_parcela")){
	
	
}
else{

$sql = "SELECT * FROM margem_portabilidade where (status = 'A VERIFICAR' or status = 'Pendente' or status = 'a responder') order by codigo asc";

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







?>
</p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Pedido</div></td>
          <td class="style3"><div align="center">Operador</div></td>

          <td><div align="center" class="style3">Perfil</div></td>
          <td class="style3"><div align="center">Secretaria</div></td>
          <td><div align="center" class="style3">Nome</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td class="style3"><div align="center">RG</div></td>

          <td><div align="center" class="style3">M&atilde;e</div></td>
          <td><div align="center" class="style3">Data Nasc.</div></td>
          <td><div align="center"> <span class="style3">Benef&iacute;cio 1</span></div></td>
          <td><div align="center" class="style3">Beneficio 2</div></td>

          <td><div align="center"><span class="style3">Senha Servidor</span></div></td>

          <td><div align="center" class="style3">Status</div>            </td>
  </tr>

		

        <tr>

          <td width="5%">               <form name="form2" method="post" action="margem_a_verificar.php">
            <div align="center" class="style3">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input class='class02' name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
            <input class='class02' name="codigo_abrir" type="hidden" id="codigo_abrir" value="<? echo $cod_cli; ?>">
            <input class='class02' name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir"; ?>">
            <input class='class02' name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            <? echo "<input class='class01' type='submit' name='button' id='button' value='$codigolancamento'>"; ?>
            </div>
          </form></td>
          <td width="13%" class="style3"><div align="center"><span class="style3"><? echo $operador_solicitante;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $tipo;?></span></div></td>
          <td width="5%" class="style3"><div align="center"><span class="style3"><? echo $secretaria;?></span></div></td>
          <td width="15%"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
          <td width="7%"><div align="center" class="style3"><? echo $cpf;?></div></td>
          <td width="7%" class="style3"><div align="center"><span class="style3"><? echo $rg;?></span></div></td>

          <td width="9%"><div align="center"><span class="style3"></span><span class="style3"><? echo $mae;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"></span><span class="style3"><? echo $data_nasc;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $num_beneficio;?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $num_beneficio2;?></span></div></td>

          <td width="6%"><div align="center"><span class="style3"><? echo $senha_servidor;?></span></div></td>

          <td width="8%">

          <div align="center" class="style3"><? echo $status;?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>





<? } 

}
?>
        </table>

<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

