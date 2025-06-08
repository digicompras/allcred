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

}

.style1 {	font-size: 18px;

	font-weight: bold;

	color: #0000FF;

}

-->

</style></head>



<body>

<p>        

<?

error_reporting(E_ALL);



require '../../conect/conect.php';

?>





</p>

<form name="form1" method="post" action="inserir_informativo.php">

  <input type="submit" name="Submit" value="Voltar">

  <span class="style1">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  </span>

</form>

<p>&nbsp;</p>

</body>

</html>

<?

$bco_operacao = $_POST['bco_operacao'];
$date = date('Y-m-d');
$hora = date('H:i:s');

$arquivo = $_FILES['arquivo']['name'];
$nomedoarquivo = $_FILES['arquivo']['name'];
$tamanho = $_FILES['arquivo']['size'];
$tipo = $_FILES['arquivo']['type'];


$uploaddir = '../../informativos/';

$uploadfile = $uploaddir. $_FILES['arquivo']['name'];



if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploaddir . $_FILES['arquivo']['name'])){

echo "Arquivo enviado com sucesso!";

} else {

echo "Arquivo não enviado";

}

?>


<?



$comando = "insert into informativos(bco_operacao,nomearquivo,arquivo,tipo,tamanho,date,hora)

values('$bco_operacao','$nomedoarquivo','$arquivo','$tipo','$tamanho','$date','$hora')";



mysql_query($comando,$conexao) or die("Erro ao gravar dados");





echo "Produto inserido no banco de dados com sucesso<br><br>";





?>



<?



$sql = "SELECT * FROM produtos order by ordem_desc desc limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$referencia = $linha[0];		  



$ordem_desc = $linha[14];		  



}



echo "Referência $referencia<br><br>";

?>



<?

mysql_close($conexao);

?>