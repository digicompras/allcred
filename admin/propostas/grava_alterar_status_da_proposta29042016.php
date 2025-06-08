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

</style>

</head>



<?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL & E_Notice);


$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>



		  

		  

		  <?



// dados da proposta

$num_proposta = $_POST['num_proposta'];

$nome_operador = $_POST['nome_operador'];

$status = $_POST['status'];

$mes_ano_status = $_POST['mes_ano_status'];

$retorno = $_POST['retorno'];

$bco_operacao = $_POST['bco_operacao'];

$tabela = $_POST['tabela'];

$valor_a_receber = $_POST['valor_a_receber'];

$valor_credito = $_POST['valor_credito'];

$dataalteracao = $_POST['dataalteracao'];

$horaalteracao = $_POST['horaalteracao'];

$valor_liberado = $_POST['valor_liberado'];

//$tipo_capital = $_POST['tipo_capital'];

$recebido = $_POST['recebido'];

$parcela = $_POST['parcela'];

$quant_parc = $_POST['quant_parc'];

$percentual_op = $_POST['percentual_op'];

$comissao_op = $_POST['comissao_op'];

$obs2 = $_POST['obs2'];

$cpf = $_POST['cpf'];

$campanha = $_POST['campanha'];

$valor_total = $_POST['valor_total'];

$valor_liquido_cliente = $_POST['valor_liquido_cliente'];

$num_contrato_bco = $_POST['num_contrato_bco'];

$dia_vencto = $_POST['dia_parc'];

$dia_parc = $_POST['dia_parc'];

$mes_parc = $_POST['mes_parc'];

$ano_parc = $_POST['ano_parc'];

$percentual_entrada = $_POST['percentual_entrada'];


//---------CALCULO DA META-----------------------


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$meta_mensal = $linha[55];


}

$sub_calculo_meta = bcdiv($valor_a_receber,$meta_mensal,5);
$meta = bcmul($sub_calculo_meta,100,2);






//---------FIM DO CALCULO DA META-------------------


// a função explode é usada para separar uma string em

// uma matriz de strings usando um delimitador



$dataalteracao_sistema = $dataalteracao;

$dataalteracao_sistema2 = explode("-", $dataalteracao_sistema);



$dia_alteracao_status = $dataalteracao_sistema2[0];

$mes_alteracao_status = $dataalteracao_sistema2[1];

$ano_alteracao_status = $dataalteracao_sistema2[2];


$data_alteracao = "$ano_alteracao_status-$mes_alteracao_status-$dia_alteracao_status";


//dados do operador que alterou





$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento que alterou



$estabelecimento_alterou = $_POST['estabelecimento_alterou'];

$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];

$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];

$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];




//--------------------------------INICIO DOS LANÇAMENTOS DO CONTAS A RECEBER--------------------------------------------------------



if($status=="AVERBADO"){

//$data_do_cadastro = date('Y-m-d');


if(($mes_parc=="02") or ($mes_parc=="2")){
if($dia_vencto>="29"){
$dia_parc = "28";
}
}
else{	
$dia_parc = $dia_vencto;
}

$datacadastro = "$dia_parc-$mes_parc-$ano_parc";
$datecadastro = "$ano_parc-$mes_parc-$dia_parc";
$hora_baixa = date('H:i:s');
$horacadastro = date('H:i:s');

//$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

//$quant_parc = $_POST['quant_parc'];


$percentual_entrada = $_POST['percentual_entrada'];
$percentual_entrada_decimal = $_POST['percentual_entrada']/100;

$valor_entrada = bcmul($valor_liquido_cliente,$percentual_entrada_decimal,2);
$calculo_valor_parcela =bcsub($valor_a_receber_gravar,$valor_entrada,2);

$valor_parcela = bcdiv($calculo_valor_parcela,$quant_parc,2);



//---------------verifica quantidade de parcelas-----------------------

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$verifica_quant_parc = $linha[26];

}

if($quant_parc<>$verifica_quant_parc){
	
$sql = "SELECT * FROM contas_a_receber where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigo_contas_a_receber = $linha['0'];

	
$comando = "delete from `contas_a_receber` where `contas_a_receber`. `codigo` = '$codigo_contas_a_receber'";

mysql_query($comando,$conexao);	

}
	
}

//---------------fim da verificacao da quantidade de parcelas---------------------





$sql = "SELECT * FROM contas_a_receber where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);


$data_geracao = $linha['2'];
$hora_geracao = $linha['3'];

}


if($registros>="1"){
	
$sql = "SELECT * FROM contas_a_receber where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registros_afetados = mysql_num_rows($res);


$cod_contas_a_receber = $linha['0'];



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$db = $linha['1'];
	
}


$comando = "update `$db`.`contas_a_receber` set `bco_operacao` = '$bco_operacao',`dataalteracao` = '$data_alteracao',`horaalteracao` = '$horaalteracao',`valor_a_receber` = '$valor_a_receber_gravar',`valor_credito` = '$valor_credito',`valor_total` = '$valor_total',`valor_liquido_cliente` = '$valor_liquido_cliente' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber'";



mysql_query($comando,$conexao);

}

	
//echo "<br><br>ATENÇÃO!!!... O CONTAS A RECEBER REFERENTE A PROPOSTA $num_proposta JÁ FOI GERADO EM $data_geracao AS $hora_geracao<br><br> FORAM ATUALIZADOS $registros_afetados REGISTROS NO CONTAS A RECEBER!";
	
}
else{


$vencto_entrada = "$ano_parc-$mes_parc-$dia_parc";

if($percentual_entrada<>0){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_entrada','$vencto_entrada','Em Aberto','$quant_parc','0','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a Entrada no contas a receber!");

}






if($mes_parc<=9){
$soma_vencto1 = "0".bcadd($mes_parc,1);
}
else{
$soma_vencto1 = bcadd($mes_parc,1);
}

if($soma_vencto1>12){
$mes_parc1 = "01";
}else{
$mes_parc1 = $mes_parc;
}
if($soma_vencto1>12){
$ano_parc1 = bcadd($ano_parc,1);
}else{
$ano_parc1 = $ano_parc;
}

if(($mes_parc1=="02") or ($mes_parc1=="2")){
if($dia_vencto>="29"){
$dia_parc1 = "28";
}
else{
$dia_parc1 = $dia_vencto;
}
}
else{
	
$dia_parc1 = $dia_vencto;
	
}


$vencto1 = "$ano_parc1-$mes_parc1-$dia_parc1";

if($quant_parc>=1){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto1','Em Aberto','$quant_parc','1','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade no contas a receber!");

}


//if($mes_parc1<=9){
//$soma_vencto2 = "0".bcadd($mes_parc1,0);
//}
//else{
//$soma_vencto2 = bcadd($mes_parc1,0);
//}

if($mes_parc1<=9){
$soma_vencto2 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2 = bcadd($mes_parc1,1);
}

if($soma_vencto2>12){
$mes_parc2 = "01";
}else{
$mes_parc2 = $soma_vencto2;
}
if($soma_vencto2>12){
$ano_parc2 = bcadd($ano_parc1,1);
}else{
$ano_parc2 = $ano_parc1;
}

if(($mes_parc2=="02") or ($mes_parc2=="2")){
if($dia_vencto>="29"){
$dia_parc2 = "28";
}
else{
$dia_parc2 = $dia_vencto;
}
}
else{
	
$dia_parc2 = $dia_vencto;
	
}


$vencto2 = "$ano_parc2-$mes_parc2-$dia_parc2";

if($quant_parc>=2){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto2','Em Aberto','$quant_parc','2','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade no contas a receber!");

}



//if($mes_parc2<=9){
//$soma_vencto3 = "0".bcadd($mes_parc2,0);
//}
//else{
//$soma_vencto3 = bcadd($mes_parc2,0);
//}

if($mes_parc2<=9){
$soma_vencto3 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3 = bcadd($mes_parc2,1);
}

if($soma_vencto3>12){
$mes_parc3 = "01";
}else{
$mes_parc3 = $soma_vencto3;
}
if($soma_vencto3>12){
$ano_parc3 = bcadd($ano_parc2,1);
}else{
$ano_parc3 = $ano_parc2;
}

if(($mes_parc3=="02") or ($mes_parc3=="2")){
if($dia_vencto>="29"){
$dia_parc3 = "28";
}
else{
$dia_parc3 = $dia_vencto;
}
}
else{
	
$dia_parc3 = $dia_vencto;
	
}

$vencto3 = "$ano_parc3-$mes_parc3-$dia_parc3";

if($quant_parc>=3){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto3','Em Aberto','$quant_parc','3','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade no contas a receber!");

}



//if($mes_parc3<=9){
//$soma_vencto4 = "0".bcadd($mes_parc3,0);
//}
//else{
//$soma_vencto4 = bcadd($mes_parc3,0);
//}

if($mes_parc3<=9){
$soma_vencto4 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4 = bcadd($mes_parc3,1);
}

if($soma_vencto4>12){
$mes_parc4 = "01";
}else{
$mes_parc4 = $soma_vencto4;
}
if($soma_vencto3>12){
$ano_parc4 = bcadd($ano_parc3,1);
}else{
$ano_parc4 = $ano_parc3;
}

if(($mes_parc4=="02") or ($mes_parc4=="2")){
if($dia_vencto>="29"){
$dia_parc4 = "28";
}
else{
$dia_parc4 = $dia_vencto;
}
}
else{
	
$dia_parc4 = $dia_vencto;
	
}

$vencto4 = "$ano_parc4-$mes_parc4-$dia_parc4";

if($quant_parc>=4){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto4','Em Aberto','$quant_parc','4','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade no contas a receber!");

}





//if($mes_parc4<=9){
//$soma_vencto5 = "0".bcadd($mes_parc4,0);
//}
//else{
//$soma_vencto5 = bcadd($mes_parc4,0);
//}

if($mes_parc4<=9){
$soma_vencto5 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5 = bcadd($mes_parc4,1);
}

if($soma_vencto5>12){
$mes_parc5 = "01";
}else{
$mes_parc5 = $soma_vencto5;
}
if($soma_vencto5>12){
$ano_parc5 = bcadd($ano_parc4,1);
}else{
$ano_parc5 = $ano_parc4;
}

if(($mes_parc5=="02") or ($mes_parc5=="2")){
if($dia_vencto>="29"){

$dia_parc5 = "28";
}
else{
$dia_parc5 = $dia_vencto;
}
}
else{
	
$dia_parc5 = $dia_vencto;
	
}

$vencto5 = "$ano_parc5-$mes_parc5-$dia_parc5";

if($quant_parc>=5){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto5','Em Aberto','$quant_parc','5','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade no contas a receber!");

}





//if($mes_parc5<=9){
//$soma_vencto6 = "0".bcadd($mes_parc5,0);
//}
//else{
//$soma_vencto6 = bcadd($mes_parc5,0);
//}

if($mes_parc5<=9){
$soma_vencto6 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6 = bcadd($mes_parc5,1);
}

if($soma_vencto6>12){
$mes_parc6 = "01";
}else{
$mes_parc6 = $soma_vencto6;
}
if($soma_vencto6>12){
$ano_parc6 = bcadd($ano_parc5,1);
}else{
$ano_parc6 = $ano_parc5;
}

if(($mes_parc6=="02") or ($mes_parc6=="2")){
if($dia_vencto>="29"){
$dia_parc6 = "28";
}
else{
$dia_parc6 = $dia_vencto;
}
}
else{
	
$dia_parc6 = $dia_vencto;
	
}

$vencto6 = "$ano_parc6-$mes_parc6-$dia_parc6";

if($quant_parc>=6){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto6','Em Aberto','$quant_parc','6','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade no contas a receber!");

}





//if($mes_parc6<=9){
//$soma_vencto7 = "0".bcadd($mes_parc6,0);
//}
//else{
//$soma_vencto7 = bcadd($mes_parc6,0);
//}

if($mes_parc6<=9){
$soma_vencto7 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7 = bcadd($mes_parc6,1);
}

if($soma_vencto7>12){
$mes_parc7 = "01";
}else{
$mes_parc7 = $soma_vencto7;
}
if($soma_vencto7>12){
$ano_parc7 = bcadd($ano_parc6,1);
}else{
$ano_parc7 = $ano_parc6;
}

if(($mes_parc7=="02") or ($mes_parc7=="2")){
if($dia_vencto>="29"){
$dia_parc7 = "28";
}
else{
$dia_parc7 = $dia_vencto;
}
}
else{
	
$dia_parc7 = $dia_vencto;
	
}

$vencto7 = "$ano_parc7-$mes_parc7-$dia_parc7";

if($quant_parc>=7){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto7','Em Aberto','$quant_parc','7','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade no contas a receber!");

}





//if($mes_parc7<=9){
//$soma_vencto8 = "0".bcadd($mes_parc7,0);
//}
//else{
//$soma_vencto8 = bcadd($mes_parc7,0);
//}

if($mes_parc7<=9){
$soma_vencto8 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8 = bcadd($mes_parc7,1);
}

if($soma_vencto8>12){
$mes_parc8 = "01";
}else{
$mes_parc8 = $soma_vencto8;
}
if($soma_vencto8>12){
$ano_parc8 = bcadd($ano_parc7,1);
}else{
$ano_parc8 = $ano_parc7;
}

if(($mes_parc8=="02") or ($mes_parc8=="2")){
if($dia_vencto>="29"){
$dia_parc8 = "28";
}
else{
$dia_parc8 = $dia_vencto;
}
}
else{
	
$dia_parc8 = $dia_vencto;
	
}

$vencto8 = "$ano_parc8-$mes_parc8-$dia_parc8";

if($quant_parc>=8){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto8','Em Aberto','$quant_parc','8','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade no contas a receber!");

}





//if($mes_parc8<=9){
//$soma_vencto9 = "0".bcadd($mes_parc8,0);
//}
//else{
//$soma_vencto9 = bcadd($mes_parc8,0);
//}

if($mes_parc8<=9){
$soma_vencto9 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9 = bcadd($mes_parc8,1);
}

if($soma_vencto9>12){
$mes_parc9 = "01";
}else{
$mes_parc9 = $soma_vencto9;
}
if($soma_vencto9>12){
$ano_parc9 = bcadd($ano_parc8,1);
}else{
$ano_parc9 = $ano_parc8;
}

if(($mes_parc9=="02") or ($mes_parc9=="2")){
if($dia_vencto>="29"){
$dia_parc9 = "28";
}
else{
$dia_parc9 = $dia_vencto;
}
}
else{
	
$dia_parc9 = $dia_vencto;
	
}

$vencto9 = "$ano_parc9-$mes_parc9-$dia_parc9";

if($quant_parc>=9){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto9','Em Aberto','$quant_parc','9','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade no contas a receber!");

}






//if($mes_parc9<=9){
//$soma_vencto10 = "0".bcadd($mes_parc9,0);
//}
//else{
//$soma_vencto10 = bcadd($mes_parc10,0);
//}

if($mes_parc9<=9){
$soma_vencto10 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10 = bcadd($mes_parc9,1);
}

if($soma_vencto10>12){
$mes_parc10 = "01";
}else{
$mes_parc10 = $soma_vencto10;
}

if($soma_vencto10>12){
$ano_parc10 = bcadd($ano_parc9,1);
}else{
$ano_parc10 = $ano_parc9;
}

if(($mes_parc10=="02") or ($mes_parc10=="2")){
if($dia_vencto>="29"){
$dia_parc10 = "28";
}
else{
$dia_parc10 = $dia_vencto;
}
}
else{
	
$dia_parc10 = $dia_vencto;
	
}

$vencto10= "$ano_parc10-$mes_parc10-$dia_parc10";

if($quant_parc>=10){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto10','Em Aberto','$quant_parc','10','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade no contas a receber!");

}





//if($mes_parc10<=9){
//$soma_vencto11 = "0".bcadd($mes_parc10,0);
//}
//else{
//$soma_vencto11 = bcadd($mes_parc10,0);
//}

if($mes_parc10<=9){
$soma_vencto11 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11 = bcadd($mes_parc10,1);
}

if($soma_vencto11>12){
$mes_parc11 = "01";
}else{
$mes_parc11 = $soma_vencto11;
}
if($soma_vencto11>12){
$ano_parc11 = bcadd($ano_parc10,1);
}else{
$ano_parc11 = $ano_parc10;
}

if(($mes_parc11=="02") or ($mes_parc11=="2")){
if($dia_vencto>="29"){
$dia_parc11 = "28";
}
else{
$dia_parc11 = $dia_vencto;
}
}
else{
	
$dia_parc11 = $dia_vencto;
	
}

$vencto11 = "$ano_parc11-$mes_parc11-$dia_parc11";

if($quant_parc>=11){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto11','Em Aberto','$quant_parc','11','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade no contas a receber!");

}





//if($mes_parc11<=9){
//$soma_vencto12 = "0".bcadd($mes_parc11,0);
//}
//else{
//$soma_vencto12 = bcadd($mes_parc11,0);
//}

if($mes_parc11<=9){
$soma_vencto12 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12 = bcadd($mes_parc11,1);
}

if($soma_vencto12>12){
$mes_parc12 = "01";
}else{
$mes_parc12 = $soma_vencto12;
}
if($soma_vencto12>12){
$ano_parc12 = bcadd($ano_parc11,1);
}else{
$ano_parc12 = $ano_parc11;
}

if(($mes_parc12=="02") or ($mes_parc12=="2")){
if($dia_vencto>="29"){
$dia_parc12 = "28";
}
else{
$dia_parc12 = $dia_vencto;
}
}
else{
	
$dia_parc12 = $dia_vencto;
	
}

$vencto12 = "$ano_parc12-$mes_parc12-$dia_parc12";

if($quant_parc>=12){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto12','Em Aberto','$quant_parc','12','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade no contas a receber!");

}






//if($mes_parc12<=9){
//$soma_vencto13 = "0".bcadd($mes_parc12,0);
//}
//else{
//$soma_vencto13 = bcadd($mes_parc12,0);
//}

if($mes_parc12<=9){
$soma_vencto13 = "0".bcadd($mes_parc12,1);
}
else{
$soma_vencto13 = bcadd($mes_parc12,1);
}

if($soma_vencto13>12){
$mes_parc13 = "01";
}else{
$mes_parc13 = $soma_vencto13;
}
if($soma_vencto13>12){
$ano_parc13 = bcadd($ano_parc12,1);
}else{
$ano_parc13 = $ano_parc12;
}

if(($mes_parc13=="02") or ($mes_parc13=="2")){
if($dia_vencto>="29"){
$dia_parc13 = "28";
}
else{
$dia_parc13 = $dia_vencto;
}
}
else{
	
$dia_parc13 = $dia_vencto;
	
}

$vencto13 = "$ano_parc13-$mes_parc13-$dia_parc13";

if($quant_parc>=13){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto13','Em Aberto','$quant_parc','13','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 13º mensalidade no contas a receber!");

}





//if($mes_parc13<=9){
//$soma_vencto14 = "0".bcadd($mes_parc13,0);
//}
//else{
//$soma_vencto14 = bcadd($mes_parc13,0);
//}

if($mes_parc13<=9){
$soma_vencto14 = "0".bcadd($mes_parc13,1);
}
else{
$soma_vencto14 = bcadd($mes_parc13,1);
}

if($soma_vencto14>12){
$mes_parc14 = "01";
}else{
$mes_parc14 = $soma_vencto14;
}
if($soma_vencto14>12){
$ano_parc14 = bcadd($ano_parc13,1);
}else{
$ano_parc14 = $ano_parc13;
}

if(($mes_parc14=="02") or ($mes_parc14=="2")){
if($dia_vencto>="29"){
$dia_parc14 = "28";
}
else{
$dia_parc14 = $dia_vencto;
}
}
else{
	
$dia_parc14 = $dia_vencto;
	
}

$vencto14 = "$ano_parc14-$mes_parc14-$dia_parc14";

if($quant_parc>=14){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto14','Em Aberto','$quant_parc','14','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 14º mensalidade no contas a receber!");

}





//if($mes_parc14<=9){
//$soma_vencto15 = "0".bcadd($mes_parc14,0);
//}
//else{
//$soma_vencto15 = bcadd($mes_parc14,0);
//}

if($mes_parc14<=9){
$soma_vencto15 = "0".bcadd($mes_parc14,1);
}
else{
$soma_vencto15 = bcadd($mes_parc14,1);
}

if($soma_vencto15>12){
$mes_parc15 = "01";
}else{
$mes_parc15 = $soma_vencto15;
}
if($soma_vencto15>12){
$ano_parc15 = bcadd($ano_parc14,1);
}else{
$ano_parc15 = $ano_parc14;
}

if(($mes_parc15=="02") or ($mes_parc15=="2")){
if($dia_vencto>="29"){
$dia_parc15 = "28";
}
else{
$dia_parc15 = $dia_vencto;
}
}

else{
	
$dia_parc15 = $dia_vencto;
	
}

$vencto15 = "$ano_parc15-$mes_parc15-$dia_parc15";

if($quant_parc>=15){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto15','Em Aberto','$quant_parc','15','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 15º mensalidade no contas a receber!");

}





if($mes_parc15<=9){
$soma_vencto16 = bcadd($mes_parc15,1);
}
else{
$soma_vencto16 = bcadd($mes_parc15,1);
}
if($soma_vencto16>12){
$mes_parc16 = "01";
}else{
$mes_parc16 = $soma_vencto16;
}
if($soma_vencto16>12){
$ano_parc16 = bcadd($ano_parc15,1);
}else{
$ano_parc16 = $ano_parc15;
}

if(($mes_parc16=="02") or ($mes_parc16=="2")){
if($dia_vencto>="29"){
$dia_parc16 = "28";
}
else{
$dia_parc16 = $dia_vencto;
}

}
else{
$dia_parc16 = $dia_vencto;
}

$vencto16 = "$ano_parc16-$mes_parc16-$dia_parc16";

if($quant_parc>=16){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto16','Em Aberto','$quant_parc','16','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 16º mensalidade no contas a receber!");

}





if($mes_parc16<=9){
$soma_vencto17 = bcadd($mes_parc16,1);
}
else{
$soma_vencto17 = bcadd($mes_parc16,1);
}
if($soma_vencto17>12){
$mes_parc17 = "01";
}else{
$mes_parc17 = $soma_vencto17;
}
if($soma_vencto17>12){
$ano_parc17 = bcadd($ano_parc16,1);
}else{
$ano_parc17 = $ano_parc16;
}

if(($mes_parc17=="02") or ($mes_parc17=="2")){
if($dia_vencto>="29"){
$dia_parc17 = "28";
}
else{
$dia_parc17 = $dia_vencto;
}

}
else{
$dia_parc17 = $dia_vencto;
}

$vencto17 = "$ano_parc17-$mes_parc17-$dia_parc17";

if($quant_parc>=17){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto17','Em Aberto','$quant_parc','17','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 17º mensalidade no contas a receber!");

}





if($mes_parc17<=9){
$soma_vencto18 = bcadd($mes_parc17,1);
}
else{
$soma_vencto18 = bcadd($mes_parc17,1);
}
if($soma_vencto18>12){
$mes_parc18 = "01";
}else{
$mes_parc18 = $soma_vencto18;
}
if($soma_vencto18>12){
$ano_parc18 = bcadd($ano_parc17,1);
}else{
$ano_parc18 = $ano_parc17;
}

if(($mes_parc18=="02") or ($mes_parc18=="2")){
if($dia_vencto>="29"){
$dia_parc18 = "28";
}
else{
$dia_parc18 = $dia_vencto;
}

}
else{
$dia_parc18 = $dia_vencto;
}

$vencto18 = "$ano_parc18-$mes_parc18-$dia_parc18";

if($quant_parc>=18){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto18','Em Aberto','$quant_parc','18','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 18º mensalidade no contas a receber!");

}





if($mes_parc18<=9){
$soma_vencto19 = bcadd($mes_parc18,1);
}
else{
$soma_vencto19 = bcadd($mes_parc18,1);
}
if($soma_vencto19>12){
$mes_parc19 = "01";
}else{
$mes_parc19 = $soma_vencto19;
}
if($soma_vencto19>12){
$ano_parc19 = bcadd($ano_parc18,1);
}else{
$ano_parc19 = $ano_parc18;
}

if(($mes_parc19=="02") or ($mes_parc19=="2")){
if($dia_vencto>="29"){
$dia_parc19 = "28";
}
else{
$dia_parc19 = $dia_vencto;
}

}
else{
$dia_parc19 = $dia_vencto;
}

$vencto19 = "$ano_parc19-$mes_parc19-$dia_parc19";

if($quant_parc>=19){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto19','Em Aberto','$quant_parc','19','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 19º mensalidade no contas a receber!");

}





if($mes_parc19<=9){
$soma_vencto20 = bcadd($mes_parc19,1);
}
else{
$soma_vencto20 = bcadd($mes_parc19,1);
}
if($soma_vencto20>12){
$mes_parc20 = "01";
}else{
$mes_parc20 = $soma_vencto20;
}
if($soma_vencto20>12){
$ano_parc20 = bcadd($ano_parc19,1);
}else{
$ano_parc20 = $ano_parc19;
}

if(($mes_parc20=="02") or ($mes_parc20=="2")){
if($dia_vencto>="29"){
$dia_parc20 = "28";
}
else{
$dia_parc20 = $dia_vencto;
}

}
else{
$dia_parc20 = $dia_vencto;
}

$vencto20 = "$ano_parc20-$mes_parc20-$dia_parc20";

if($quant_parc>=20){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto20','Em Aberto','$quant_parc','20','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 20º mensalidade no contas a receber!");

}





if($mes_parc20<=9){
$soma_vencto21 = bcadd($mes_parc20,1);
}
else{
$soma_vencto21 = bcadd($mes_parc20,1);
}
if($soma_vencto21>12){
$mes_parc21 = "01";
}else{
$mes_parc21 = $soma_vencto21;
}
if($soma_vencto21>12){
$ano_parc21 = bcadd($ano_parc20,1);
}else{
$ano_parc21 = $ano_parc20;
}

if(($mes_parc21=="02") or ($mes_parc21=="2")){
if($dia_vencto>="29"){
$dia_parc21 = "28";
}
else{
$dia_parc21 = $dia_vencto;
}

}
else{
$dia_parc21 = $dia_vencto;
}

$vencto21 = "$ano_parc21-$mes_parc21-$dia_parc21";

if($quant_parc>=21){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto21','Em Aberto','$quant_parc','21','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 21º mensalidade no contas a receber!");

}





if($mes_parc21<=9){
$soma_vencto22 = bcadd($mes_parc21,1);
}
else{
$soma_vencto22 = bcadd($mes_parc21,1);
}
if($soma_vencto22>12){
$mes_parc22 = "01";
}else{
$mes_parc22 = $soma_vencto22;
}
if($soma_vencto22>12){
$ano_parc22 = bcadd($ano_parc21,1);
}else{
$ano_parc22 = $ano_parc21;
}

if(($mes_parc22=="02") or ($mes_parc22=="2")){
if($dia_vencto>="29"){
$dia_parc22 = "28";
}
else{
$dia_parc22 = $dia_vencto;
}

}
else{
$dia_parc22 = $dia_vencto;
}

$vencto22 = "$ano_parc22-$mes_parc22-$dia_parc22";

if($quant_parc>=22){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto22','Em Aberto','$quant_parc','22','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 22º mensalidade no contas a receber!");

}





if($mes_parc22<=9){
$soma_vencto23 = bcadd($mes_parc22,1);
}
else{
$soma_vencto23 = bcadd($mes_parc22,1);
}
if($soma_vencto23>12){
$mes_parc23 = "01";
}else{
$mes_parc23 = $soma_vencto23;
}
if($soma_vencto23>12){
$ano_parc23 = bcadd($ano_parc22,1);
}else{
$ano_parc23 = $ano_parc22;
}

if(($mes_parc23=="02") or ($mes_parc23=="2")){
if($dia_vencto>="29"){
$dia_parc23 = "28";
}
else{
$dia_parc23 = $dia_vencto;
}

}
else{
$dia_parc23 = $dia_vencto;
}

$vencto23 = "$ano_parc23-$mes_parc23-$dia_parc23";

if($quant_parc>=23){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto23','Em Aberto','$quant_parc','23','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 23º mensalidade no contas a receber!");

}





if($mes_parc23<=9){
$soma_vencto24 = bcadd($mes_parc23,1);
}
else{
$soma_vencto24 = bcadd($mes_parc23,1);
}
if($soma_vencto24>12){
$mes_parc24 = "01";
}else{
$mes_parc24 = $soma_vencto24;
}
if($soma_vencto24>12){
$ano_parc24 = bcadd($ano_parc23,1);
}else{
$ano_parc24 = $ano_parc23;
}

if(($mes_parc24=="02") or ($mes_parc24=="2")){
if($dia_vencto>="29"){
$dia_parc24 = "28";
}
else{
$dia_parc24 = $dia_vencto;
}
}
else{
$dia_parc24 = $dia_vencto;
}

$vencto24 = "$ano_parc24-$mes_parc24-$dia_parc24";

if($quant_parc>=24){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto24','Em Aberto','$quant_parc','24','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 24º mensalidade no contas a receber!");

}





if($mes_parc24<=9){
$soma_vencto25 = bcadd($mes_parc24,1);
}
else{
$soma_vencto25 = bcadd($mes_parc24,1);
}
if($soma_vencto25>12){
$mes_parc25 = "01";
}else{
$mes_parc25 = $soma_vencto25;
}
if($soma_vencto25>12){
$ano_parc25 = bcadd($ano_parc24,1);
}else{
$ano_parc25 = $ano_parc24;
}

if(($mes_parc25=="02") or ($mes_parc25=="2")){
if($dia_vencto>="29"){
$dia_parc25 = "28";
}
else{
$dia_parc25 = $dia_vencto;
}

}
else{
$dia_parc25 = $dia_vencto;
}

$vencto25 = "$ano_parc25-$mes_parc25-$dia_parc25";

if($quant_parc>=25){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto25','Em Aberto','$quant_parc','25','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 25º mensalidade no contas a receber!");

}





if($mes_parc25<=9){
$soma_vencto26 = bcadd($mes_parc25,1);
}
else{
$soma_vencto26 = bcadd($mes_parc25,1);
}
if($soma_vencto26>12){
$mes_parc26 = "01";
}else{
$mes_parc26 = $soma_vencto26;
}
if($soma_vencto26>12){
$ano_parc26 = bcadd($ano_parc25,1);
}else{
$ano_parc26 = $ano_parc25;
}

if(($mes_parc26=="02") or ($mes_parc26=="2")){
if($dia_vencto>="29"){
$dia_parc26 = "28";
}
else{
$dia_parc26 = $dia_vencto;
}

}
else{
$dia_parc26 = $dia_vencto;
}

$vencto26 = "$ano_parc26-$mes_parc26-$dia_parc26";

if($quant_parc>=26){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto26','Em Aberto','$quant_parc','26','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 26º mensalidade no contas a receber!");

}





if($mes_parc26<=9){
$soma_vencto27 = bcadd($mes_parc26,1);
}
else{
$soma_vencto27 = bcadd($mes_parc26,1);
}
if($soma_vencto27>12){
$mes_parc27 = "01";
}else{
$mes_parc27 = $soma_vencto27;
}
if($soma_vencto27>12){
$ano_parc27 = bcadd($ano_parc26,1);
}else{
$ano_parc27 = $ano_parc26;
}

if(($mes_parc27=="02") or ($mes_parc27=="2")){
if($dia_vencto>="29"){
$dia_parc27 = "28";
}
else{
$dia_parc27 = $dia_vencto;
}

}
else{
$dia_parc27 = $dia_vencto;
}

$vencto27 = "$ano_parc27-$mes_parc27-$dia_parc27";

if($quant_parc>=27){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto27','Em Aberto','$quant_parc','27','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 27º mensalidade no contas a receber!");

}





if($mes_parc27<=9){
$soma_vencto28 = bcadd($mes_parc27,1);
}
else{
$soma_vencto28 = bcadd($mes_parc27,1);
}
if($soma_vencto28>12){
$mes_parc28 = "01";
}else{
$mes_parc28 = $soma_vencto28;
}
if($soma_vencto28>12){
$ano_parc28 = bcadd($ano_parc27,1);
}else{
$ano_parc28 = $ano_parc27;
}

if(($mes_parc28=="02") or ($mes_parc28=="2")){
if($dia_vencto>="29"){
$dia_parc28 = "28";
}
else{
$dia_parc28 = $dia_vencto;
}

}
else{
$dia_parc28 = $dia_vencto;
}

$vencto28 = "$ano_parc28-$mes_parc28-$dia_parc28";

if($quant_parc>=28){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto28','Em Aberto','$quant_parc','28','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 28º mensalidade no contas a receber!");

}





if($mes_parc28<=9){
$soma_vencto29 = bcadd($mes_parc28,1);
}
else{
$soma_vencto29 = bcadd($mes_parc28,1);
}
if($soma_vencto29>12){
$mes_parc29 = "01";
}else{
$mes_parc29 = $soma_vencto29;
}
if($soma_vencto29>12){
$ano_parc29 = bcadd($ano_parc28,1);
}else{
$ano_parc29 = $ano_parc28;
}

if(($mes_parc29=="02") or ($mes_parc29=="2")){
if($dia_vencto>="29"){
$dia_parc29 = "28";
}
else{
$dia_parc29 = $dia_vencto;
}

}
else{
$dia_parc29 = $dia_vencto;
}

$vencto29 = "$ano_parc29-$mes_parc29-$dia_parc29";

if($quant_parc>=29){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto29','Em Aberto','$quant_parc','29','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 29º mensalidade no contas a receber!");

}





if($mes_parc29<=9){
$soma_vencto30 = bcadd($mes_parc29,1);
}
else{
$soma_vencto30 = bcadd($mes_parc29,1);
}
if($soma_vencto30>12){
$mes_parc30 = "01";
}else{
$mes_parc30 = $soma_vencto30;
}
if($soma_vencto30>12){
$ano_parc30 = bcadd($ano_parc29,1);
}else{
$ano_parc30 = $ano_parc29;
}

if(($mes_parc30=="02") or ($mes_parc30=="2")){
if($dia_vencto>="29"){
$dia_parc30 = "28";
}
else{
$dia_parc30 = $dia_vencto;
}

}
else{
$dia_parc30 = $dia_vencto;
}

$vencto30 = "$ano_parc30-$mes_parc30-$dia_parc30";

if($quant_parc>=30){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto30','Em Aberto','$quant_parc','30','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 30º mensalidade no contas a receber!");

}






if($mes_parc30<=9){
$soma_vencto31 = bcadd($mes_parc30,1);
}
else{
$soma_vencto31 = bcadd($mes_parc30,1);
}
if($soma_vencto31>12){
$mes_parc31 = "01";
}else{
$mes_parc31 = $soma_vencto31;
}
if($soma_vencto31>12){
$ano_parc31 = bcadd($ano_parc30,1);
}else{
$ano_parc31 = $ano_parc30;
}

if(($mes_parc31=="02") or ($mes_parc31=="2")){
if($dia_vencto>="29"){
$dia_parc31 = "28";
}
else{
$dia_parc31 = $dia_vencto;
}

}
else{
$dia_parc31 = $dia_vencto;
}

$vencto31 = "$ano_parc31-$mes_parc31-$dia_parc31";

if($quant_parc>=31){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto31','Em Aberto','$quant_parc','31','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 31º mensalidade no contas a receber!");

}





if($mes_parc31<=9){
$soma_vencto32 = bcadd($mes_parc31,1);
}
else{
$soma_vencto32 = bcadd($mes_parc31,1);
}
if($soma_vencto32>12){
$mes_parc32 = "01";
}else{
$mes_parc32 = $soma_vencto32;
}
if($soma_vencto32>12){
$ano_parc32 = bcadd($ano_parc31,1);
}else{
$ano_parc32 = $ano_parc31;
}

if(($mes_parc32=="02") or ($mes_parc32=="2")){
if($dia_vencto>="29"){
$dia_parc32 = "28";
}
else{
$dia_parc32 = $dia_vencto;
}

}
else{
$dia_parc32 = $dia_vencto;
}

$vencto32 = "$ano_parc32-$mes_parc32-$dia_parc32";

if($quant_parc>=32){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto32','Em Aberto','$quant_parc','32','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 32º mensalidade no contas a receber!");

}





if($mes_parc32<=9){
$soma_vencto33 = bcadd($mes_parc32,1);
}
else{
$soma_vencto33 = bcadd($mes_parc32,1);
}
if($soma_vencto33>12){
$mes_parc33 = "01";
}else{
$mes_parc33 = $soma_vencto33;
}
if($soma_vencto33>12){
$ano_parc33 = bcadd($ano_parc32,1);
}else{
$ano_parc33 = $ano_parc32;
}

if(($mes_parc33=="02") or ($mes_parc33=="2")){
if($dia_vencto>="29"){
$dia_parc33 = "28";
}
else{
$dia_parc33 = $dia_vencto;
}

}
else{
$dia_parc33 = $dia_vencto;
}

$vencto33 = "$ano_parc33-$mes_parc33-$dia_parc33";

if($quant_parc>=33){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto33','Em Aberto','$quant_parc','33','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 33º mensalidade no contas a receber!");

}





if($mes_parc33<=9){
$soma_vencto34 = bcadd($mes_parc33,1);
}
else{
$soma_vencto34 = bcadd($mes_parc33,1);
}
if($soma_vencto34>12){
$mes_parc34 = "01";
}else{
$mes_parc34 = $soma_vencto34;
}
if($soma_vencto34>12){
$ano_parc34 = bcadd($ano_parc33,1);
}else{
$ano_parc34 = $ano_parc33;
}

if(($mes_parc34=="02") or ($mes_parc34=="2")){
if($dia_vencto>="29"){
$dia_parc34 = "28";
}
else{
$dia_parc34 = $dia_vencto;
}

}
else{
$dia_parc34 = $dia_vencto;
}

$vencto34 = "$ano_parc34-$mes_parc34-$dia_parc34";

if($quant_parc>=34){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto34','Em Aberto','$quant_parc','34','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 34º mensalidade no contas a receber!");

}





if($mes_parc34<=9){
$soma_vencto35 = bcadd($mes_parc34,1);
}
else{
$soma_vencto35 = bcadd($mes_parc34,1);
}
if($soma_vencto35>12){
$mes_parc35 = "01";
}else{
$mes_parc35 = $soma_vencto35;
}
if($soma_vencto35>12){
$ano_parc35 = bcadd($ano_parc34,1);
}else{
$ano_parc35 = $ano_parc34;
}

if(($mes_parc35=="02") or ($mes_parc35=="2")){
if($dia_vencto>="29"){
$dia_parc35 = "28";
}
else{
$dia_parc35 = $dia_vencto;
}

}
else{
$dia_parc35 = $dia_vencto;
}

$vencto35 = "$ano_parc35-$mes_parc35-$dia_parc35";

if($quant_parc>=35){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto35','Em Aberto','$quant_parc','35','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 35º mensalidade no contas a receber!");

}





if($mes_parc35<=9){
$soma_vencto36 = bcadd($mes_parc35,1);
}
else{
$soma_vencto36 = bcadd($mes_parc35,1);
}
if($soma_vencto36>12){
$mes_parc36 = "01";
}else{
$mes_parc36 = $soma_vencto36;
}
if($soma_vencto36>12){
$ano_parc36 = bcadd($ano_parc35,1);
}else{
$ano_parc36 = $ano_parc35;
}

if(($mes_parc36=="02") or ($mes_parc36=="2")){
if($dia_vencto>="29"){
$dia_parc36 = "28";
}
else{
$dia_parc36 = $dia_vencto;
}

}
else{
$dia_parc36 = $dia_vencto;
}

$vencto36 = "$ano_parc36-$mes_parc36-$dia_parc36";

if($quant_parc>=36){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto36','Em Aberto','$quant_parc','36','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 36º mensalidade no contas a receber!");

}





if($mes_parc36<=9){
$soma_vencto37 = bcadd($mes_parc36,1);
}
else{
$soma_vencto37 = bcadd($mes_parc36,1);
}
if($soma_vencto37>12){
$mes_parc37 = "01";
}else{
$mes_parc37 = $soma_vencto37;
}
if($soma_vencto37>12){
$ano_parc37 = bcadd($ano_parc36,1);
}else{
$ano_parc37 = $ano_parc36;
}

if(($mes_parc37=="02") or ($mes_parc37=="2")){
if($dia_vencto>="29"){
$dia_parc37 = "28";
}
else{
$dia_parc37 = $dia_vencto;
}

}
else{
$dia_parc37 = $dia_vencto;
}

$vencto37 = "$ano_parc37-$mes_parc37-$dia_parc37";

if($quant_parc>=37){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto37','Em Aberto','$quant_parc','37','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 37º mensalidade no contas a receber!");

}





if($mes_parc37<=9){
$soma_vencto38 = bcadd($mes_parc37,1);
}
else{
$soma_vencto38 = bcadd($mes_parc37,1);
}
if($soma_vencto38>12){
$mes_parc38 = "01";
}else{
$mes_parc38 = $soma_vencto38;
}
if($soma_vencto38>12){
$ano_parc38 = bcadd($ano_parc37,1);
}else{
$ano_parc38 = $ano_parc37;
}

if(($mes_parc38=="02") or ($mes_parc38=="2")){
if($dia_vencto>="29"){
$dia_parc38 = "28";
}
else{
$dia_parc38 = $dia_vencto;
}

}
else{
$dia_parc38 = $dia_vencto;
}

$vencto38 = "$ano_parc38-$mes_parc38-$dia_parc38";

if($quant_parc>=38){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto38','Em Aberto','$quant_parc','38','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 38º mensalidade no contas a receber!");

}






if($mes_parc38<=9){
$soma_vencto39 = bcadd($mes_parc38,1);
}
else{
$soma_vencto39 = bcadd($mes_parc38,1);
}
if($soma_vencto39>12){
$mes_parc39 = "01";
}else{
$mes_parc39 = $soma_vencto39;
}
if($soma_vencto39>12){
$ano_parc39 = bcadd($ano_parc38,1);
}else{
$ano_parc39 = $ano_parc38;
}

if(($mes_parc39=="02") or ($mes_parc39=="2")){
if($dia_vencto>="29"){
$dia_parc39 = "28";
}
else{
$dia_parc39 = $dia_vencto;
}

}
else{
$dia_parc39 = $dia_vencto;
}

$vencto39 = "$ano_parc39-$mes_parc39-$dia_parc39";

if($quant_parc>=39){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto39','Em Aberto','$quant_parc','39','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 39º mensalidade no contas a receber!");

}





if($mes_parc39<=9){
$soma_vencto40 = bcadd($mes_parc39,1);
}
else{
$soma_vencto40 = bcadd($mes_parc39,1);
}
if($soma_vencto40>12){
$mes_parc40 = "01";
}else{
$mes_parc40 = $soma_vencto40;
}
if($soma_vencto40>12){
$ano_parc40 = bcadd($ano_parc39,1);
}else{
$ano_parc40 = $ano_parc39;
}

if(($mes_parc40=="02") or ($mes_parc40=="2")){
if($dia_vencto>="29"){
$dia_parc40 = "28";
}
else{
$dia_parc40 = $dia_vencto;
}

}
else{
$dia_parc40 = $dia_vencto;
}

$vencto40 = "$ano_parc40-$mes_parc40-$dia_parc40";

if($quant_parc>=40){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto40','Em Aberto','$quant_parc','40','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 40º mensalidade no contas a receber!");

}





if($mes_parc40<=9){
$soma_vencto41 = bcadd($mes_parc40,1);
}
else{
$soma_vencto41 = bcadd($mes_parc40,1);
}
if($soma_vencto40>12){
$mes_parc41 = "01";
}else{
$mes_parc41 = $soma_vencto41;
}
if($soma_vencto41>12){
$ano_parc41 = bcadd($ano_parc40,1);
}else{
$ano_parc41 = $ano_parc40;
}

if(($mes_parc41=="02") or ($mes_parc41=="2")){
if($dia_vencto>="29"){
$dia_parc41 = "28";
}
else{
$dia_parc41 = $dia_vencto;
}

}
else{
$dia_parc41 = $dia_vencto;
}

$vencto41 = "$ano_parc41-$mes_parc41-$dia_parc41";

if($quant_parc>=41){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto41','Em Aberto','$quant_parc','41','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 41º mensalidade no contas a receber!");

}





if($mes_parc41<=9){
$soma_vencto42 = bcadd($mes_parc41,1);
}
else{
$soma_vencto42 = bcadd($mes_parc41,1);
}
if($soma_vencto42>12){
$mes_parc42 = "01";
}else{
$mes_parc42 = $soma_vencto42;
}
if($soma_vencto42>12){
$ano_parc42 = bcadd($ano_parc41,1);
}else{
$ano_parc42 = $ano_parc41;
}

if(($mes_parc42=="02") or ($mes_parc42=="2")){
if($dia_vencto>="29"){
$dia_parc42 = "28";
}
else{
$dia_parc42 = $dia_vencto;
}

}
else{
$dia_parc42 = $dia_vencto;
}

$vencto42 = "$ano_parc42-$mes_parc42-$dia_parc42";

if($quant_parc>=42){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto42','Em Aberto','$quant_parc','42','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 42º mensalidade no contas a receber!");

}





if($mes_parc42<=9){
$soma_vencto43 = bcadd($mes_parc42,1);
}
else{
$soma_vencto43 = bcadd($mes_parc42,1);
}
if($soma_vencto43>12){
$mes_parc43 = "01";
}else{
$mes_parc43 = $soma_vencto43;
}
if($soma_vencto43>12){
$ano_parc43 = bcadd($ano_parc42,1);
}else{
$ano_parc43 = $ano_parc42;
}

if(($mes_parc43=="02") or ($mes_parc43=="2")){
if($dia_vencto>="29"){
$dia_parc43 = "28";
}
else{
$dia_parc43 = $dia_vencto;
}

}
else{
$dia_parc43 = $dia_vencto;
}

$vencto43 = "$ano_parc43-$mes_parc43-$dia_parc43";

if($quant_parc>=43){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto43','Em Aberto','$quant_parc','43','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 43º mensalidade no contas a receber!");

}





if($mes_parc43<=9){
$soma_vencto44 = bcadd($mes_parc43,1);
}
else{
$soma_vencto44 = bcadd($mes_parc43,1);
}
if($soma_vencto44>12){
$mes_parc44 = "01";
}else{
$mes_parc44 = $soma_vencto44;
}
if($soma_vencto44>12){
$ano_parc44 = bcadd($ano_parc43,1);
}else{
$ano_parc44 = $ano_parc43;
}

if(($mes_parc44=="02") or ($mes_parc44=="2")){
if($dia_vencto>="29"){
$dia_parc44 = "28";
}
else{
$dia_parc44 = $dia_vencto;
}

}
else{
$dia_parc44 = $dia_vencto;
}

$vencto44 = "$ano_parc44-$mes_parc44-$dia_parc44";

if($quant_parc>=44){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto44','Em Aberto','$quant_parc','44','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 44º mensalidade no contas a receber!");

}





if($mes_parc44<=9){
$soma_vencto45 = bcadd($mes_parc44,1);
}
else{
$soma_vencto45 = bcadd($mes_parc44,1);
}
if($soma_vencto45>12){
$mes_parc45 = "01";
}else{
$mes_parc45 = $soma_vencto45;
}
if($soma_vencto45>12){
$ano_parc45 = bcadd($ano_parc44,1);
}else{
$ano_parc45 = $ano_parc44;
}

if(($mes_parc45=="02") or ($mes_parc45=="2")){
if($dia_vencto>="29"){
$dia_parc45 = "28";
}
else{
$dia_parc45 = $dia_vencto;
}

}
else{
$dia_parc45 = $dia_vencto;
}

$vencto45 = "$ano_parc45-$mes_parc45-$dia_parc45";

if($quant_parc>=45){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto45','Em Aberto','$quant_parc','45','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 45º mensalidade no contas a receber!");

}





if($mes_parc45<=9){
$soma_vencto46 = bcadd($mes_parc45,1);
}
else{
$soma_vencto46 = bcadd($mes_parc45,1);
}
if($soma_vencto46>12){
$mes_parc46 = "01";
}else{
$mes_parc46 = $soma_vencto46;
}
if($soma_vencto46>12){
$ano_parc46 = bcadd($ano_parc45,1);
}else{
$ano_parc46 = $ano_parc45;
}

if(($mes_parc46=="02") or ($mes_parc46=="2")){
if($dia_vencto>="29"){
$dia_parc46 = "28";
}
else{
$dia_parc46 = $dia_vencto;
}

}
else{
$dia_parc46 = $dia_vencto;
}

$vencto46 = "$ano_parc46-$mes_parc46-$dia_parc46";

if($quant_parc>=46){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto46','Em Aberto','$quant_parc','46','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 46º mensalidade no contas a receber!");

}





if($mes_parc46<=9){
$soma_vencto47 = bcadd($mes_parc46,1);
}
else{
$soma_vencto47 = bcadd($mes_parc46,1);
}
if($soma_vencto47>12){
$mes_parc47 = "01";
}else{
$mes_parc47 = $soma_vencto47;
}
if($soma_vencto47>12){
$ano_parc47 = bcadd($ano_parc46,1);
}else{
$ano_parc47 = $ano_parc46;
}

if(($mes_parc47=="02") or ($mes_parc47=="2")){
if($dia_vencto>="29"){
$dia_parc47 = "28";
}
else{
$dia_parc47 = $dia_vencto;
}

}
else{
$dia_parc47 = $dia_vencto;
}

$vencto47 = "$ano_parc47-$mes_parc47-$dia_parc47";

if($quant_parc>=47){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto47','Em Aberto','$quant_parc','47','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 47º mensalidade no contas a receber!");

}





if($mes_parc47<=9){
$soma_vencto48 = bcadd($mes_parc47,1);
}
else{
$soma_vencto48 = bcadd($mes_parc47,1);
}
if($soma_vencto48>12){
$mes_parc48 = "01";
}else{
$mes_parc48 = $soma_vencto48;
}
if($soma_vencto48>12){
$ano_parc48 = bcadd($ano_parc47,1);
}else{
$ano_parc48 = $ano_parc47;
}

if(($mes_parc48=="02") or ($mes_parc48=="2")){
if($dia_vencto>="29"){
$dia_parc48 = "28";
}
else{
$dia_parc48 = $dia_vencto;
}

}
else{
$dia_parc48 = $dia_vencto;
}

$vencto48 = "$ano_parc48-$mes_parc48-$dia_parc";

if($quant_parc>=48){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto48','Em Aberto','$quant_parc','48','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 48º mensalidade no contas a receber!");

}





if($mes_parc48<=9){
$soma_vencto49 = bcadd($mes_parc48,1);
}
else{
$soma_vencto49 = bcadd($mes_parc48,1);
}
if($soma_vencto49>12){
$mes_parc49 = "01";
}else{
$mes_parc49 = $soma_vencto49;
}
if($soma_vencto49>12){
$ano_parc49 = bcadd($ano_parc48,1);
}else{
$ano_parc49 = $ano_parc48;
}

if(($mes_parc49=="02") or ($mes_parc49=="2")){
if($dia_vencto>="29"){
$dia_parc49 = "28";
}
else{
$dia_parc49 = $dia_vencto;
}

}
else{
$dia_parc49 = $dia_vencto;
}

$vencto49 = "$ano_parc49-$mes_parc49-$dia_parc49";

if($quant_parc>=49){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto49','Em Aberto','$quant_parc','49','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 49º mensalidade no contas a receber!");

}





if($mes_parc49<=9){
$soma_vencto50 = bcadd($mes_parc49,1);
}
else{
$soma_vencto50 = bcadd($mes_parc49,1);
}
if($soma_vencto50>12){
$mes_parc50 = "01";
}else{
$mes_parc50 = $soma_vencto50;
}
if($soma_vencto50>12){
$ano_parc50 = bcadd($ano_parc49,1);
}else{
$ano_parc50 = $ano_parc49;
}

if(($mes_parc50=="02") or ($mes_parc50=="2")){
if($dia_vencto>="29"){
$dia_parc50 = "28";
}
else{
$dia_parc50 = $dia_vencto;
}

}
else{
$dia_parc50 = $dia_vencto;
}

$vencto50 = "$ano_parc50-$mes_parc50-$dia_parc50";

if($quant_parc>=50){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto50','Em Aberto','$quant_parc','50','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 50º mensalidade no contas a receber!");

}






if($mes_parc50<=9){
$soma_vencto51 = bcadd($mes_parc50,1);
}
else{
$soma_vencto51 = bcadd($mes_parc50,1);
}
if($soma_vencto51>12){
$mes_parc51 = "01";
}else{
$mes_parc51 = $soma_vencto51;
}
if($soma_vencto51>12){
$ano_parc51 = bcadd($ano_parc50,1);
}else{
$ano_parc51 = $ano_parc50;
}

if(($mes_parc51=="02") or ($mes_parc51=="2")){
if($dia_vencto>="29"){
$dia_parc51 = "28";
}
else{
$dia_parc51 = $dia_vencto;
}

}
else{
$dia_parc51 = $dia_vencto;
}

$vencto51 = "$ano_parc51-$mes_parc51-$dia_parc51";

if($quant_parc>=51){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto51','Em Aberto','$quant_parc','51','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 51º mensalidade no contas a receber!");

}





if($mes_parc51<=9){
$soma_vencto52 = bcadd($mes_parc51,1);
}
else{
$soma_vencto52 = bcadd($mes_parc51,1);
}
if($soma_vencto52>12){
$mes_parc52 = "01";
}else{
$mes_parc52 = $soma_vencto52;
}
if($soma_vencto52>12){
$ano_parc52 = bcadd($ano_parc51,1);
}else{
$ano_parc52 = $ano_parc51;
}

if(($mes_parc52=="02") or ($mes_parc52=="2")){
if($dia_vencto>="29"){
$dia_parc52 = "28";
}
else{
$dia_parc52 = $dia_vencto;
}

}
else{
$dia_parc52 = $dia_vencto;
}

$vencto52 = "$ano_parc52-$mes_parc52-$dia_parc52";

if($quant_parc>=52){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto52','Em Aberto','$quant_parc','52','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 52º mensalidade no contas a receber!");

}





if($mes_parc52<=9){
$soma_vencto53 = bcadd($mes_parc52,1);
}
else{
$soma_vencto53 = bcadd($mes_parc52,1);
}
if($soma_vencto53>12){
$mes_parc53 = "01";
}else{
$mes_parc53 = $soma_vencto53;
}
if($soma_vencto53>12){
$ano_parc53 = bcadd($ano_parc52,1);
}else{
$ano_parc53 = $ano_parc52;
}

if(($mes_parc53=="02") or ($mes_parc53=="2")){
if($dia_vencto>="29"){
$dia_parc53 = "28";
}
else{
$dia_parc53 = $dia_vencto;
}

}
else{
$dia_parc53 = $dia_vencto;
}

$vencto53 = "$ano_parc53-$mes_parc53-$dia_parc53";

if($quant_parc>=53){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto53','Em Aberto','$quant_parc','53','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 53º mensalidade no contas a receber!");

}





if($mes_parc53<=9){
$soma_vencto54 = bcadd($mes_parc53,1);
}
else{
$soma_vencto54 = bcadd($mes_parc53,1);
}
if($soma_vencto54>12){
$mes_parc54 = "01";
}else{
$mes_parc54 = $soma_vencto54;
}
if($soma_vencto54>12){
$ano_parc54 = bcadd($ano_parc53,1);
}else{
$ano_parc54 = $ano_parc53;
}

if(($mes_parc54=="02") or ($mes_parc54=="2")){
if($dia_vencto>="29"){
$dia_parc54 = "28";
}
else{
$dia_parc54 = $dia_vencto;
}

}
else{
$dia_parc54 = $dia_vencto;
}

$vencto54 = "$ano_parc54-$mes_parc54-$dia_parc54";

if($quant_parc>=54){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto54','Em Aberto','$quant_parc','54','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 54º mensalidade no contas a receber!");

}





if($mes_parc54<=9){
$soma_vencto55 = bcadd($mes_parc54,1);
}
else{
$soma_vencto55 = bcadd($mes_parc54,1);
}
if($soma_vencto55>12){
$mes_parc55 = "01";
}else{
$mes_parc55 = $soma_vencto55;
}
if($soma_vencto55>12){
$ano_parc55 = bcadd($ano_parc54,1);
}else{
$ano_parc55 = $ano_parc54;
}

if(($mes_parc55=="02") or ($mes_parc55=="2")){
if($dia_vencto>="29"){
$dia_parc55 = "28";
}
else{
$dia_parc55 = $dia_vencto;
}

}
else{
$dia_parc55 = $dia_vencto;
}

$vencto55 = "$ano_parc55-$mes_parc55-$dia_parc55";

if($quant_parc>=55){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto55','Em Aberto','$quant_parc','55','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 55º mensalidade no contas a receber!");

}





if($mes_parc55<=9){
$soma_vencto56 = bcadd($mes_parc55,1);
}
else{
$soma_vencto56 = bcadd($mes_parc55,1);
}
if($soma_vencto56>12){
$mes_parc56 = "01";
}else{
$mes_parc56 = $soma_vencto56;
}
if($soma_vencto56>12){
$ano_parc56 = bcadd($ano_parc55,1);
}else{
$ano_parc56 = $ano_parc55;
}

if(($mes_parc56=="02") or ($mes_parc56=="2")){
if($dia_vencto>="29"){
$dia_parc56 = "28";
}
else{
$dia_parc56 = $dia_vencto;
}

}
else{
$dia_parc56 = $dia_vencto;
}

$vencto56 = "$ano_parc56-$mes_parc56-$dia_parc56";

if($quant_parc>=56){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto56','Em Aberto','$quant_parc','56','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 56º mensalidade no contas a receber!");

}





if($mes_parc56<=9){
$soma_vencto57 = bcadd($mes_parc56,1);
}
else{
$soma_vencto57 = bcadd($mes_parc56,1);
}
if($soma_vencto57>12){
$mes_parc57 = "01";
}else{
$mes_parc57 = $soma_vencto57;
}
if($soma_vencto57>12){
$ano_parc57 = bcadd($ano_parc56,1);
}else{
$ano_parc57 = $ano_parc56;
}

if(($mes_parc57=="02") or ($mes_parc57=="2")){
if($dia_vencto>="29"){
$dia_parc57 = "28";
}
else{
$dia_parc57 = $dia_vencto;
}

}
else{
$dia_parc57 = $dia_vencto;
}

$vencto57 = "$ano_parc57-$mes_parc57-$dia_parc57";

if($quant_parc>=57){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto57','Em Aberto','$quant_parc','57','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 57º mensalidade no contas a receber!");

}





if($mes_parc57<=9){
$soma_vencto58 = bcadd($mes_parc57,1);
}
else{
$soma_vencto58 = bcadd($mes_parc57,1);
}
if($soma_vencto58>12){
$mes_parc58 = "01";
}else{
$mes_parc58 = $soma_vencto58;
}
if($soma_vencto58>12){
$ano_parc58 = bcadd($ano_parc57,1);
}else{
$ano_parc58 = $ano_parc57;
}

if(($mes_parc58=="02") or ($mes_parc58=="2")){
if($dia_vencto>="29"){
$dia_parc58 = "28";
}
else{
$dia_parc58 = $dia_vencto;
}

}
else{
$dia_parc58 = $dia_vencto;
}

$vencto58 = "$ano_parc58-$mes_parc58-$dia_parc58";

if($quant_parc>=58){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto58','Em Aberto','$quant_parc','58','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 58º mensalidade no contas a receber!");

}





if($mes_parc58<=9){
$soma_vencto59 = bcadd($mes_parc58,1);
}
else{
$soma_vencto59 = bcadd($mes_parc58,1);
}
if($soma_vencto59>12){
$mes_parc59 = "01";
}else{
$mes_parc59 = $soma_vencto59;
}
if($soma_vencto59>12){
$ano_parc59 = bcadd($ano_parc58,1);
}else{
$ano_parc59 = $ano_parc58;
}

if(($mes_parc59=="02") or ($mes_parc59=="2")){
if($dia_vencto>="29"){
$dia_parc = "28";
}
else{
$dia_parc59 = $dia_vencto;
}

}
else{
$dia_parc59 = $dia_vencto;
}

$vencto59 = "$ano_parc59-$mes_parc59-$dia_parc59";

if($quant_parc>=59){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto59','Em Aberto','$quant_parc','59','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 59º mensalidade no contas a receber!");

}





if($mes_parc59<=9){
$soma_vencto60 = bcadd($mes_parc59,1);
}
else{
$soma_vencto60 = bcadd($mes_parc59,1);
}
if($soma_vencto60>12){
$mes_parc60 = "01";
}else{
$mes_parc60 = $soma_vencto60;
}
if($soma_vencto60>12){
$ano_parc60 = bcadd($ano_parc59,1);
}else{
$ano_parc60 = $ano_parc59;
}

if(($mes_parc60=="02") or ($mes_parc60=="2")){
if($dia_vencto>="29"){
$dia_parc60 = "28";
}
else{
$dia_parc60 = $dia_vencto;
}

}
else{
$dia_parc60 = $dia_vencto;
}

$vencto60 = "$ano_parc60-$mes_parc60-$dia_parc60";

if($quant_parc>=60){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto60','Em Aberto','$quant_parc','60','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 60º mensalidade no contas a receber!");

}





if($mes_parc60<=9){
$soma_vencto61 = bcadd($mes_parc60,1);
}
else{
$soma_vencto61 = bcadd($mes_parc60,1);
}
if($soma_vencto61>12){
$mes_parc61 = "01";
}else{
$mes_parc61 = $soma_vencto61;
}
if($soma_vencto61>12){
$ano_parc61 = bcadd($ano_parc60,1);
}else{
$ano_parc61 = $ano_parc60;
}

if(($mes_parc61=="02") or ($mes_parc61=="2")){
if($dia_vencto>="29"){
$dia_parc61 = "28";
}
else{
$dia_parc61 = $dia_vencto;
}

}
else{
$dia_parc61 = $dia_vencto;
}

$vencto61 = "$ano_parc61-$mes_parc61-$dia_parc61";

if($quant_parc>=61){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto61','Em Aberto','$quant_parc','61','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 61º mensalidade no contas a receber!");

}





if($mes_parc61<=9){
$soma_vencto62 = bcadd($mes_parc61,1);
}
else{
$soma_vencto62 = bcadd($mes_parc61,1);
}
if($soma_vencto62>12){
$mes_parc62 = "01";
}else{
$mes_parc62 = $soma_vencto62;
}
if($soma_vencto62>12){
$ano_parc62 = bcadd($ano_parc61,1);
}else{
$ano_parc62 = $ano_parc61;
}

if(($mes_parc62=="02") or ($mes_parc62=="2")){
if($dia_vencto>="29"){
$dia_parc62 = "28";
}
else{
$dia_parc62 = $dia_vencto;
}

}
else{
$dia_parc62 = $dia_vencto;
}

$vencto62 = "$ano_parc62-$mes_parc62-$dia_parc62";

if($quant_parc>=62){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto62','Em Aberto','$quant_parc','62','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 62º mensalidade no contas a receber!");

}





if($mes_parc62<=9){
$soma_vencto63 = bcadd($mes_parc62,1);
}
else{
$soma_vencto63 = bcadd($mes_parc62,1);
}
if($soma_vencto63>12){
$mes_parc63 = "01";
}else{
$mes_parc63 = $soma_vencto63;
}
if($soma_vencto63>12){
$ano_parc63 = bcadd($ano_parc62,1);
}else{
$ano_parc63 = $ano_parc62;
}

if(($mes_parc63=="02") or ($mes_parc63=="2")){
if($dia_vencto>="29"){
$dia_parc63 = "28";
}
else{
$dia_parc63 = $dia_vencto;
}

}
else{
$dia_parc63 = $dia_vencto;
}

$vencto63 = "$ano_parc63-$mes_parc63-$dia_parc63";

if($quant_parc>=63){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto63','Em Aberto','$quant_parc','63','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 63º mensalidade no contas a receber!");

}





if($mes_parc63<=9){
$soma_vencto64 = bcadd($mes_parc63,1);
}
else{
$soma_vencto64 = bcadd($mes_parc63,1);
}
if($soma_vencto64>12){
$mes_parc64 = "01";
}else{
$mes_parc64 = $soma_vencto64;
}
if($soma_vencto64>12){
$ano_parc64 = bcadd($ano_parc63,1);
}else{
$ano_parc64 = $ano_parc63;
}

if(($mes_parc64=="02") or ($mes_parc64=="2")){
if($dia_vencto>="29"){
$dia_parc64 = "28";
}
else{
$dia_parc64 = $dia_vencto;
}

}
else{
$dia_parc64 = $dia_vencto;
}

$vencto64 = "$ano_parc64-$mes_parc64-$dia_parc64";

if($quant_parc>=64){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto64','Em Aberto','$quant_parc','64','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 64º mensalidade no contas a receber!");

}





if($mes_parc64<=9){
$soma_vencto65 = bcadd($mes_parc64,1);
}
else{
$soma_vencto65 = bcadd($mes_parc64,1);
}
if($soma_vencto65>12){
$mes_parc65 = "01";
}else{
$mes_parc65 = $soma_vencto65;
}
if($soma_vencto65>12){
$ano_parc65 = bcadd($ano_parc64,1);
}else{
$ano_parc65 = $ano_parc64;
}

if(($mes_parc65=="02") or ($mes_parc65=="2")){
if($dia_vencto>="29"){
$dia_parc65 = "28";
}
else{
$dia_parc65 = $dia_vencto;
}

}
else{
$dia_parc65 = $dia_vencto;
}

$vencto65 = "$ano_parc65-$mes_parc65-$dia_parc65";

if($quant_parc>=65){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto65','Em Aberto','$quant_parc','65','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 65º mensalidade no contas a receber!");

}





if($mes_parc65<=9){
$soma_vencto66 = bcadd($mes_parc65,1);
}
else{
$soma_vencto66 = bcadd($mes_parc65,1);
}
if($soma_vencto66>12){
$mes_parc66 = "01";
}else{
$mes_parc66 = $soma_vencto66;
}
if($soma_vencto66>12){
$ano_parc66 = bcadd($ano_parc65,1);
}else{
$ano_parc66 = $ano_parc65;
}

if(($mes_parc66=="02") or ($mes_parc66=="2")){

if($dia_vencto>="29"){
$dia_parc66 = "28";
}
else{
$dia_parc66 = $dia_vencto;
}

}
else{
$dia_parc66 = $dia_vencto;
}

$vencto66 = "$ano_parc66-$mes_parc66-$dia_parc66";

if($quant_parc>=66){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto66','Em Aberto','$quant_parc','66','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 66º mensalidade no contas a receber!");

}





if($mes_parc66<=9){
$soma_vencto67 = bcadd($mes_parc66,1);
}
else{
$soma_vencto67 = bcadd($mes_parc66,1);
}
if($soma_vencto67>12){
$mes_parc67 = "01";
}else{
$mes_parc67 = $soma_vencto67;
}
if($soma_vencto67>12){
$ano_parc67 = bcadd($ano_parc66,1);
}else{
$ano_parc67 = $ano_parc66;
}

if(($mes_parc67=="02") or ($mes_parc67=="2")){
if($dia_vencto>="29"){
$dia_parc67 = "28";
}
else{
$dia_parc67 = $dia_vencto;
}

}
else{
$dia_parc67 = $dia_vencto;
}

$vencto67 = "$ano_parc67-$mes_parc67-$dia_parc67";

if($quant_parc>=67){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto67','Em Aberto','$quant_parc','67','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 67º mensalidade no contas a receber!");

}





if($mes_parc67<=9){
$soma_vencto68 = bcadd($mes_parc67,1);
}
else{
$soma_vencto68 = bcadd($mes_parc67,1);
}
if($soma_vencto68>12){
$mes_parc68 = "01";
}else{
$mes_parc68 = $soma_vencto68;
}
if($soma_vencto68>12){
$ano_parc68 = bcadd($ano_parc67,1);
}else{
$ano_parc68 = $ano_parc67;
}

if(($mes_parc68=="02") or ($mes_parc68=="2")){
if($dia_vencto>="29"){
$dia_parc = "28";
}
else{
$dia_parc68 = $dia_vencto;
}

}
else{
$dia_parc68 = $dia_vencto;
}

$vencto68 = "$ano_parc68-$mes_parc68-$dia_parc68";

if($quant_parc>=68){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto68','Em Aberto','$quant_parc','68','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 68º mensalidade no contas a receber!");

}





if($mes_parc68<=9){
$soma_vencto69 = bcadd($mes_parc68,1);
}
else{
$soma_vencto69 = bcadd($mes_parc68,1);
}
if($soma_vencto69>12){
$mes_parc69 = "01";
}else{
$mes_parc69 = $soma_vencto69;
}
if($soma_vencto69>12){
$ano_parc69 = bcadd($ano_parc68,1);
}else{
$ano_parc69 = $ano_parc68;
}

if(($mes_parc69=="02") or ($mes_parc69=="2")){
if($dia_vencto>="29"){
$dia_parc69 = "28";
}
else{
$dia_parc69 = $dia_vencto;
}

}
else{
$dia_parc69 = $dia_vencto;
}

$vencto69 = "$ano_parc69-$mes_parc69-$dia_parc69";

if($quant_parc>=69){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto69','Em Aberto','$quant_parc','69','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 69º mensalidade no contas a receber!");

}





if($mes_parc69<=9){
$soma_vencto70 = bcadd($mes_parc69,1);
}
else{
$soma_vencto70 = bcadd($mes_parc69,1);
}
if($soma_vencto70>12){
$mes_parc70 = "01";
}else{
$mes_parc70 = $soma_vencto70;
}
if($soma_vencto70>12){
$ano_parc70 = bcadd($ano_parc69,1);
}else{
$ano_parc70 = $ano_parc69;
}

if(($mes_parc70=="02") or ($mes_parc70=="2")){
if($dia_vencto>="29"){
$dia_parc70 = "28";
}
else{
$dia_parc70 = $dia_vencto;
}

}
else{
$dia_parc70 = $dia_vencto;
}

$vencto70 = "$ano_parc70-$mes_parc70-$dia_parc70";

if($quant_parc>=70){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto70','Em Aberto','$quant_parc','70','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 70º mensalidade no contas a receber!");

}





if($mes_parc70<=9){
$soma_vencto71 = bcadd($mes_parc70,1);
}
else{
$soma_vencto71 = bcadd($mes_parc70,1);
}
if($soma_vencto71>12){
$mes_parc71 = "01";
}else{
$mes_parc71 = $soma_vencto71;
}
if($soma_vencto71>12){
$ano_parc71 = bcadd($ano_parc70,1);
}else{
$ano_parc71 = $ano_parc70;
}

if(($mes_parc71=="02") or ($mes_parc71=="2")){
if($dia_vencto>="29"){
$dia_parc71 = "28";
}
else{
$dia_parc71 = $dia_vencto;
}

}
else{
$dia_parc71 = $dia_vencto;
}

$vencto71 = "$ano_parc71-$mes_parc71-$dia_parc71";

if($quant_parc>=71){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto71','Em Aberto','$quant_parc','71','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 71º mensalidade no contas a receber!");

}





if($mes_parc71<=9){
$soma_vencto72 = bcadd($mes_parc71,1);
}
else{
$soma_vencto72 = bcadd($mes_parc71,1);
}
if($soma_vencto72>12){
$mes_parc72 = "01";
}else{
$mes_parc72 = $soma_vencto72;
}
if($soma_vencto72>12){
$ano_parc72 = bcadd($ano_parc71,1);
}else{
$ano_parc72 = $ano_parc71;
}

if(($mes_parc72=="02") or ($mes_parc72=="2")){
if($dia_vencto>="29"){
$dia_parc72 = "28";
}
else{
$dia_parc72 = $dia_vencto;
}

}
else{
$dia_parc72 = $dia_vencto;
}

$vencto72 = "$ano_parc72-$mes_parc72-$dia_parc72";

if($quant_parc>=72){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto72','Em Aberto','$quant_parc','72','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 72º mensalidade no contas a receber!");

}





if($mes_parc72<=9){
$soma_vencto73 = bcadd($mes_parc72,1);
}
else{
$soma_vencto73 = bcadd($mes_parc72,1);
}
if($soma_vencto73>12){
$mes_parc73 = "01";
}else{
$mes_parc73 = $soma_vencto73;
}
if($soma_vencto73>12){
$ano_parc73 = bcadd($ano_parc72,1);
}else{
$ano_parc73 = $ano_parc72;
}

if(($mes_parc73=="02") or ($mes_parc73=="2")){
if($dia_vencto>="29"){
$dia_parc73 = "28";
}
else{
$dia_parc73 = $dia_vencto;
}

}
else{
$dia_parc73 = $dia_vencto;
}

$vencto73 = "$ano_parc73-$mes_parc73-$dia_parc73";

if($quant_parc>=73){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto73','Em Aberto','$quant_parc','73','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 73º mensalidade no contas a receber!");

}





if($mes_parc73<=9){
$soma_vencto74 = bcadd($mes_parc73,1);
}
else{
$soma_vencto74 = bcadd($mes_parc73,1);
}
if($soma_vencto74>12){
$mes_parc74 = "01";
}else{
$mes_parc74 = $soma_vencto74;
}
if($soma_vencto74>12){
$ano_parc74 = bcadd($ano_parc73,1);
}else{
$ano_parc74 = $ano_parc73;
}

if(($mes_parc74=="02") or ($mes_parc74=="2")){
if($dia_vencto>="29"){
$dia_parc74 = "28";
}
else{
$dia_parc74 = $dia_vencto;
}

}
else{
$dia_parc74 = $dia_vencto;
}

$vencto74 = "$ano_parc74-$mes_parc74-$dia_parc74";

if($quant_parc>=74){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto74','Em Aberto','$quant_parc','74','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 74º mensalidade no contas a receber!");

}





if($mes_parc74<=9){
$soma_vencto75 = bcadd($mes_parc74,1);
}
else{
$soma_vencto75 = bcadd($mes_parc74,1);
}
if($soma_vencto75>12){
$mes_parc75 = "01";
}else{
$mes_parc75 = $soma_vencto75;
}
if($soma_vencto75>12){
$ano_parc75 = bcadd($ano_parc74,1);
}else{
$ano_parc75 = $ano_parc74;
}

if(($mes_parc75=="02") or ($mes_parc75=="2")){
if($dia_vencto>="29"){
$dia_parc75 = "28";
}
else{
$dia_parc75 = $dia_vencto;
}

}
else{
$dia_parc75 = $dia_vencto;
}

$vencto75 = "$ano_parc75-$mes_parc75-$dia_parc";

if($quant_parc>=75){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto75','Em Aberto','$quant_parc','75','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 75º mensalidade no contas a receber!");

}





if($mes_parc75<=9){
$soma_vencto76 = bcadd($mes_parc75,1);
}
else{
$soma_vencto76 = bcadd($mes_parc75,1);
}
if($soma_vencto76>12){
$mes_parc76 = "01";
}else{
$mes_parc76 = $soma_vencto76;
}
if($soma_vencto76>12){
$ano_parc76 = bcadd($ano_parc75,1);
}else{
$ano_parc76 = $ano_parc75;
}

if(($mes_parc76=="02") or ($mes_parc76=="2")){
if($dia_vencto>="29"){
$dia_parc76 = "28";
}
else{
$dia_parc76 = $dia_vencto;
}

}
else{
$dia_parc76 = $dia_vencto;
}

$vencto76 = "$ano_parc76-$mes_parc76-$dia_parc76";

if($quant_parc>=76){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto76','Em Aberto','$quant_parc','76','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 76º mensalidade no contas a receber!");

}





if($mes_parc76<=9){
$soma_vencto77 = bcadd($mes_parc76,1);
}
else{
$soma_vencto77 = bcadd($mes_parc76,1);
}
if($soma_vencto77>12){
$mes_parc77 = "01";
}else{
$mes_parc77 = $soma_vencto77;
}
if($soma_vencto77>12){
$ano_parc77 = bcadd($ano_parc76,1);
}else{
$ano_parc77 = $ano_parc76;
}

if(($mes_parc77=="02") or ($mes_parc77=="2")){
if($dia_vencto>="29"){
$dia_parc77 = "28";
}
else{
$dia_parc77 = $dia_vencto;
}

}
else{
$dia_parc77 = $dia_vencto;
}

$vencto77 = "$ano_parc77-$mes_parc77-$dia_parc77";

if($quant_parc>=77){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto77','Em Aberto','$quant_parc','77','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 77º mensalidade no contas a receber!");

}






if($mes_parc77<=9){
$soma_vencto78 = bcadd($mes_parc77,1);
}
else{
$soma_vencto78 = bcadd($mes_parc77,1);
}
if($soma_vencto78>12){
$mes_parc78 = "01";
}else{
$mes_parc78 = $soma_vencto78;
}
if($soma_vencto78>12){
$ano_parc78 = bcadd($ano_parc77,1);
}else{
$ano_parc78 = $ano_parc77;
}

if(($mes_parc78=="02") or ($mes_parc78=="2")){
if($dia_vencto>="29"){
$dia_parc78 = "28";
}
else{
$dia_parc78 = $dia_vencto;
}

}
else{
$dia_parc78 = $dia_vencto;
}

$vencto78 = "$ano_parc78-$mes_parc78-$dia_parc78";

if($quant_parc>=78){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto78','Em Aberto','$quant_parc','78','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 78º mensalidade no contas a receber!");

}





if($mes_parc78<=9){
$soma_vencto79 = bcadd($mes_parc78,1);
}
else{
$soma_vencto79 = bcadd($mes_parc78,1);
}
if($soma_vencto79>12){
$mes_parc79 = "01";
}else{
$mes_parc79 = $soma_vencto79;
}
if($soma_vencto79>12){
$ano_parc79 = bcadd($ano_parc78,1);
}else{
$ano_parc79 = $ano_parc78;
}

if(($mes_parc79=="02") or ($mes_parc79=="2")){
if($dia_vencto>="29"){
$dia_parc79 = "28";
}
else{
$dia_parc79 = $dia_vencto;
}

}
else{
$dia_parc79 = $dia_vencto;
}

$vencto79 = "$ano_parc79-$mes_parc79-$dia_parc79";

if($quant_parc>=79){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto79','Em Aberto','$quant_parc','79','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 79º mensalidade no contas a receber!");

}





if($mes_parc79<=9){
$soma_vencto80 = bcadd($mes_parc79,1);
}
else{
$soma_vencto80 = bcadd($mes_parc79,1);
}
if($soma_vencto80>12){
$mes_parc80 = "01";
}else{
$mes_parc80 = $soma_vencto80;
}
if($soma_vencto80>12){
$ano_parc80 = bcadd($ano_parc79,1);
}else{
$ano_parc80 = $ano_parc79;
}

if(($mes_parc80=="02") or ($mes_parc80=="2")){
if($dia_vencto>="29"){
$dia_parc80 = "28";
}
else{
$dia_parc80 = $dia_vencto;
}

}
else{
$dia_parc80 = $dia_vencto;
}

$vencto80 = "$ano_parc80-$mes_parc80-$dia_parc80";

if($quant_parc>=80){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto80','Em Aberto','$quant_parc','80','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 80º mensalidade no contas a receber!");

}





if($mes_parc80<=9){
$soma_vencto81 = bcadd($mes_parc80,1);
}
else{
$soma_vencto81 = bcadd($mes_parc80,1);
}
if($soma_vencto81>12){
$mes_parc81 = "01";
}else{
$mes_parc81 = $soma_vencto81;
}
if($soma_vencto81>12){
$ano_parc81 = bcadd($ano_parc80,1);
}else{
$ano_parc81 = $ano_parc80;
}

if(($mes_parc81=="02") or ($mes_parc81=="2")){
if($dia_vencto>="29"){
$dia_parc81 = "28";
}
else{
$dia_parc81 = $dia_vencto;
}

}
else{
$dia_parc81 = $dia_vencto;
}

$vencto81 = "$ano_parc81-$mes_parc81-$dia_parc81";

if($quant_parc>=81){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto81','Em Aberto','$quant_parc','81','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 81º mensalidade no contas a receber!");

}





if($mes_parc81<=9){
$soma_vencto82 = bcadd($mes_parc81,1);
}
else{
$soma_vencto82 = bcadd($mes_parc81,1);
}
if($soma_vencto82>12){
$mes_parc82 = "01";
}else{
$mes_parc82 = $soma_vencto82;
}
if($soma_vencto82>12){
$ano_parc82 = bcadd($ano_parc81,1);
}else{
$ano_parc82 = $ano_parc81;
}

if(($mes_parc82=="02") or ($mes_parc82=="2")){
if($dia_vencto>="29"){
$dia_parc82 = "28";
}
else{
$dia_parc82 = $dia_vencto;
}

}
else{
$dia_parc82 = $dia_vencto;
}

$vencto82 = "$ano_parc82-$mes_parc82-$dia_parc82";

if($quant_parc>=82){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto82','Em Aberto','$quant_parc','82','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 82º mensalidade no contas a receber!");

}





if($mes_parc82<=9){
$soma_vencto83 = bcadd($mes_parc82,1);
}
else{
$soma_vencto83 = bcadd($mes_parc82,1);
}
if($soma_vencto83>12){
$mes_parc83 = "01";
}else{
$mes_parc83 = $soma_vencto83;
}
if($soma_vencto83>12){
$ano_parc83 = bcadd($ano_parc82,1);
}else{
$ano_parc83 = $ano_parc82;
}

if(($mes_parc83=="02") or ($mes_parc83=="2")){
if($dia_vencto>="29"){
$dia_parc83 = "28";
}
else{
$dia_parc83 = $dia_vencto;
}

}
else{
$dia_parc83 = $dia_vencto;
}

$vencto83 = "$ano_parc83-$mes_parc83-$dia_parc83";

if($quant_parc>=83){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto83','Em Aberto','$quant_parc','83','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 83º mensalidade no contas a receber!");

}





if($mes_parc83<=9){
$soma_vencto84 = bcadd($mes_parc83,1);
}
else{
$soma_vencto84 = bcadd($mes_parc83,1);
}
if($soma_vencto84>12){
$mes_parc84 = "01";
}else{
$mes_parc84 = $soma_vencto84;
}
if($soma_vencto84>12){
$ano_parc84 = bcadd($ano_parc83,1);
}else{
$ano_parc84 = $ano_parc83;
}

if(($mes_parc84=="02") or ($mes_parc84=="2")){
if($dia_vencto>="29"){
$dia_parc84 = "28";
}
else{
$dia_parc84 = $dia_vencto;
}

}
else{
$dia_parc84 = $dia_vencto;
}

$vencto84 = "$ano_parc84-$mes_parc84-$dia_parc84";

if($quant_parc>=84){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto84','Em Aberto','$quant_parc','84','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 84º mensalidade no contas a receber!");

}





if($mes_parc84<=9){
$soma_vencto85 = bcadd($mes_parc84,1);
}
else{
$soma_vencto85 = bcadd($mes_parc84,1);
}
if($soma_vencto85>12){
$mes_parc85 = "01";
}else{
$mes_parc85 = $soma_vencto85;
}
if($soma_vencto85>12){
$ano_parc85 = bcadd($ano_parc84,1);
}else{
$ano_parc85 = $ano_parc84;
}

if(($mes_parc85=="02") or ($mes_parc85=="2")){
if($dia_vencto>="29"){
$dia_parc85 = "28";
}
else{
$dia_parc85 = $dia_vencto;
}

}
else{
$dia_parc85 = $dia_vencto;
}

$vencto85 = "$ano_parc85-$mes_parc85-$dia_parc85";

if($quant_parc>=85){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto85','Em Aberto','$quant_parc','85','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 85º mensalidade no contas a receber!");

}





if($mes_parc85<=9){
$soma_vencto86 = bcadd($mes_parc85,1);
}
else{
$soma_vencto86 = bcadd($mes_parc85,1);
}
if($soma_vencto86>12){
$mes_parc86 = "01";
}else{
$mes_parc86 = $soma_vencto86;
}
if($soma_vencto86>12){
$ano_parc86 = bcadd($ano_parc85,1);
}else{
$ano_parc86 = $ano_parc85;
}

if(($mes_parc86=="02") or ($mes_parc86=="2")){
if($dia_vencto>="29"){
$dia_parc86 = "28";
}
else{
$dia_parc86 = $dia_vencto;
}

}
else{
$dia_parc86 = $dia_vencto;
}

$vencto86 = "$ano_parc86-$mes_parc86-$dia_parc86";

if($quant_parc>=86){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto86','Em Aberto','$quant_parc','86','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 86º mensalidade no contas a receber!");

}





if($mes_parc86<=9){
$soma_vencto87 = bcadd($mes_parc86,1);
}
else{
$soma_vencto87 = bcadd($mes_parc86,1);
}
if($soma_vencto87>12){
$mes_parc87 = "01";
}else{
$mes_parc87 = $soma_vencto87;
}
if($soma_vencto87>12){
$ano_parc87 = bcadd($ano_parc86,1);
}else{
$ano_parc87 = $ano_parc86;
}

if(($mes_parc87=="02") or ($mes_parc87=="2")){
if($dia_vencto>="29"){
$dia_parc87 = "28";
}
else{
$dia_parc87 = $dia_vencto;
}

}
else{
$dia_parc87 = $dia_vencto;
}

$vencto87 = "$ano_parc87-$mes_parc87-$dia_parc87";

if($quant_parc>=87){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto87','Em Aberto','$quant_parc','87','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 87º mensalidade no contas a receber!");

}





if($mes_parc87<=9){
$soma_vencto88 = bcadd($mes_parc87,1);
}
else{
$soma_vencto88 = bcadd($mes_parc87,1);
}
if($soma_vencto88>12){
$mes_parc88 = "01";
}else{
$mes_parc88 = $soma_vencto88;
}
if($soma_vencto88>12){
$ano_parc88 = bcadd($ano_parc87,1);
}else{
$ano_parc88 = $ano_parc87;
}

if(($mes_parc88=="02") or ($mes_parc88=="2")){
if($dia_vencto>="29"){
$dia_parc88 = "28";
}
else{
$dia_parc88 = $dia_vencto;
}

}
else{
$dia_parc88 = $dia_vencto;
}

$vencto88 = "$ano_parc88-$mes_parc88-$dia_parc88";

if($quant_parc>=88){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto88','Em Aberto','$quant_parc','88','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 88º mensalidade no contas a receber!");

}





if($mes_parc88<=9){
$soma_vencto89 = bcadd($mes_parc88,1);
}
else{
$soma_vencto89 = bcadd($mes_parc88,1);
}
if($soma_vencto89>12){
$mes_parc89 = "01";
}else{
$mes_parc89 = $soma_vencto89;
}
if($soma_vencto89>12){
$ano_parc89 = bcadd($ano_parc88,1);
}else{
$ano_parc89 = $ano_parc88;
}

if(($mes_parc89=="02") or ($mes_parc89=="2")){
if($dia_vencto>="29"){
$dia_parc89 = "28";
}
else{
$dia_parc89 = $dia_vencto;
}

}
else{
$dia_parc89 = $dia_vencto;
}

$vencto89 = "$ano_parc89-$mes_parc89-$dia_parc89";

if($quant_parc>=89){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto89','Em Aberto','$quant_parc','89','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 89º mensalidade no contas a receber!");

}





if($mes_parc89<=9){
$soma_vencto90 = bcadd($mes_parc89,1);
}
else{
$soma_vencto90 = bcadd($mes_parc89,1);
}
if($soma_vencto90>12){
$mes_parc90 = "01";
}else{
$mes_parc90 = $soma_vencto90;
}
if($soma_vencto90>12){
$ano_parc90 = bcadd($ano_parc89,1);
}else{
$ano_parc90 = $ano_parc89;
}

if(($mes_parc90=="02") or ($mes_parc90=="2")){
if($dia_vencto>="29"){
$dia_parc90 = "28";
}
else{
$dia_parc90 = $dia_vencto;
}

}
else{
$dia_parc90 = $dia_vencto;
}

$vencto90 = "$ano_parc90-$mes_parc90-$dia_parc90";

if($quant_parc>=90){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto90','Em Aberto','$quant_parc','90','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 90º mensalidade no contas a receber!");

}





if($mes_parc90<=9){
$soma_vencto91 = bcadd($mes_parc90,1);
}
else{
$soma_vencto91 = bcadd($mes_parc90,1);
}
if($soma_vencto91>12){
$mes_parc91 = "01";
}else{
$mes_parc91 = $soma_vencto91;
}
if($soma_vencto91>12){
$ano_parc91 = bcadd($ano_parc90,1);
}else{
$ano_parc91 = $ano_parc90;
}

if(($mes_parc91=="02") or ($mes_parc91=="2")){
if($dia_vencto>="29"){
$dia_parc91 = "28";
}
else{
$dia_parc91 = $dia_vencto;
}

}
else{
$dia_parc91 = $dia_vencto;
}

$vencto91 = "$ano_parc91-$mes_parc91-$dia_parc91";

if($quant_parc>=91){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto91','Em Aberto','$quant_parc','91','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 91º mensalidade no contas a receber!");

}





if($mes_parc91<=9){
$soma_vencto92 = bcadd($mes_parc91,1);
}
else{
$soma_vencto92 = bcadd($mes_parc91,1);
}
if($soma_vencto92>12){
$mes_parc92 = "01";
}else{
$mes_parc92 = $soma_vencto92;
}
if($soma_vencto92>12){
$ano_parc92 = bcadd($ano_parc91,1);
}else{
$ano_parc92 = $ano_parc91;
}

if(($mes_parc92=="02") or ($mes_parc92=="2")){
if($dia_vencto>="29"){
$dia_parc92 = "28";
}
else{
$dia_parc92 = $dia_vencto;
}

}
else{
$dia_parc92 = $dia_vencto;
}

$vencto92 = "$ano_parc92-$mes_parc92-$dia_parc92";

if($quant_parc>=92){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto92','Em Aberto','$quant_parc','92','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 92º mensalidade no contas a receber!");

}





if($mes_parc92<=9){
$soma_vencto93 = bcadd($mes_parc92,1);
}
else{
$soma_vencto93 = bcadd($mes_parc92,1);
}
if($soma_vencto93>12){
$mes_parc93 = "01";
}else{
$mes_parc93 = $soma_vencto93;
}
if($soma_vencto93>12){
$ano_parc93 = bcadd($ano_parc92,1);
}else{
$ano_parc93 = $ano_parc92;
}

if(($mes_parc93=="02") or ($mes_parc93=="2")){
if($dia_vencto>="29"){
$dia_parc93 = "28";
}
else{
$dia_parc93 = $dia_vencto;
}

}
else{
$dia_parc93 = $dia_vencto;
}

$vencto93 = "$ano_parc93-$mes_parc93-$dia_parc93";


if($quant_parc>=93){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto93','Em Aberto','$quant_parc','93','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 93º mensalidade no contas a receber!");

}





if($mes_parc93<=9){
$soma_vencto94 = bcadd($mes_parc93,1);
}
else{
$soma_vencto94 = bcadd($mes_parc93,1);
}
if($soma_vencto94>12){
$mes_parc94 = "01";
}else{
$mes_parc94 = $soma_vencto94;
}
if($soma_vencto94>12){
$ano_parc94 = bcadd($ano_parc93,1);
}else{
$ano_parc94 = $ano_parc93;
}

if(($mes_parc94=="02") or ($mes_parc94=="2")){
if($dia_vencto>="29"){
$dia_parc94 = "28";
}
else{
$dia_parc94 = $dia_vencto;
}

}
else{
$dia_parc94 = $dia_vencto;
}

$vencto94 = "$ano_parc94-$mes_parc94-$dia_parc94";

if($quant_parc>=94){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto94','Em Aberto','$quant_parc','94','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 94º mensalidade no contas a receber!");

}





if($mes_parc94<=9){
$soma_vencto95 = bcadd($mes_parc94,1);
}
else{
$soma_vencto95 = bcadd($mes_parc94,1);
}
if($soma_vencto95>12){
$mes_parc95 = "01";
}else{
$mes_parc95 = $soma_vencto95;
}
if($soma_vencto95>12){
$ano_parc95 = bcadd($ano_parc94,1);
}else{
$ano_parc95 = $ano_parc94;
}

if(($mes_parc95=="02") or ($mes_parc95=="2")){
if($dia_vencto>="29"){
$dia_parc95 = "28";
}
else{
$dia_parc95 = $dia_vencto;
}

}
else{
$dia_parc95 = $dia_vencto;
}

$vencto95 = "$ano_parc95-$mes_parc95-$dia_parc95";

if($quant_parc>=95){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto95','Em Aberto','$quant_parc','95','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 95º mensalidade no contas a receber!");

}





if($mes_parc95<=9){
$soma_vencto96 = bcadd($mes_parc95,1);
}
else{
$soma_vencto96 = bcadd($mes_parc95,1);
}
if($soma_vencto96>12){
$mes_parc96 = "01";
}else{
$mes_parc96 = $soma_vencto96;
}
if($soma_vencto96>12){
$ano_parc96 = bcadd($ano_parc95,1);
}else{
$ano_parc96 = $ano_parc95;
}

if(($mes_parc96=="02") or ($mes_parc96=="2")){
if($dia_vencto>="29"){
$dia_parc96 = "28";
}
else{
$dia_parc96 = $dia_vencto;
}

}
else{
$dia_parc96 = $dia_vencto;
}

$vencto96 = "$ano_parc96-$mes_parc96-$dia_parc96";

if($quant_parc>=96){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto96','Em Aberto','$quant_parc','96','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 96º mensalidade no contas a receber!");

}





if($mes_parc96<=9){
$soma_vencto97 = bcadd($mes_parc96,1);
}
else{
$soma_vencto97 = bcadd($mes_parc96,1);
}
if($soma_vencto97>12){
$mes_parc97 = "01";
}else{
$mes_parc97 = $soma_vencto97;
}
if($soma_vencto97>12){
$ano_parc97 = bcadd($ano_parc96,1);
}else{
$ano_parc97 = $ano_parc96;
}

if(($mes_parc97=="02") or ($mes_parc97=="2")){
if($dia_vencto>="29"){
$dia_parc97 = "28";
}
else{
$dia_parc97 = $dia_vencto;
}

}
else{
$dia_parc97 = $dia_vencto;
}

$vencto97 = "$ano_parc97-$mes_parc97-$dia_parc97";

if($quant_parc>=97){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto97','Em Aberto','$quant_parc','97','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 97º mensalidade no contas a receber!");

}





if($mes_parc97<=9){
$soma_vencto98 = bcadd($mes_parc97,1);
}
else{
$soma_vencto98 = bcadd($mes_parc97,1);
}
if($soma_vencto98>12){
$mes_parc98 = "01";
}else{
$mes_parc98 = $soma_vencto98;
}
if($soma_vencto98>12){
$ano_parc98 = bcadd($ano_parc97,1);
}else{
$ano_parc98 = $ano_parc97;
}

if(($mes_parc98=="02") or ($mes_parc98=="2")){
if($dia_vencto>="29"){
$dia_parc98 = "28";
}
else{
$dia_parc98 = $dia_vencto;
}

}
else{
$dia_parc98 = $dia_vencto;
}

$vencto98 = "$ano_parc98-$mes_parc98-$dia_parc98";

if($quant_parc>=98){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto98','Em Aberto','$quant_parc','98','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 98º mensalidade no contas a receber!");

}





if($mes_parc98<=9){
$soma_vencto99 = bcadd($mes_parc98,1);
}
else{
$soma_vencto99 = bcadd($mes_parc98,1);
}
if($soma_vencto99>12){
$mes_parc99 = "01";
}else{
$mes_parc99 = $soma_vencto99;
}
if($soma_vencto99>12){
$ano_parc99 = bcadd($ano_parc98,1);
}else{
$ano_parc99 = $ano_parc98;
}

if(($mes_parc99=="02") or ($mes_parc99=="2")){
if($dia_vencto>="29"){
$dia_parc99 = "28";
}
else{
$dia_parc99 = $dia_vencto;
}

}
else{
$dia_parc99 = $dia_vencto;
}

$vencto99 = "$ano_parc99-$mes_parc99-$dia_parc99";

if($quant_parc>=99){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto99','Em Aberto','$quant_parc','99','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 99º mensalidade no contas a receber!");

}





if($mes_parc99<=9){
$soma_vencto100 = bcadd($mes_parc99,1);
}
else{
$soma_vencto100 = bcadd($mes_parc99,1);
}
if($soma_vencto100>12){
$mes_parc100 = "01";
}else{
$mes_parc100 = $soma_vencto100;
}
if($soma_vencto1400>12){
$ano_parc100 = bcadd($ano_parc99,1);
}else{
$ano_parc100 = $ano_parc99;
}

if(($mes_parc100=="02") or ($mes_parc100=="2")){
if($dia_vencto>="29"){
$dia_parc100 = "28";
}
else{
$dia_parc100 = $dia_vencto;
}

}
else{
$dia_parc100 = $dia_vencto;
}

$vencto100 = "$ano_parc100-$mes_parc100-$dia_parc100";

if($quant_parc>=100){
$comando = "insert into contas_a_receber(num_proposta,bco_operacao,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quitacao,quant_parc,num_mensalidade,valor_credito,valor_total,valor_liquido_cliente) values('$num_proposta','$bco_operacao','$datecadastro','$horacadastro','$nome','$cpf','$valor_parcela','$vencto100','Em Aberto','$quant_parc','100','$valor_credito','$valor_total','$valor_liquido_cliente')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 100º mensalidade no contas a receber!");

}







//echo "CONTAS A RECEBER REFERENTE A PROPOSTA $num_proposta GERADO COM SUCESSO!!!...";

}

}


$sql = "SELECT * FROM contas_a_receber where num_proposta = '$num_proposta' order by vencto desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$venctocontrato = $linha['8'];
	  
}


$venctodocontrato = explode("-", $venctocontrato);

$ano_vencto_contrato = $venctodocontrato[0];
$mes_vencto_contrato = $venctodocontrato[1];
$dia_vencto_contrato = $venctodocontrato[2];

//---------------------------FIM DOS LANÇAMENTOS DO CONTAS A RECEBER-------------------------------------------







$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`status` = '$status',`mes_ano_status` = '$mes_ano_status',`retorno` = '$retorno',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`campanha` = '$campanha',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`valor_liberado` = '$valor_liberado',`valor_total` = '$valor_total',`valor_liquido_cliente` = '$valor_liquido_cliente',

`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`valor_credito`= '$valor_credito',`bco_operacao`= '$bco_operacao',`tabela`= '$tabela',`valor_a_receber`= '$valor_a_receber',`recebido`= '$recebido',`parcela`= '$parcela',`parc1`= '$parcela',`percentual_op`= '$percentual_op',`comissao_op`= '$comissao_op',`obs2`= '$obs2',`dia_alteracao_status` = '$dia_alteracao_status',`mes_alteracao_status` = '$mes_alteracao_status',`ano_alteracao_status` = '$ano_alteracao_status',`meta` = '$meta',`data_alteracao` = '$data_alteracao',`quant_parc` = '$quant_parc',`num_contrato_bco` = '$num_contrato_bco',`dia_parc` = '$dia_parc',`mes_parc` = '$mes_parc',`ano_parc` = '$ano_parc',`percentual_entrada` = '$percentual_entrada',`venctocontrato` = '$venctocontrato',`dia_vencto_contrato` = '$dia_vencto_contrato',`mes_vencto_contrato` = '$mes_vencto_contrato',`ano_vencto_contrato` = '$ano_vencto_contrato' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");





$comando = "insert into observacoes_parecer_credito(num_proposta,cpf,data,hora,obs,operador) values('$num_proposta','$cpf','$dataalteracao','$horaalteracao','$obs2','$operador_alterou')";



mysql_query($comando,$conexao);







echo "Status da Proposta alterado com sucesso<br><br>";

?>




		  <?
if($status=="PAGO AO CLIENTE"){


// dados da proposta

$data_pagto_cliente = $_POST['data_pagto_cliente'];

$hora_pagto_cliente = $_POST['hora_pagto_cliente'];

$status_pagto_cliente = "Pago_ao_cliente";


// a função explode é usada para separar uma string em


$dataalteracao_pagto_cliente = $data_pagto_cliente;

$dataalteracao_pagto_cliente2 = explode("-", $dataalteracao_pagto_cliente);



$dia_pagto_cliente = $dataalteracao_pagto_cliente2[0];

$mes_pagto_cliente = $dataalteracao_pagto_cliente2[1];

$ano_pagto_cliente = $dataalteracao_pagto_cliente2[2];






$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`status_pagto_cliente` = '$status_pagto_cliente',

`data_pagto_cliente` = '$data_pagto_cliente',`hora_pagto_cliente` = '$hora_pagto_cliente',

`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',

`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',

`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',

`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',

`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`dia_pagto_cliente` = '$dia_pagto_cliente',`mes_pagto_cliente` = '$mes_pagto_cliente',`ano_pagto_cliente` = '$ano_pagto_cliente' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";

}



mysql_query($comando,$conexao);
}

if($status<>"PAGO AO CLIENTE"){

$status_pagto_cliente = "";

}


if($status_pagto_cliente=="Pago_ao_Cliente"){



$comando = "insert into cx_saidas(datacadastro,horacadastro,num_proposta,nome_operador,estabelecimento_proposta,nome,cpf,valor,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,mes,ano) 



values('$datacadastro','$horacadastro','$num_proposta','$nome_operador','$estabelecimento_proposta','$nome','$cpf','$valor','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$mes','$ano')";





mysql_query($comando,$conexao);

}





//-----------------------------------------------------------------------------------//

?>
		  <?
if($status=="PAGO AO CORRESPONDENTE"){


// dados da proposta

$data_pagto_cliente = $_POST['data_pagto_cliente'];

$hora_pagto_cliente = $_POST['hora_pagto_cliente'];

$status_pagto_cliente = "Pago_ao_correspondente";


// a função explode é usada para separar uma string em


$dataalteracao_pagto_cliente = $data_pagto_cliente;

$dataalteracao_pagto_cliente2 = explode("-", $dataalteracao_pagto_cliente);



$dia_pagto_cliente = $dataalteracao_pagto_cliente2[0];

$mes_pagto_cliente = $dataalteracao_pagto_cliente2[1];

$ano_pagto_cliente = $dataalteracao_pagto_cliente2[2];






$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`status_pagto_cliente` = '$status_pagto_cliente',

`data_pagto_cliente` = '$data_pagto_cliente',`hora_pagto_cliente` = '$hora_pagto_cliente',

`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',

`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',

`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',

`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',

`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`dia_pagto_cliente` = '$dia_pagto_cliente',`mes_pagto_cliente` = '$mes_pagto_cliente',`ano_pagto_cliente` = '$ano_pagto_cliente' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";

}



mysql_query($comando,$conexao);
}

if($status_pagto_cliente=="Pago_ao_correspondente"){



$comando = "insert into cx_saidas(datacadastro,horacadastro,num_proposta,nome_operador,estabelecimento_proposta,nome,cpf,valor,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,mes,ano) 



values('$datacadastro','$horacadastro','$num_proposta','$nome_operador','$estabelecimento_proposta','$nome','$cpf','$valor','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$mes','$ano')";





mysql_query($comando,$conexao);

}



//-----------------------------------------------------------------------------------//

?>






<?

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$num_proposta = $linha[0];

$nome = $linha[4];

$cpf = $linha[7];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$valor_credito = $linha[25];

$valor_liberado = $linha[97];

$parcela = $linha[27];



$operador = $linha[32];

$email_operador = $linha[34];





$status = $linha[51];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$percentual_op = $linha[100];

$comissao_op = $linha[101];

$obs2 = $linha[102];





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

	$mens   =  "Olá! os dados de sua proposta foram atualizados na Allcred Financeira!   \n";

	$mens  .=  "Visite-nos www.allcredpromotora.com.br \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Nº da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Percentual de comissão: ".$percentual_op."%                                                  \n";

	$mens  .=  "Comissão em R$: ".$comissao_op."                                                    \n";

	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";

	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";

	$mens  .=  "Valor Solicitado: ".$valor_credito."                                                    \n";

	$mens  .=  "Valor Liberado: ".$valor_liberado."                                                    \n";

	$mens  .=  "Valor da Parcela: ".$parcela."                                                    \n";	

	$mens  .=  "STATUS: ".$status."                                                    \n";

	$mens  .=  "Parecer de Crédito: ".$obs2."                                                    \n\n";

	

	$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Proposta atualizada no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_operador_alterou);

	//$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador."! Confira os dados no sistema!",$mens,"From:".$email_dest);



?>





<body>
<table width="100%" border="0">
  <tr>
    <td width="20%"><form action="../principal.php" method="post" name="form1" target="_top">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit2" value="Voltar ao menu principal">
    </form></td>
    <td width="25%"><form name="form1" method="post" action="../operacoes_a_serem_executadas.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
<input type="submit" name="Submit3" value="Status de outra Proposta">
    </form></td>
    <td width="35%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
  </tr>
</table><br>

<?

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$nome_operador = $linha[1];

$tipo = $linha[2];

$estabelecimento_proposta = $linha[3];

$nome = $linha[4];

$sexo = $linha[5];

$estadocivil = $linha[6];

$cpf = $linha[7];

$rg = $linha[8];

$orgao = $linha[9];

$emissao = $linha[10];

$data_nasc = $linha[11];

$pai = $linha[12];

$mae = $linha[13];

$endereco = $linha[14];

$numero = $linha[15];

$bairro = $linha[16];

$complemento = $linha[17];

$cidade = $linha[18];

$estado = $linha[19];

$cep = $linha[20];

$telefone = $linha[21];

$celular = $linha[22];

$email = $linha[23];

$num_beneficio = $linha[24];

$valor_credito = $linha[25];

$quant_parc_gravado = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];

$retorno = $linha[85];

$bco_operacao = $linha[86];

$valor_a_receber = $linha[87];

$recebido = $linha[88];

$data_recebimento = $linha[89];





$parc1 = $linha[52];

$banco1 = $linha[53];

$vencto1 = $linha[54];

$compra1 = $linha[55];



$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];



$tipo_proposta = $linha[83];



$quoeficiente = $linha[90];

$valor_liberado = $linha[97];

$tipo_capital = $linha[98];

$percentual_op = $linha[100];

$comissao_op = $linha[101];

$obs3 = $linha[102];

$tabela = $linha[109];

$valor_total = $linha[113];

$campanha_gravada = $linha[114];

$valor_liquido_cliente = $linha[115];

$num_contrato_bco = $linha[177];

$custo_operacao = $linha[187];





?>

<table width="100%" border="0" cellspacing="4">
  <tr>
    <td colspan="4"><div align="center">
      <form name="form2" method="post" action="status_proposta.php">
        <font color="#0000FF" size="4">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        PROPOSTA AFETADA N&ordm; <strong>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
        <input type="submit" name="button" id="button" value="<? echo $num_proposta; ?>">
        <? //echo $num_proposta; ?>
        </strong></font>
      </form>
    </div></td>
  </tr>
  <tr>
    <td width="17%">Status</td>
    <td width="16%"><strong><font color="#0000FF">
      <? echo $status; ?>
    </font></strong></td>
    <td width="14%">CPF do cliente </td>
    <td width="53%"><p><strong><font color="#0000FF"><? echo $cpf; ?></font></strong><strong><font color="#0000FF"> </font></strong><strong><font color="#0000FF"> </font></strong>
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
      <strong><font color="#0000FF">
      <? //echo "Ser&aacute; calculado"; ?>
      <input name="retorno" type="hidden" id="retorno2" value="<? $calculo = bcmul($valor_credito, $spread, 2)/14400.00; $calculo_spread = bcmul($calculo,100,2); echo $calculo_spread; ?>">
      <? //$calculo2 = bcmul($valor_credito, $spread, 2)/14400.00; $calculo_spread2 = bcmul($calculo2,100,2); echo $calculo_spread2;?>
      <input name="percentual_op" type="hidden" id="percentual_op2" value="<? echo $percentual_op; ?>">
      <input name="campanha" type="hidden" id="campanha" value="<? if($campanha_gravada==""){echo "selecione"; } else{echo $campanha_gravada; } ?>">
    </font></strong></p></td>
  </tr>
  <tr>
    <td><strong>Valor bruto de opera&ccedil;&atilde;o R$ </strong></td>
    <td><strong><font color="#0000FF"><? echo $valor_total; ?></font></strong></td>
    <td><strong>Base de Calculo</strong></td>
    <td><strong><font color="#0000FF"><? echo $valor_credito; ?></font></strong></td>
  </tr>
  <tr>
    <td><strong><font color="#000000">Quant de Parcelas</font></strong></td>
    <td><strong><font color="#0000FF"><? echo $quant_parc; ?></font></strong></td>
    <td><strong>Valor da parcela </strong></td>
    <td><strong><font color="#0000FF"><? echo $parcela; ?></font></strong></td>
  </tr>
  <tr>
    <td><strong>Valor liquido cliente R$ </strong></td>
    <td><strong><font color="#0000FF"><? echo $valor_liquido_cliente; ?></font></strong></td>
    <td>Bco da Opera&ccedil;&atilde;o </td>
    <td><strong><font color="#0000FF"><? echo $bco_operacao; ?></font></strong></td>
  </tr>
  <tr>
    <td>N&ordm; Contrato</td>
    <td><strong><font color="#0000FF"><? echo $num_contrato_bco; ?></font></strong></td>
    <td>Tabela</td>
    <td><strong><font color="#0000FF"><? echo $tabela; ?></font></strong></td>
  </tr>
  <tr>
    <td>Inicio do Contrato</td>
    <td><strong><font color="#0000FF"><? echo "$dia_parc-$mes_parc-$ano_parc"; ?></font></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Final do Contrato</td>
    <td><?
	  
$sql = "SELECT * FROM contas_a_receber where num_proposta = '$num_proposta' order by vencto desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_contas_a_receber_proposta = mysql_num_rows($res);



$venctocontrato = $linha['8'];
	  
}


$venctodocontrato = explode("-", $venctocontrato);

$ano_vencto_contrato = $venctodocontrato[0];
$mes_vencto_contrato = $venctodocontrato[1];
$dia_vencto_contrato = $venctodocontrato[2];


//echo "$venctocontrato";

if($registros_contas_a_receber_proposta>=1){
	
echo "$dia_vencto_contrato-$mes_vencto_contrato-$ano_vencto_contrato";

}
else{
	
echo "Nao calculado!";
	
}

?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Observa&ccedil;&otilde;es</div></td>
    <td>&nbsp;</td>
    <td><strong><font color="#0000FF"><? echo "$mes_parc23 - $mes_parc24"; ?></font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong><font color="#0000FF"><? echo $obs3; ?></font></strong></td>
    <td colspan="2"><textarea name="parecer_credito" cols="45" rows="7" readonly="readonly" id="parecer_credito"><?  

$sql = "SELECT * FROM observacoes_parecer_credito where num_proposta = '$num_proposta' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$num_proposta_cli = $linha[1];

$cpf = $linha[2];

$data = $linha[3];

$hora = $linha[4];

$parecer_de_credito = $linha[5];

$operador = $linha[6];





echo "$data - "."$parecer_de_credito - "."$operador";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>

      </textarea></td>
  </tr>
  <tr>
    <td colspan="2"><strong><font color="#0000FF">
      <input name="data_pagto_cliente" type="hidden" id="data_pagto_cliente" value="<? echo date('d-m-Y'); ?>">
      <input name="hora_pagto_cliente" type="hidden" id="hora_pagto_cliente" value="<? echo $hora_atual; ?>">
      <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">
      <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">
      <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">
      <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">
      <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">
      <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence; ?>">
      <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence; ?>">
      <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence; ?>">
      <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence; ?>">
      <input name="recebido" type="hidden" id="recebido" value="<? echo N&atilde;o; ?>">
    </font></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?></td>
    <td><div align="right"> </div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<? } ?>
</body>

</html>

<?

mysql_close($conexao);

?>

