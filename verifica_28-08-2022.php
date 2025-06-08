<?
session_start();

$nome=$_POST['nome'];
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];


require 'conect/conect.php';

?>

<html>
<head>
<title>Verificação</title>
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

-->
</style>


</head>



<body>



<?

	$data_hoje = date('Y-m-d');

	
$user = "SELECT * FROM operadores where status = 'Ativo' and usuario = '$usuario' and senha = '$senha' limit 1";
$result = mysql_query($user);
while($linha=mysql_fetch_row($result)) {

$nome_operador = $linha[1];
$estab_pertence = $linha[44];
$tempo_almoco = $linha[58];
$horariologin = $linha[61];

}




if(mysql_num_rows($result)==0){

	Header("Location: alerta.php");
	}
	else{

	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");

}

?> 

</body>
</html>
