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
		
$sql = "SELECT * FROM operadores where usuario='$usuario' and  senha='$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha['1'];

$dataultimatrocadesenha = $linha['65'];
$penultimasenha = $linha['66'];
$ultimasenha = $linha['67'];

}

$sql = "SELECT * FROM diaslimitetrocarsenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diaslimite = $linha['1'];

}




$date = date('Y-m-d');
$hora = date('H:i:s');


// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($date) - strtotime($dataultimatrocadesenha);

//Calcula a diferença em dias
$dias = floor($diferenca / (60 * 60 * 24));




if($dias>=$diaslimite){
	
	//echo "erro!! tente novamente em alguns instantes $dias - $diaslimite ";
	
	$_SESSION['nome'] = $nome;

	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	Header("Location: ups.php");
	
}else{
	
$comando = "insert into login_operadores(nome,date,hora,usuario,senha) values('$nome','$date','$hora','$usuario','$senha')";
		
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");

	}
	
	}

?> 

</body>
</html>
