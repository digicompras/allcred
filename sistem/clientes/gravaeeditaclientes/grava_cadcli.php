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

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?



require '../../conect/conect.php';

$date = date('Y-m-d');


$dia = date('d');
$mes = date('m');
$ano = date('Y');


?>

<?

// dados do cliente



$nome = $_POST['nome'];

$resposta = $_POST['resposta'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$cpf = $_POST['cpf'];

$status_cliente = $_POST['status_cliente'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$data_nasc = $_POST['data_nasc'];

$mes_niver = $_POST['mes_niver'];

$idade = $_POST['idade'];

$naturalidade = $_POST['naturalidade'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$email = $_POST['email'];

$datacadastro = $_POST['datacadastro'];

$horacadastro = $_POST['horacadastro'];

$tipo = $_POST['tipo'];

$banco = $_POST['banco'];

$agencia = $_POST['agencia'];

$conta = $_POST['conta'];

$num_beneficio = $_POST['num_beneficio'];

$num_beneficio2 = $_POST['num_beneficio2'];

$num_beneficio3 = $_POST['num_beneficio3'];

$num_beneficio4 = $_POST['num_beneficio4'];

$pagto_beneficio = $_POST['pagto_beneficio'];




$parc1 = $_POST['parc1'];

$banco1 = $_POST['banco1'];

$vencto1 = $_POST['vencto1'];

$compra1 = $_POST['compra1'];



$parc2 = $_POST['parc2'];

$banco2 = $_POST['banco2'];

$vencto2 = $_POST['vencto2'];

$compra2 = $_POST['compra2'];



$parc3 = $_POST['parc3'];

$banco3 = $_POST['banco3'];

$vencto3 = $_POST['vencto3'];

$compra3 = $_POST['compra3'];



$parc4 = $_POST['parc4'];

$banco4 = $_POST['banco4'];

$vencto4 = $_POST['vencto4'];

$compra4 = $_POST['compra4'];



$parc5 = $_POST['parc5'];

$banco5 = $_POST['banco5'];

$vencto5 = $_POST['vencto5'];

$compra5 = $_POST['compra5'];



$parc6 = $_POST['parc6'];

$banco6 = $_POST['banco6'];

$vencto6 = $_POST['vencto6'];

$compra6 = $_POST['compra6'];



$parc7 = $_POST['parc7'];

$banco7 = $_POST['banco7'];

$vencto7 = $_POST['vencto7'];

$compra7 = $_POST['compra7'];


$tem_margem = $_POST['tem_margem'];

$saldo1 = $_POST['saldo1'];

$saldo2 = $_POST['saldo2'];

$saldo3 = $_POST['saldo3'];

$saldo4 = $_POST['saldo4'];

$saldo5 = $_POST['saldo5'];

$saldo6 = $_POST['saldo6'];

$saldo7 = $_POST['saldo7'];

$dataprev = $_POST['dataprev'];


//dados do operador



$operador = $_POST['operador'];

$funcao_operador = $_POST['funcao_operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];



//dados do estabelecimento



$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];





// Observações



$obs = $_POST['obs'];


$secretaria = $_POST['secretaria'];
$senha_servidor = $_POST['senha_servidor'];
$categoria = $_POST['categoria'];


$valor_parcela = $_POST['valor_parcela'];
$saldo_devedor = $_POST['saldo_devedor'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_contrato = $_POST['prazo_contrato'];
$valorrenda = $_POST['valorrenda'];


?>



<?
//---------------------VALIDACAO DOS CAMPOS--------------------------------------------------


if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae)) or (empty($valorrenda)) or (empty($data_nasc)) or (empty($senha_servidor)) or (empty($idade)) ){ ?>

<script>

alert("ATENÇÃO!!!...\n                  <? echo "$operador"; ?> \n\nCAMPOS COM (*) SÃO OBRIGATORIOS! VERIFIQUE QUAL DOS CAMPOS OBRIGATORIOS ESTA SEM PREENCHER, VOCÊ DEVE PREENCHER TODOS PARA PROSSEGUIR COM O CADASTRO!. \n\n Nome* --->> <? echo "$nome"; ?> \n CPF* --->> <? echo "$cpf"; ?> \n RG* --->> <? echo "$rg"; ?> \n Data Nasc* --->> <? echo "$data_nasc"; ?> \n Telefone* --->> <? echo "$telefone"; ?> \n Celular* --->> <? echo "$celular"; ?> \n Nº Beneficio 1* --->> <? echo "$num_beneficio"; ?> \n Secretaria* --->> <? echo "$secretaria"; ?> \n Categoria* --->> <? echo "$categoria"; ?> \n Mãe* --->> <? echo "$mae"; ?> \n Valor Renda* --->> <? echo "$valorrenda"; ?>\n Senha Servidor* --->> <? echo "$senha_servidor"; ?>\n Idade* --->> <? echo "$idade"; ?>");

window.location = "cadcli_insert.php?nome=<? echo "$nome"; ?>&cpf=<? echo "$cpf"; ?>&telefone=<? echo "$telefone"; ?>&celular=<? echo "$celular"; ?>&num_beneficio=<? echo "$num_beneficio"; ?>&secretaria=<? echo "$secretaria"; ?>&categoria=<? echo "$categoria"; ?>&rg=<? echo "$rg"; ?>&mae=<? echo "$mae"; ?>&valorrenda=<? echo "$valorrenda"; ?>&senha_servidor=<? echo "$senha_servidor"; ?>&idade=<? echo "$idade"; ?>";

</script>

<?

}
else{

//-------------------FIM DA VALIDACAO DOS CAMPOS--------------------------------
?>






<?

$comando = "insert into clientes(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,tipo,banco,agencia,conta,num_beneficio,parc1,banco1,vencto1,compra1,parc2,banco2,vencto2,compra2,parc3,banco3,vencto3,compra3,parc4,banco4,vencto4,compra4,parc5,banco5,vencto5,compra5,parc6,banco6,vencto6,compra6,parc7,banco7,vencto7,compra7,num_beneficio2,num_beneficio3,num_beneficio4,dataprev,status_cliente,tem_margem,saldo1,saldo2,saldo3,saldo4,saldo5,saldo6,saldo7,naturalidade,pagto_beneficio,resposta,date,secretaria,senha_servidor,valor_parcela,saldo_devedor,parcelas_em_aberto,prazo_contrato,categoria,funcao_operador,valorrenda,idade)

values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$tipo','$banco','$agencia',

'$conta','$num_beneficio','$parc1','$banco1','$vencto1','$compra1','$parc2','$banco2','$vencto2','$compra2','$parc3','$banco3','$vencto3','$compra3','$parc4','$banco4','$vencto4','$compra4','$parc5','$banco5','$vencto5','$compra5','$parc6','$banco6','$vencto6','$compra6','$parc7','$banco7','$vencto7','$compra7','$num_beneficio2','$num_beneficio3','$num_beneficio4','$dataprev','$status_cliente','$tem_margem','$saldo1','$saldo2','$saldo3','$saldo4','$saldo5','$saldo6','$saldo7','$naturalidade','$pagto_beneficio','$resposta','$date','$secretaria','$senha_servidor','$valor_parcela','$saldo_devedor','$parcelas_em_aberto','$prazo_contrato','$categoria','$funcao_operador','$valorrenda','$idade')";



mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");





echo "Cliente cadastrado com sucesso!<br><br>";



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







<?

//$criar_pasta = $_POST['criar_pasta'];



//if($criar_pasta=="Sim") { 





//mkdir("../../$cpf");

//chmod ("../../$cpf",0755);



//}

?>







<?

$sql = "SELECT * FROM clientes order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

printf("O Nº da matrícula do cliente é: $linha[0]");

$cod_cli = $linha[0];

$nome = $linha[1];

$cpf = $linha[4];

$rg = $linha[5];

$data_nasc = $linha[8];

$mae = $linha[10];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$tipo = $linha[40];
$perfil = $linha[40];

$secretaria = $linha[124];

$senha_servidor = $linha[125];

$fazer_portabilidade = $linha[126];

$categoria = $linha[134];


?>



<? } ?>



<?

$sql = "SELECT * FROM allcred limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$email_allcred = $linha[14];



}

	

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO

	$email_dest   =   $email_allcred;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! você foi cadastrado na Allcred Financeira!   \n";

	$mens  .=  "Visite-nos www.allcredpromotora.com.br \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Especificação: ".$tipo."                                                    \n";

	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";

	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n";

	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Cliente cadastrado no sistema em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);

	



?>









<p>&nbsp;</p>

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
<?
$sql = "SELECT * FROM limite_possibilidades";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$limite_possibilidade = $linha[1];

}








$sql = "SELECT * FROM possibilidades where operador = '$operador' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_possibilidades = mysql_num_rows($res);

}





$saldo_possibilidades = bcsub($registros_possibilidades,$limite_possibilidade);

	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{


echo "$operador voce possui um saldo de $saldo_possibilidades consultas";

	  }

?>
</td>
  </tr>
  <tr>
    <td width="12%"><form name="form1" method="post" action="menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="hidden" name="codigolancamento" id="codigolancamento">
      <input type="hidden" name="solicitacao" id="solicitacao">
      <? 
	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{

	 echo "<input type='submit' name='Submit2' value='Voltar'>";
	 
	  }
	  ?>
    </form></td>
    <td width="21%"><form name="form1" method="post" action="cadcli_insert.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{

      echo "<input type='submit' name='Submit' value='Cadastrar outro Cliente'>";
	  
	  }
	  
	  ?>
    </form></td>
    <td width="28%"><form name="form1" method="post" action="../propostas/informacoes_antecedem_efetuar_proposta.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?

	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{

      echo "<input type='submit' name='Submit3' value='Preencher Proposta desse cliente'>
      <input name='cpf' type='hidden' id='cpf' value='$cpf'>
      <input name='tipo' type='hidden' id='tipo' value='$tipo'>";
	  
	  }
	  
	  ?>
    </form></td>
    <td width="39%"><form name="form1" method="post" action="ver_possibilidade.php">
      <?


$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





?>
      <input name="cod_cli" type="hidden" id="cod_cli" value="<? echo $cod_cli; ?>">
      <input name="status" type="hidden" id="status" value="<? echo "a responder"; ?>">
<input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="telefone" type="hidden" id="telefone" value="<? echo $telefone; ?>">
      <input name="celular" type="hidden" id="celular" value="<? echo $celular; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_operador; ?>">
      <input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
      <input name="num_beneficio2" type="hidden" id="num_beneficio2" value="<? echo $num_beneficio2; ?>">
      <input name="num_beneficio3" type="hidden" id="num_beneficio3" value="<? echo $num_beneficio3; ?>">
      <input name="num_beneficio4" type="hidden" id="num_beneficio4" value="<? echo $num_beneficio4; ?>">
      <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo $datacadastro; ?>">
      <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $horacadastro; ?>">
      <input name="perfil" type="hidden" id="perfil" value="<? echo $tipo; ?>">
      <input name="secretaria" type="hidden" id="secretaria" value="<? echo $secretaria; ?>">
      <input name="rg" type="hidden" id="rg" value="<? echo $rg; ?>">
      <input name="mae" type="hidden" id="mae" value="<? echo $mae; ?>">
      <input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>">
      
      <input name="senha_servidor" type="hidden" id="senha_servidor" value="<? echo $senha_servidor; ?>">
      <input name="fazer_portabilidade" type="hidden" id="fazer_portabilidade" value="<? echo $fazer_portabilidade; ?>">
      <?
	  	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{

if($registros_possibilidades >= $limite_possibilidade){
	

	
echo "Prezado $operador voce ja atingiu o limite de $limite_possibilidade solicitacoes";
	
}
else{
	
echo "<input type='submit' name='Submit4' value='Ver Possibilidade'>";

}

	  }
?>
    </form></td>
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
    <td><?
$sql = "SELECT * FROM limite_margem_portabilidade";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$limite_portabilidade = $linha[1];

}

$sql = "SELECT * FROM margem_portabilidade where operador = '$operador_alterou' and mes = '$mes' and ano = '$ano' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_portabilidade = mysql_num_rows($res);

}



$saldo_portabilidade = bcsub($limite_portabilidade,$registros_portabilidade);

if($saldo_portabilidade>=1){


	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{
		  
$sql = "SELECT * FROM margem_portabilidade where cpf = '$cpf' and status = 'Pendente' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_portabilidade_cliente = mysql_num_rows($res);

$num_pedido_ver_margem = $linha[0];
$status = $linha[19];


}



echo "$operador_alterou voce possui um saldo de $saldo_portabilidade consultas";

if($registros_portabilidade_cliente>=1){
	
echo "Cliente possui pedido de portabilidade n&ordm; $num_pedido_ver_margem com status $status favor aguardar...";

}

	  }
	  
}
else{
	
echo "$operador_alterou voce esta sem saldo para consultas";
	
}
	  
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form name="form2" method="post" action="ver_margem.php">
      <?
	  


$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





?>
      <input name="cod_cli" type="hidden" id="cod_cli" value="<? echo $cod_cli; ?>">
      <input name="status" type="hidden" id="status" value="<? echo "A VERIFICAR"; ?>">
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="telefone" type="hidden" id="telefone" value="<? echo $telefone; ?>">
      <input name="celular" type="hidden" id="celular" value="<? echo $celular; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_operador; ?>">
      <input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
      <input name="num_beneficio2" type="hidden" id="num_beneficio6" value="<? echo $num_beneficio2; ?>">
      <input name="num_beneficio3" type="hidden" id="num_beneficio7" value="<? echo $num_beneficio3; ?>">
      <input name="num_beneficio4" type="hidden" id="num_beneficio8" value="<? echo $num_beneficio4; ?>">
      <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo $datacadastro; ?>">
      <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $horacadastro; ?>">
      <input name="perfil" type="hidden" id="perfil" value="<? echo $tipo; ?>">
      <input name="secretaria" type="hidden" id="secretaria" value="<? echo $secretaria; ?>">
      <input name="rg" type="hidden" id="rg" value="<? echo $rg; ?>">
      <input name="mae" type="hidden" id="mae" value="<? echo $mae; ?>">
      <input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>">
      <input name="senha_servidor" type="hidden" id="senha_servidor" value="<? echo $senha_servidor; ?>">
      <input name="fazer_portabilidade" type="hidden" id="fazer_portabilidade" value="<? echo $fazer_portabilidade; ?>">
      <input name="categoria" type="hidden" id="categoria" value="<? echo $categoria; ?>">
      
<?

	  if((empty($nome)) or (empty($cpf)) or (empty($telefone)) or (empty($celular)) or (empty($num_beneficio)) or (empty($secretaria)) or (empty($categoria)) or (empty($rg)) or (empty($mae))){ 
	  }
	  else{

if($registros_portabilidade >= $limite_portabilidade){
	
echo "Prezado $operador voce ja atingiu o limite de $limite_possibilidade solicitacoes";
	
}
else{

echo "<input type='submit' name='Submit5' value='Ver Margem/Portabilidade'>";
	  

}

	  }
	  ?>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>