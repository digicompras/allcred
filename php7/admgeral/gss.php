<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");


$user = $_SESSION['usuario'];
$password = $_SESSION['senha'];

?>
<html>
<head>
<title></title>
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
require '../conect/conect.php';
error_reporting(E_ALL);

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db = $linha[1];
	
}


$sql = "SELECT * FROM admgeral where usuario = '$user' and senha = '$password'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];

$atualsenha = $linha['41'];
$penultimasenha = $linha['57'];
$ultimasenha = $linha['58'];

$atualusuario = $linha['40'];
$penultimousuario = $linha['59'];
$ultimousuario = $linha['60'];

}



?>
		  
		  
		  <?
		  
$date = date('Y-m-d');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];




if((empty($usuario)) or (empty($senha)) or ($usuario==$ultimousuario) or ($usuario==$penultimousuario) or ($usuario==$atualusuario) or ($senha==$ultimasenha) or ($senha==$penultimasenha) or ($senha==$atualsenha) ){

echo "<script>

alert('ATENCAO!!!... VOCE DEVE PREENCHER OS DOIS CAMPOS E DEVEM SER DIFERENTES DAS DUAS ULTIMAS UTILIZADAS!.');
window.location = 'ups.php';

</script>";


	}else{


$comando = "update `$db`.`admgeral` set `usuario` = '$usuario',`senha` = '$senha',`dataultimatrocadesenha` = '$date',`ultimasenha` = '$atualsenha',`penultimasenha` = '$ultimasenha',`ultimousuario` = '$atualusuario',`penultimousuario` = '$ultimousuario' where `admgeral`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar informações desse usuario");


Header("Location: index.php");

	}


?>





<body>

</body>
</html>
<?
mysql_close($conexao);
?>
