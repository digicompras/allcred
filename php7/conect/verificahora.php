<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?

require 'conect.php';



?>

<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];


}


?>

<?
//$sql = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$ontem' order by date desc limit 1";

$sql = "SELECT * FROM ponto where nome = '$nome_operador' order by date desc limit 1";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);

$ultimo_registro_de_ponto = $linha[12];
$ultimodia = $linha[13];
$ultimomes = $linha[14];
$ultimoano = $linha[15];

}
//echo "registros encontrados ".$registros;


?>

<?
$date = date('Y-m-d');


$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date'";
$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$reg = mysql_num_rows($res2);


$codigo_ponto = $linha[0];

$nome = $linha[1];

$data = $linha[2];

$ent_m = $linha[3];

$sai_m = $linha[4];

$ent_t = $linha[5];

$sai_t = $linha[6];

$ultimate_date = $linha[12];

}

?>


<?
setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y ");

$hoje = strftime("%A");

$sql = "select * from hora_encerramento where dia = '$hoje' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$dia = $linha[1];
$horas_inicio = $linha[2];
$minutos_inicio = $linha[3];
$segundos_inicio = $linha[4];
$horas_termino = $linha[5];
$minutos_termino = $linha[6];
$segundos_termino = $linha[7];

}
//$ajuste_horario = 2;
//$horacerta = date('H')+2;
//$hora_atual = "0".$horacerta.date(':i:s');
?>

<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>

<?
$sql = "SELECT * FROM hora_ponto limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$h_ponto = $linha[1];
$m_ponto = $linha[2];
$s_ponto = $linha[3];

}

$hora_ponto = "$h_ponto:$m_ponto:$s_ponto";
?>



<?
$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";
?>




<?

         
if($hora_atual>=$hora_terminar){

$date = date('Y-m-d');

$data = date('d-m-Y');

$mes_ano = date('m-Y');


$nome = $_POST['nome'];
$sai_t = $hora_atual;
$estab_pertence = $_POST['estab_pertence'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `sai_t` = '$sai_t',`obs` = 'Derrubado do sistema' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);



echo "<script>

window.location = 'http://www.allcredpromotora.com.br';

</script>";

 
}




?>



</body>
</html>