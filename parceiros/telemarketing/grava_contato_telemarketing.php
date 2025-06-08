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
<title>SALVANDO INFORMA&Ccedil;&Otilde;ES DO CLIENTE</title>
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
error_reporting(E_ALL);

?>

		  
		  
		  <?

$codigo = $_POST['codigo'];
$cod_cliente = $_POST['cod_cliente'];
$cpf = $_POST['cpf'];
$dia_ligar = $_POST['dia_ligar'];
$mes_ligar = $_POST['mes_ligar'];
$ano_ligar = $_POST['ano_ligar'];
$hora_ligar = $_POST['hora_ligar'];
$status = $_POST['status'];
$proposta = $_POST['proposta'];
$obs = $_POST['obs'];

$dia_liberado = date('d');
$mes_liberado = date('m');
$ano_liberado = date('Y');
$hora_liberado = date('H:i:s');

$dia_fechamento = date('d');
$mes_fechamento = date('m');
$ano_fechamento = date('Y');
$hora_fechamento = date('H:i:s');



$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];

}





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

if($proposta=="Sim"){
$comando = "update `$linha[1]`.`telemarketing` set `codigo` = '$codigo',`dia_ligar` = '$dia_ligar',`mes_ligar` = '$mes_ligar',`ano_ligar` = '$ano_ligar',`hora_ligar` = '$hora_ligar',`status` = 'Liberado',`proposta` = '$proposta',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado',`dia_fechamento` = '$dia_fechamento',`mes_fechamento` = '$mes_fechamento',`ano_fechamento` = '$ano_fechamento',`hora_fechamento` = '$hora_fechamento' where `telemarketing`. `codigo` = '$codigo' limit 1 ";

}
else{
$comando = "update `$linha[1]`.`telemarketing` set `codigo` = '$codigo',`dia_ligar` = '$dia_ligar',`mes_ligar` = '$mes_ligar',`ano_ligar` = '$ano_ligar',`hora_ligar` = '$hora_ligar',`status` = '$status',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado',`proposta` = '$proposta',`dia_fechamento` = '$dia_fechamento',`mes_fechamento` = '$mes_fechamento',`ano_fechamento` = '$ano_fechamento',`hora_fechamento` = '$hora_fechamento' where `telemarketing`. `codigo` = '$codigo' limit 1 ";
}
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações nesse nº de registro do Telemarketing");


echo "Alterações efetuadas com sucesso<br>";
?>
<?
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

if($status=="Liberado"){
$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cliente',`telemarketing` = '$status',`operador_manutencao` = '$operador',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `clientes`. `codigo` = '$cod_cliente' limit 1 ";

mysql_query($comando,$conexao);

}
}


?>

<?
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$hora = date('H:i:s');


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

if($obs<>""){
$comando = "insert into obs_telemarketing(cod_cliente,dia,mes,ano,hora,operador,estab_pertence,cidade_estab_pertence,obs) 
values('$cod_cliente','$dia','$mes','$ano','$hora','$operador','$estab_pertence','$cidade_estab_pertence','$obs')";

}
}

mysql_query($comando,$conexao);


?>

<?
if($proposta=="Sim"){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cliente',`telemarketing` = 'Liberado',`operador_manutencao` = '$operador',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `clientes`. `codigo` = '$cod_cliente' limit 1 ";
}
mysql_query($comando,$conexao);
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
<form name="form1" method="post" action="">
</form>
<form name="form2" method="post" action="<? if($proposta=="Sim"){ echo "../clientes/verifica.php"; } else{ echo "menu.php"; }  ?>">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <? if($proposta=="Sim"){ echo "<input name='cpf' type='hidden' id='cpf' value='$cpf'>"; } ?>
  <input type="submit" name="Submit" value="<? if($proposta=="Sim"){ echo"Efetuar Proposta"; } else{ echo "Voltar"; } ?>">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
