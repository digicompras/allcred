<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>



<?

error_reporting(E_ALL);







require '../../conect/conect.php';



$texto1 = $_POST['texto1'];
$texto2 = $_POST['texto2'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db =$linha[1];
}

?>

<?

$comando = "update `$db`.`mensagens_emails` set `texto1` = '$texto1',`texto2` = '$texto2' where `mensagens_emails`. `codigo` = '0' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao gravar texto");

echo "Textos salvos com sucesso!";


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

}

-->

</style></head>



<body>

<p>

</p>

<form name="form1" method="post" action="editar_texto.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class='class01' type="submit" name="Submit22" value="Voltar">

</form>

<p>&nbsp;</p>

</body>

</html>

<? 

mysql_free_result($res);

?>