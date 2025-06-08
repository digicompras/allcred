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

<title>Processamento de arquivos</title>

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



<body>

<p>        <?

require '../../conect/conect.php';

?>



</p>

<p>&nbsp;</p>





<?

error_reporting(E_ALL);


$dias = $_POST['dias'];

$ativar_bloqueio = $_POST['ativar_bloqueio'];


$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`prazo_entrega_fisico` set `dias` = '$dias',`ativar_bloqueio` = '$ativar_bloqueio' where `prazo_entrega_fisico`. `codigo` = '0' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao alterar prazo de envio do fisico para a matriz e ativação de bloqueio!");



echo "Novo prazo ($dias dias) para envio do fisico a matriz e ativação de bloqueio ($ativar_bloqueio) alterados com sucesso!";

?>



<?
//Período (Qtd. de dias para somar ou subtrair)
$sql = "SELECT * FROM prazo_entrega_fisico limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$periodo = $linha[1];
$data_inicio_busca = $linha[3];

}

//Separação dos valores (dia, mês e ano)
$arr = explode("-", $data_inicio_busca);
 
$anoinicio = $arr[0];
$mesinicio = $arr[1];
$diainicio = $arr[2];

$data_inicio_busca_brasil = "$diainicio-$mesinicio-$anoinicio";


//Somar Data
$data_inc = date('d-m-Y', mktime(0, 0, 0, $mesinicio, $diainicio + $periodo, $anoinicio));


//echo "Data limite para entrega do físico na matriz: " . $data_inc . "<br />";




?>




    <?
$hoje = date('Y-m-d');


$sql = "SELECT * FROM propostas where (status_fisico = 'PENDENTE DE ENVIO' or status_fisico = 'PENDENTE') and data_proposta >= '$data_inicio_busca' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$num_proposta = $linha[0];
$obs_fisico = $linha[122];

$data_proposta = $linha[152];
//$prazo_final = $linha[153];



//------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr1 = explode("-", $hoje);
 
$anolimite1 = $arr1[0];
$meslimite1 = $arr1[1];
$dialimite1 = $arr1[2];

//-------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr2 = explode("-", $data_proposta);
 
$anolimite2 = $arr2[0];
$meslimite2 = $arr2[1];
$dialimite2 = $arr2[2];

//--------------------------------------------------------

//calculo timestam das duas datas
$timestamp1 = mktime(0,0,0,$meslimite1,$dialimite1,$anolimite1);
$timestamp2 = mktime(0,0,0,$meslimite2,$dialimite2,$anolimite2); 


//diminuo a uma data a outra
$segundos_diferenca = $timestamp1 - $timestamp2;
//echo $segundos_diferenca;

//converto segundos em dias
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);

//obtenho o valor absoluto dos dias (tiro o possível sinal negativo)
//$dias_diferenca = abs($dias_diferenca);

//tiro os decimais aos dias de diferenca
$dias_de_atraso = floor($dias_diferenca);



//----------------PRAZO FINAL--------------------------------------

$arr1 = explode("-", $data_proposta);
 
$anofinalentrega = $arr1[0];
$mesfinalentrega = $arr1[1];
$dialfinalentrega = $arr1[2];


$data_inc_inversa = date('Y-m-d', mktime(0, 0, 0, $mesfinalentrega, $dialfinalentrega + $periodo, $anofinalentrega));


$prazo_final = $data_inc_inversa;

//-------------------------------------------------------





$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

if($dias_diferenca>$periodo){

$dias_atraso = bcsub($dias_de_atraso,$periodo);

$comando = "update `$linha[1]`.`propostas` set `prazo_final` = '$prazo_final',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '$dias_atraso' where `propostas`. `num_proposta` = '$num_proposta'";

}
else{
$comando = "update `$linha[1]`.`propostas` set `prazo_final` = '$prazo_final',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '0' where `propostas`. `num_proposta` = '$num_proposta'";
}
}

mysql_query($comando,$conexao);

}





?>

















<?

mysql_close($conexao);

?>



<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<p>&nbsp;</p>

</body>

</html>

